<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Distribution;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;

class DistributionController extends Controller
{
    public function index()
    {
        $distributions = Distribution::all();
        return view('distribution.index', compact('distributions'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('distribution.create', compact('batches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'distributor_id' => 'nullable|integer',
            'destination' => 'required|string|max:255',
            'expected_delivery_date' => 'required|date',
            'transport_method' => 'required|string|max:255',
            'tracking_number' => 'required|string|max:255',
        ]);

        // Get Metamask address from authenticated user model (or however you store it)
        $metamask_address = Auth::user()->metamask_address ?? null;
        if (!$metamask_address) {
            return back()->with('error', 'Metamask address is required to interact with blockchain.');
        }

        // Prepare payload for blockchain
        $payload = array_merge($validated, ['metamask_address' => $metamask_address]);

        // Send to blockchain bridge (Node server)
        $response = Http::post('http://localhost:3000/distribute-batch', $payload);

        if ($response->successful()) {
            // Save in local database only after blockchain success
            Distribution::create($validated);

            return redirect()->route('distributions.index')->with('success', 'Distribution saved and sent to blockchain!');
        } else {
            return back()->with('error', 'Blockchain error: ' . $response->json('error'));
        }
    }

    public function show($id)
    {
        $distribution = Distribution::findOrFail($id);
        return view('distribution.show', compact('distribution'));
    }

    public function edit($id)
    {
        $distribution = Distribution::findOrFail($id);
        $batches = Batch::all();
        return view('distribution.edit', compact('distribution', 'batches'));
    }

    public function update(Request $request, $id)
    {
        $distribution = Distribution::findOrFail($id);

        $validated = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'distributor_id' => 'nullable|integer',
            'destination' => 'required|string|max:255',
            'expected_delivery_date' => 'required|date',
            'transport_method' => 'required|string|max:255',
            'tracking_number' => 'required|string|max:255',
        ]);

        $metamask_address = Auth::user()->metamask_address ?? null;
        if (!$metamask_address) {
            return back()->with('error', 'Metamask address is required to interact with blockchain.');
        }

        $payload = array_merge($validated, ['metamask_address' => $metamask_address]);

        // Send updated info to blockchain bridge
        $response = Http::post('http://localhost:3000/distribute-batch', $payload);

        if ($response->successful()) {
            // Update local DB only after blockchain success
            $distribution->update($validated);

            return redirect()->route('distributions.index')->with('success', 'Distribution updated and resent to blockchain!');
        } else {
            return back()->with('error', 'Blockchain error: ' . $response->json('error'));
        }
    }

    public function destroy($id)
    {
        $distribution = Distribution::findOrFail($id);
        $distribution->delete();

        return redirect()->route('distributions.index')->with('success', 'Distribution deleted successfully!');
    }
}
