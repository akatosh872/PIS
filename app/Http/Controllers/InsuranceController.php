<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\InsuranceType;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function homePage()
    {
        $insuranceType = InsuranceType::all();
        return view('welcome', compact('insuranceType'));
    }
    public function index()
    {
        return view('profile.index');
    }

    public function insurances()
    {
        $insurances = Insurance::where('user_id',auth()->id())->get();

        return view('profile.insurances', compact('insurances'));
    }

    public function insurance($id)
    {
        $insurance = Insurance::where('id', $id)->first();
        return view('profile.insurance', compact('insurance'));
    }
}
