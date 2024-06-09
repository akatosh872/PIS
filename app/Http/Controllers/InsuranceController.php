<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Insurance;
use App\Models\InsuranceType;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function showAllInsurances()
    {
        $insurances = Insurance::where('user_id',auth()->id())->get();

        return view('insurance.insurances', compact('insurances'));
    }

    public function showInsurance($id)
    {
        $claim = Claim::with(['status', 'user', 'insuranceType', 'insurance'])->where('insurance_id', $id)->first();

        return view('insurance.insurance', compact('claim'));
    }
}
