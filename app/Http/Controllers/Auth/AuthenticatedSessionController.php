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




        $request->authenticate();

        $request->session()->regenerate();
        // chargement de la langue mémorisé
        $user = Auth::user();



        if ($user) {

            $lang = $user->lang_id;

            if (is_string($lang)) {
                app()->setLocale($lang);
                session()->put('locale', $lang);
            } else {
                // Gérer le cas où la langue de l'utilisateur n'est pas valide.
                // Par exemple, vous pouvez définir une langue par défaut.
                app()->setLocale(config('app.fallback_locale'));
                session()->put('locale', config('app.fallback_locale'));
            }


            $user->lastconnect = \Carbon\Carbon::now();
            $user->save();
        }

        if ($user->email_verified_at == null) {

            return redirect()->route('instructions');
        }

        return redirect('/');
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
