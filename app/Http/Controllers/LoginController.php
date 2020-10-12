<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        function userLogin(Request $req){
            $data = $req->input();
            $req->session()->put('user',$data['username']);
            //echo session('user');
            return redirect('dashboard');
    
        }
        // return $request->input();
    }
}
