<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        if(Auth::check()){
           if(Auth::user()->role == 1){
                return redirect()->route('admin-dashboard');
           }else{
                return redirect()->route('faculty-dashboard');
           }
        }else{
            return redirect()->route('login');
        }
    }
}
