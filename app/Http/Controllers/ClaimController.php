<?php

namespace App\Http\Controllers;

use App\Models\ClientDocument;
use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\Statuses;
use App\Models\InsuranceType;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function create()
    {
        $insuranceTypes = InsuranceType::all();
        return view('claim.create', compact('insuranceTypes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'information' => 'required|string',
        'document' => 'required|file|mimes:pdf,doc,docx', // Додайте відповідні валідації для типу документу
    ]);

    $documentPath = $request->file('document')->store('public/documents');

    $claim = Claim::create([
        'user_id' => Auth::user()->getAuthIdentifier(),
        'contact' => $request->input('phone'),
        'information' => $request->input('information'),
        'status_id' => 1,
        'insurance_type_id' => $request->input('insurance_type'),
    ]);

    // Збереження інформації про документ
    ClientDocument::create([
        'claim_id' => $claim->id,
        'document_name' => $request->file('document')->getClientOriginalName(),
        'file_path' => $documentPath,
    ]);

    return redirect()->route('claim.show', ['id' => $claim->id])
        ->with('success', 'Заява успішно подана');
}

    public function show($id)
    {
        $claim = Claim::with(['status', 'insuranceType'])->findOrFail($id);
        $documents = ClientDocument::where('claim_id', $id)->get();
        $insuranceTypes = InsuranceType::all();

        return view('claim.show', compact('claim', 'insuranceTypes', 'documents'));
    }

    public function shows()
    {
        $claims = Claim::with('insuranceType')->where('user_id', Auth::user()->getAuthIdentifier())->get();
        $insuranceTypes = InsuranceType::all();

        return view('claim.shows', compact('claims', 'insuranceTypes'));
    }
}
