<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Farm;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    /**
     * Display a listing of the batches belonging to the logged-in farmer.
     */
    public function index(Request $request, $farm_id)
    {
        $batches = Batch::whereHas('farm', function($query) use ($farm_id) {
            $query->where('farm_id', $farm_id);
        })->get();

        return view('backend.batches.index', compact('batches', 'farm_id'));
    }

    /**
     * Show the form for creating a new batch.
     */
    public function create(Request $request, $farm_id)
    {
        $coffeeTypes = ['Arabica', 'Robusta', 'Bourbon', 'Typica'];
        $processingMethods = ['Washed', 'Natural', 'Honey'];
        $farm = Farm::findOrFail($farm_id);

        return view('backend.batches.create', compact('coffeeTypes', 'processingMethods', 'farm'));
    }

    /**
     * Store a newly created batch.
     */
    public function store(Request $request, $farm_id)
    {
        $validated = $request->validate([
            'coffee_type' => 'required|string|in:Arabica,Robusta,Bourbon,Typica',
            'quantity' => 'required|numeric|min:1',
            'processing_method' => 'required|string|in:Washed,Natural,Honey',
            'quality_grade' => 'required|string|max:255',
            'moisture_content' => 'required|numeric|min:0|max:100',
            'certifications' => 'nullable|string|max:255',
        ]);

        $validated['farm_id'] = $farm_id;

        Batch::create($validated);

        return redirect()->route('batches', ['farm_id' => $farm_id])->with('success', 'Coffee batch created successfully!');
    }

    /**
     * Display the specified batch.
     */
    public function show(Request $request, $farm_id, $batch_id)
    {
        $batch = Batch::findOrFail($batch_id);

        return view('backend.batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified batch.
     */
    public function edit(Request $request, $farm_id, $batch_id)
    {
        $coffeeTypes = ['Arabica', 'Robusta', 'Bourbon', 'Typica'];
        $processingMethods = ['Washed', 'Natural', 'Honey'];
        $batch = Batch::findOrFail($batch_id);

        return view('backend.batches.edit', compact('batch', 'coffeeTypes', 'processingMethods', 'batch'));
    }

    /**
     * Update the specified batch.
     */
    public function update(Request $request, $farm_id, $batch_id)
    {
        $validated = $request->validate([
            'coffee_type' => 'required|string|in:Arabica,Robusta,Bourbon,Typica',
            'quantity' => 'required|numeric|min:1',
            'processing_method' => 'required|string|in:Washed,Natural,Honey',
            'quality_grade' => 'required|string|max:255',
            'moisture_content' => 'required|numeric|min:0|max:100',
            'certifications' => 'nullable|string|max:255',
        ]);

        $validated['farm_id'] = $farm_id;

        $batch = Batch::findOrFail($batch_id);
        $batch->update($validated);

        return redirect()->route('batches', ['farm_id' => $farm_id])->with('success', 'Batch updated successfully!');
    }

    /**
     * Remove the specified batch.
     */
    public function destroy(Request $request, $farm_id, $batch_id)
    {     
        $batch = Batch::findOrFail($batch_id);

        $batch->delete();

        return redirect()->route('batches', ['farm_id' => $farm_id])->with('success', 'Batch deleted successfully!');
    }
}
