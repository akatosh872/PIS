<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $claim = Claim::with(['status', 'user', 'insuranceType', 'insurance'])->where('user_id', Auth::user()->getAuthIdentifier())->first();
        $user = User::where('id', Auth::user()->getAuthIdentifier())->first();

        return(view('profile.index', compact('claim', 'user')));
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->getAuthIdentifier());

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'card_number' => $request->input('card_number'),
        ]);

        return redirect()->route('profile.index')->with('success', 'Профіль успішно оновлено.');
    }
}
