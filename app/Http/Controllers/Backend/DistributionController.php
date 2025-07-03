<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('backend.distribution.index', compact('distributions'));
    }

    public function create()
    {
        $batches = Batch::all();
        return view('backend.distribution.create', compact('batches'));
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

        $metamask_address = Auth::user()->metamask_address ?? null;
        if (!$metamask_address) {
            return back()->with('error', 'Metamask address is required to interact with blockchain.');
        }

        $payload = array_merge($validated, ['metamask_address' => $metamask_address]);

        $response = Http::post('http://localhost:3000/shipments', $payload);

        if ($response->successful()) {
            $validated['distributor_id'] = Auth::user()->id;
            Distribution::create($validated);
            return redirect()->route('distributions')->with('success', 'Distribution saved and sent to blockchain!');
        } else {
            return back()->with('error', 'Blockchain error: ' . $response->json('error'));
        }
    }

    public function show($distribution_id)
    {
        $distribution = Distribution::findOrFail($distribution_id);
        return view('backend.distribution.show', compact('distribution'));
    }

    public function edit($distribution_id)
    {
        $distribution = Distribution::findOrFail($distribution_id);
        $batches = Batch::all();

        return view('backend.distribution.edit', compact('distribution', 'batches'));
    }

    public function update(Request $request, $distribution_id)
    {
       $distribution = Distribution::findOrFail($distribution_id);

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

        $response = Http::post('http://localhost:3000/distribute-batch', $payload);

        if ($response->successful()) {
            $distribution->update($validated);
            return redirect()->route('distributions.index')->with('success', 'Distribution updated and resent to blockchain!');
        } else {
            return back()->with('error', 'Blockchain error: ' . $response->json('error'));
        }
    }

    public function destroy($distribution_id)
    {
        $distribution = Distribution::findOrFail($distribution_id);
        $distribution->delete();

        return redirect()->route('distributions.index')->with('success', 'Distribution deleted successfully!');
    }
}
