<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Compensation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->subMonth());
        $endDate = $request->input('end_date', Carbon::now());

        $users = User::whereBetween('created_at', [$startDate, $endDate])->get();
        $payments = Payment::whereBetween('created_at', [$startDate, $endDate])->get();
        $compensations = Compensation::where('payment_approved', true)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
        $totalProfit = $payments->sum('amount') - $compensations->sum('payment_amount');

        return view('backend.analytics', compact('users', 'payments', 'compensations', 'totalProfit', 'startDate', 'endDate'));
    }
}
