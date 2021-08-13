<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //change the locale to selected language

    public function change($language){
        session()->put('locale',$language);
        return redirect()->back();

    }
}
