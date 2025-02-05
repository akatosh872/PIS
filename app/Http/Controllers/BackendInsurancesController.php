<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Insurance;
use App\Models\Claim;
use App\Models\InsuranceType;

class BackendInsurancesController extends Controller
{
    public function createNewInsurance()
    {
        $claims = Claim::where('service_type','policy')->get();
        $insuranceTypes = InsuranceType::all();
        $users = User::all();

        return view('backend.insurances.create', compact('claims', 'insuranceTypes', 'users'));
    }

    public function insuranceSaving(Request $request)
    {
        $request->validate([
            'monthly_fee' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Insurance::create($request->all());

        return redirect()->route('backend.insurances.create')->with('success', 'Поліс успішно створений');
    }

    public function showsAllInsurances()
    {
        $insurances = Insurance::all();
        return view('backend.insurances.shows', compact('insurances'));
    }

    public function edit($id)
    {
        $insurance = Insurance::findOrFail($id);
        $claims = Claim::all();
        $insuranceTypes = InsuranceType::all();
        $users = User::all();

        return view('backend.insurances.edit', compact('insurance', 'claims', 'insuranceTypes', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'claim_id' => 'required|exists:claims,id',
            'user_id' => 'required|exists:users,id',
            'insurance_type_id' => 'required|exists:insurance_types,id',
            'monthly_fee' => 'required|numeric',
            'installments' => 'required|integer',
        ]);

        $insurance = Insurance::findOrFail($id);
        $insurance->update($request->all());

        return redirect()->route('backend.insurances.edit', $id)->with('success', 'Поліс успішно оновлений');
    }

    public function destroy($id)
    {
        $claim = Claim::findOrFail($id);

        $insuranceId = $claim->insurance_id;

        Insurance::findOrFail($insuranceId)->delete();

        $claim->delete();

        return redirect()->route('backend.insurances.create')->with('success', 'Поліс успішно видалений');
    }


}
