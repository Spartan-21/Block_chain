<?php

namespace App\Http\Controllers\Backend;

use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class FarmController extends Controller
{
    /**
     * Display a listing of the farms.
     */
    public function index()
    {
        // Fetch only farms owned by the logged-in farmer
        $farms = Farm::where('user_id', Auth::id())->get();

        return view('backend.farms.index', compact('farms'));
    }

    /**
     * Show the form for creating a new farm.
     */
    public function create()
    {
        return view('backend.farms.create');
    }

    /**
     * Store a newly created farm in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'altitude' => 'required|numeric',
            'farm_size' => 'required|numeric',
            'coordinates' => 'required|string|max:255',
            'metamask_address' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = Auth::user()->id;

        Farm::create($validated);

        return redirect()->route('farms')->with('success', 'Farm created successfully!');
    }

    /**
     * Display the specified farm.
     */
    public function show(Request $request, $farm_id)
    {
        $farm = Farm::findOrFail($farm_id);
        return view('backend.farms.show', compact('farm'));
    }

    /**
     * Show the form for editing the specified farm.
     */
    public function edit(Request $request, $farm_id)
    {
        $farm = Farm::findOrFail($farm_id);

        return view('backend.farms.edit', compact('farm'));
    }

    /**
     * Update the specified farm in storage.
     */
    public function update(Request $request, $farm_id)
    {
        $farm = Farm::findOrFail($farm_id);
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'altitude' => 'required|numeric',
            'farm_size' => 'required|numeric',
            'coordinates' => 'required|string|max:255',
            'metamask_address' => 'nullable|string|max:255',
        ]);

        $farm->update($validated);

        return redirect()->route('farms.edit', ['farm_id' => $farm->id])->with('success', 'Farm updated successfully!');
    }

    /**
     * Remove the specified farm from storage.
     */
    public function destroy(Request $request, $farm_id)
    {
        $farm = Farm::findOrFail($farm_id);
        $farm->delete();
        return redirect()->route('farms')->with('success', 'Farm deleted successfully!');
    }

    /**
     * Send farm data to Node.js bridge to register on blockchain.
     */
    public function storeToBlockchain(Request $request)
    {
        $validated = $request->validate([
            'farmerName' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'altitude' => 'required|numeric',
            'farmSize' => 'required|numeric',
            'coordinates' => 'required|string|max:255',
        ]);

        try {
            $response = Http::post(config('services.blockchain.url') . '/farms', array_merge($validated, [
                'metamaskAddress' => config('services.blockchain.sender')
            ]));

            if ($response->successful()) {
                $data = $response->json();
                return redirect()->back()->with([
                    'success' => 'Farm registered on blockchain!',
                    'txHash' => $data['txHash'] ?? null,
                    'farmId' => $data['farmId'] ?? null,
                ]);
            } else {
                return redirect()->back()->withErrors('Blockchain registration failed: ' . $response->body());
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error connecting to blockchain service: ' . $e->getMessage());
        }
    }
}
