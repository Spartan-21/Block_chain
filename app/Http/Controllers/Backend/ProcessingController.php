<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Processing;
use App\Models\Batch;

class ProcessingController extends Controller
{
    public function index()
    {
        $processings = Processing::all();
        return view('processing.index', compact('processings'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('processing.create', compact('batches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'processor_id' => 'nullable|integer',
            'output_quantity' => 'nullable|numeric',
        ]);

        Processing::create($validated);

        return redirect()->route('processings.index')->with('success', 'Processing recorded successfully!');
    }

    public function show($id)
    {
        $processing = Processing::findOrFail($id);
        return view('processing.show', compact('processing'));
    }

    public function edit($id)
    {
        $processing = Processing::findOrFail($id);
        $batches = Batch::all();
        return view('processing.edit', compact('processing', 'batches'));
    }

    public function update(Request $request, $id)
    {
        $processing = Processing::findOrFail($id);

        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'processor_id' => 'nullable|integer',
            'output_quantity' => 'nullable|numeric',
        ]);

        $processing->update($validated);

        return redirect()->route('processings.index')->with('success', 'Processing updated successfully!');
    }

    public function destroy($id)
    {
        $processing = Processing::findOrFail($id);
        $processing->delete();

        return redirect()->route('processings.index')->with('success', 'Processing deleted successfully!');
    }
}
