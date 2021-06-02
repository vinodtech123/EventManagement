<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function signupForm()
    {

         return view('users.auth.register');

    }

    public function registerData(Request $request)
    {

        if($request->isMethod('post'))
        {

            $request->validate
            ([
                 'first_name'=>'required',
                 'last_name'=>'required',
                 'email'=>'required',
                 'password'=>'required|required_with:confirm_password|same:confirm_password',
                 'confirm_password'=>'required'
            ]);

            $user = new User;

            $user->firstname = $request->first_name;
            $user->lastname  = $request->last_name;
            $user->email     =    $request->email;
            $user->password  = Hash::make($request->password);

            $result = $user->save();

            if($result)
            {

                return redirect('/')->with('msg','User Registerd Sucessfully.');


            }
            else
            {

                return redirect('/')->with('msg','User Registerd Sucessfully');


            }

        }
        
    }


    public function loginForm(Request $request)
    {

        if($request->session()->has('User_Login'))
        {
            return redirect('event');
        }
        else
        {
            return view('users.auth.login');
        }
        
    }


    public function userAuthenticate(Request $request)
    {

        if($request->isMethod('post'))
        {

            $request->validate
            ([

                'email'=>'required',
                'password'=>'required'


            ]);


        }

        $email = $request->email;
        $password = $request->password;

        $result = User::where(['email'=>$email])->first();

        if($result)
      {
        if(Hash::check($password,$result->password))
        {

            $request->session()->put('User_Login',true);
            $request->session()->put('User_ID',$result->id);
            $request->session()->put('USER_Detail',$result);
            
            return redirect('event');

        }
        else
        {
            return redirect('login')->with('msg','please enter correct password details');
        }

    }
    else
    {
        return redirect('login')->with('msg','please enter valid credential details.');
    }



    }




    
}
