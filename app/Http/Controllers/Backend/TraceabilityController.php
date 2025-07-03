<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TraceabilityController extends Controller
{
    /**
     * Display a list of coffee batches for traceability.
     */
    public function index()
    {
        // 🟡 Call Node.js backend to get all batches (or you can get from DB if you store them locally)
        $response = Http::get('http://localhost:3000/batches');

        if ($response->successful()) {
            $batches = $response->json();
        } else {
            $batches = []; // fallback
        }

        return view('backend.traceability.index', compact('batches'));
    }

    /**
     * Display the full traceability data for a specific batch.
     */
    public function show(Request $request, $batchId)
    {
        // 🟡 Call Node.js backend to get traceability data for this batch
        $response = Http::get("http://localhost:3000/traceability/{$batchId}");

        if ($response->successful()) {
            $traceabilityData = $response->json();
        } else {
            $traceabilityData = []; // fallback
        }

        return view('backend.traceability.show', compact('batchId', 'traceabilityData'));
    }
}
