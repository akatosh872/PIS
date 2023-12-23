<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Statuses;
use Illuminate\Http\Request;

class BackendClaimController extends Controller
{
    public function show($id)
    {
        $claim = Claim::with(['status', 'user'])->findOrFail($id);
        $statuses = Statuses::all();

        return view('backend.show', compact('claim', 'statuses'));
    }

    public function showAllClaims()
    {
        $claims = Claim::with(['status', 'insuranceType'])->get();

        return view('backend.shows', compact('claims'));
    }

    public function updateStatus(Request $request, $id)
    {
        $claim = Claim::findOrFail($id);
        $claim->update(['status_id' => $request->input('status_id')]);

        return redirect()->route('backend.show', $claim->id)
            ->with('success', 'Status updated successfully');
    }
}
