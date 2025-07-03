<?php

namespace App\Http\Controllers\Backend;

use App\Models\Processing;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProcessingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view.processing|show.processing', ['only' => ['index', 'show']]);
        $this->middleware('permission:create.processing', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit.processing', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete.processing', ['only' => ['destroy']]);
    }

    public function index()
    {
        $processings = Processing::where('processor_id', Auth::id())->latest()->paginate(10);
        return view('backend.processings.index', compact('processings'));
    }

    public function create()
    {
        $batches = Batch::where('status', 'ready_for_processing')->get();
        return view('backend.processings.create', compact('batches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'output_quantity' => 'required|numeric|min:0',
            'processing_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
        ]);

        $validated['processor_id'] = Auth::id();
        $validated['status'] = 'processing';
        $validated['created_by'] = Auth::id();

        $processing = Processing::create($validated);

        Batch::where('id', $validated['batch_id'])->update(['status' => 'in_processing']);

        return redirect()->route('processings')->with('success', 'Processing recorded successfully!');
    }

    public function show($id)
    {
        $processing = Processing::with(['batch'])->findOrFail($id);
        return view('backend.processings.show', compact('processing'));
    }

    public function edit($id)
    {
        $processing = Processing::findOrFail($id);
        $batches = Batch::whereIn('status', ['ready_for_processing', 'in_processing'])->get();
        return view('backend.processings.edit', compact('processing', 'batches'));
    }

    public function update(Request $request, $id)
    {
        $processing = Processing::findOrFail($id);

        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'output_quantity' => 'required|numeric|min:0',
            'processing_date' => 'required|date',
            'notes' => 'nullable|string|max:500',
            'status' => 'required|in:processing,completed,failed',
        ]);

        $processing->update($validated);

        if ($validated['status'] === 'completed') {
            Batch::where('id', $validated['batch_id'])->update(['status' => 'processed']);
        }

        return redirect()->route('processings.edit', $processing->id)->with('success', 'Processing updated successfully!');
    }

    public function destroy($id)
    {
        $processing = Processing::findOrFail($id);

        if ($processing->batch->status === 'in_processing') {
            $processing->batch->update(['status' => 'ready_for_processing']);
        }

        $processing->delete();

        return redirect()->route('processings')->with('success', 'Processing deleted successfully!');
    }
}
