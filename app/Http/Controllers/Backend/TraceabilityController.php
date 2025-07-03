<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class TraceabilityController extends Controller
{
    public function show($batchId)
    {
        // 🟡 Placeholder for Web3 interaction
        // Ideally this calls a JS or PHP Web3 function to get traceability data
        // Example:
        // $data = Web3::call('getFullTraceability', $batchId);

        return view('traceability.show', compact('batchId'));
    }
}
