<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pays;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use ReCaptcha\ReCaptcha;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $pays = Pays::orderBy('pays', 'asc')->get();
        return view('auth.register2', compact('pays'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $response = $request->input('recaptcha_v3_token');
        $recaptcha = new \ReCaptcha\ReCaptcha(env('RECAPTCHA_V3_SECRET'));
        $result = $recaptcha->setExpectedAction('register')->verify($response);



        if (!$result->isSuccess()) {
            // Échec de la validation reCAPTCHA v3
            return redirect()->back()->withErrors(['reCAPTCHA' => 'La validation reCAPTCHA a échoué.']);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mypays_id' => $request->mypays_id,
        ]);

        event(new Registered($user));

        //Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        return redirect()->route('instructions');
    }
}
