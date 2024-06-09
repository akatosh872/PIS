<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\ClientDocument;
use App\Models\Compensation;
use App\Models\Statuses;
use Illuminate\Http\Request;

class BackendClaimController extends Controller
{
    public function showSingleClaim($id)
    {
        $claim = Claim::with(['status', 'user', 'insuranceType'])->findOrFail($id);
        $documents = ClientDocument::where('claim_id', $id)->get();
        $statuses = Statuses::all();
        $compensation = Compensation::where('claim_id',$id)->first();

        return view('backend.show', compact('claim', 'statuses', 'documents', 'compensation'));
    }

    public function showAllClaims()
    {
        $claims = Claim::with(['status', 'insuranceType'])->get();

        return view('backend.shows', compact('claims'));
    }

    public function updateClaim(Request $request, $id)
    {
        $claim = Claim::findOrFail($id);
        $claim->update(['status_id' => $request->input('status_id')]);

        if ($request->input('action') === 'confirm') {
            $compensation = Compensation::create([
                'claim_id' => $claim->id,
                'user_id' => $claim->user_id,
                'payment_notes' => $request->input('payment_notes'),
                'payment_amount' => $request->input('payment_amount'),
                'payment_approved' => true,
            ]);
        } elseif ($request->input('action') === 'reject') {
            $compensation = Compensation::create([
                'claim_id' => $claim->id,
                'user_id' => $claim->user_id,
                'payment_notes' => $request->input('payment_notes'),
                'payment_amount' => 0,
                'payment_approved' => false,
            ]);
        }


        return redirect()->route('backend.show', $claim->id)->with('success');
    }
}
