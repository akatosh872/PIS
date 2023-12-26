<?php

namespace App\Http\Controllers;

use App\Models\ClientDocument;
use App\Models\Compensation;
use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Statuses;
use App\Models\InsuranceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class ClaimController extends Controller
{
    public function show($id)
    {
        $claim = Claim::with(['status', 'insuranceType', 'insurance'])->findOrFail($id);
        $documents = ClientDocument::where('claim_id', $id)->get();
        $compensation = Compensation::where('claim_id', $id)->first();

        return view('claim.show', compact('claim', 'documents','compensation'));
    }

    public function shows()
    {
        $claims = Claim::with('insuranceType')->where('user_id', Auth::user()->getAuthIdentifier())->get();
        if ($claims->isEmpty()){
            return redirect('claim/create');
        }
        $insuranceTypes = InsuranceType::all();

        return view('claim.shows', compact('claims', 'insuranceTypes'));
    }

    public function create()
    {
        $insuranceTypes = InsuranceType::all();
        $insurances = Insurance::where('user_id', Auth::user()->getAuthIdentifier())->get();
        return view('claim.create', compact('insuranceTypes', 'insurances'));
    }
    public function insuranceType()
    {
        return $this->belongsTo(InsuranceType::class);
    }
    public function store(Request $request)
    {
        $request->validate([
            'information' => 'required',
            'service_type' => 'required',
        ]);


        $claim = Claim::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'contact' => $request->input('phone'),
            'information' => $request->input('information'),
            'status_id' => 1,
            'insurance_type_id' => $request->input('insurance_type'),
            'service_type' => $request->input('service_type'),
            'insurance_id' => $request->input('insurance_id'),
        ]);

        if ($request->hasFile('document') && $request->file('document')->isValid()) {
            $documentPath = $request->file('document')->store('public/documents');
            $documentUrl = Storage::url($documentPath);
            // Збереження інформації про документ
            ClientDocument::create([
                'claim_id' => $claim->id,
                'document_name' => $request->file('document')->getClientOriginalName(),
                'file_path' => $documentUrl,
            ]);
        }

        return redirect()->route('claim.show', ['id' => $claim->id])
            ->with('success', 'Заява успішно подана');
    }
}
