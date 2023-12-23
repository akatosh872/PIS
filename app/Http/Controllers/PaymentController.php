<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $payment_systems =  DB::table('payment_systems')->get();
        $insurances = Insurance::where('user_id',Auth::user()->getAuthIdentifier())->get();

        return view('payment.form', compact('payment_systems', 'insurances'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'card_number' => 'required',
            'amount' => 'required',
        ]);

        Payment::create([
            'payment_system_id' => $request->input('payment_method'),
            'insurance_id' => $request->input('insurance_id'),
            'card_number' => $request->input('card_number'),
            'amount' => $request->input('amount'),
        ]);
        Insurance::where('id', $request->input('insurance_id'))->increment('installments');

        return redirect()->route('payment.form')->with('success', 'Оплата успішно збережена');
    }
}
