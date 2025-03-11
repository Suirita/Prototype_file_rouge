<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return 
     */
    public function change(Request $request){

        $lang = $request->lang;

        Session::put('locale', $lang);

        return redirect()->back();  
    }
}
