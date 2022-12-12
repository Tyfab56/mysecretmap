<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LanguageController extends Controller
{

    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            app()->setLocale($lang);
            session()->put('locale', $lang);
        }

        $user = Auth::user();



        if ($user) {

            $user->lang_id = Session::get('locale');
            $user->save();
        }

        return Redirect::back();
    }
}
