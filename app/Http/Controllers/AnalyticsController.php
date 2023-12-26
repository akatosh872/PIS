<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Compensation;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $payments = Payment::all();
        $compensations = Compensation::where('payment_approved', true)->get();
        $totalProfit = $payments->sum('amount') - $compensations->sum('payment_amount');

        return view('backend.analytics', compact('users', 'payments', 'compensations', 'totalProfit'));
    }
}
