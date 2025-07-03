<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; // ✅ Add this!
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\QualityTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class QualityController extends Controller
{
    public function index()
    {
        $qualityTests = QualityTest::all();
        
        return view('backend.quality.index', compact('qualityTests'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('backend.quality.create', compact('batches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_id'    => 'required|exists:batches,id',
            'test_date'   => 'required|date',
            'test_type'   => 'required',
            'score'   => 'required',
            'test_result' => 'required|string|max:255',
        ]);

        $metamask_address = Auth::user()->metamask_address ?? null;
        if (!$metamask_address) {
            return back()->with('error', 'Metamask address is required to interact with blockchain.');
        }

        $payload = array_merge($validated, [
            'metamask_address' => $metamask_address, 
            'tester_id' => Auth::user()->id,
            'tester_name' => Auth::user()->firstname . ' ' . Auth::user()->lastname,
        ]);

        // Example blockchain bridge call
        $response = Http::post('http://localhost:3000/quality-tests', $payload);

        if ($response->successful()) {
            // QualityTest::create($validated);
            return redirect()->route('quality')->with('success', 'Quality test recorded and sent to blockchain!');
        } else {
            return back()->with('error', 'Blockchain error: ' . $response->json('error'));
        }
    }

    public function show($id)
    {
        $qualityTest = QualityTest::findOrFail($id);
        return view('quality.show', compact('qualityTest'));
    }

    public function edit($id)
    {
        $qualityTest = QualityTest::findOrFail($id);
        $batches = Batch::all();
        return view('quality.edit', compact('qualityTest', 'batches'));
    }

    public function update(Request $request, $id)
    {
        $qualityTest = QualityTest::findOrFail($id);

        $validated = $request->validate([
            'batch_id'    => 'required|exists:batches,id',
            'tester_id'   => 'nullable|integer',
            'test_date'   => 'required|date',
            'test_result' => 'required|string|max:255',
            'comments'    => 'nullable|string|max:1000',
        ]);

        $metamask_address = Auth::user()->metamask_address ?? null;
        if (!$metamask_address) {
            return back()->with('error', 'Metamask address is required to interact with blockchain.');
        }

        $payload = array_merge($validated, ['metamask_address' => $metamask_address]);

        // Send updated info to blockchain
        $response = Http::post('http://localhost:3000/record-quality-test', $payload);

        if ($response->successful()) {
            $qualityTest->update($validated);
            return redirect()->route('quality.index')->with('success', 'Quality test updated and resent to blockchain!');
        } else {
            return back()->with('error', 'Blockchain error: ' . $response->json('error'));
        }
    }

    public function destroy($id)
    {
        $qualityTest = QualityTest::findOrFail($id);
        $qualityTest->delete();

        return redirect()->route('quality.index')->with('success', 'Quality test deleted successfully!');
    }
}
