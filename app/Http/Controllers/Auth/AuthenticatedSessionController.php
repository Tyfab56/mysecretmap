<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $response = $request->input('recaptcha_v3_token');
        $recaptcha = new \ReCaptcha\ReCaptcha(env('RECAPTCHA_V3_SECRET'));
        $result = $recaptcha->setExpectedAction('register')->verify($response);

        if (!$result->isSuccess()) {
        // Échec de la validation reCAPTCHA v3
        return redirect()->back()->withErrors(['reCAPTCHA' => 'La validation reCAPTCHA a échoué.']);
         }
    
        if (!$result->isSuccess()) {
            // Échec de la validation reCAPTCHA v3
            return redirect()->back()->withErrors(['reCAPTCHA' => 'La validation reCAPTCHA a échoué.']);
        }


       //  $request->authenticate();

       // $request->session()->regenerate();
        // chargement de la langue mémorisé
       //  $user = Auth::user();

       /* if ($user) {

            $lang = $user->lang_id;
            app()->setLocale($lang);
            session()->put('locale', $lang);
            $user->lastconnect = \Carbon\Carbon::now();
            $user->save();
        }*/

       // return redirect('/');
       return redirect()->route('instructions');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
