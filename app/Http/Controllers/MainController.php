<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{


   public function auth(Request $request)
   {
       if($request->session()->get('auth')==true){
           $request->session()->put('auth', false);

           return redirect()->back()->with('success','Sesión finalizada');
       }

       if ($request->get('password') == 'expoR3p0rtes'){
           $request->session()->put('auth', true);

           return redirect()->back();
       }else{
           return redirect()->back()->with('error','Contraseña erronea');
       }
   }

   public function index(Request $request)
   {
       $auth =   $request->session()->get('auth',false);


       return view('welcome',compact('auth'));
   }
}
