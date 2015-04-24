<?php

class UserController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function showLoginForm(){
        return View::make('users.login');
    }


    public function doLogin(){
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
        {
              return Redirect::to('/')->with('message', "you are logged in");  
        }

        return Redirect::to('/')->with('message', "you are logged in");
    }

    public function showRegisterForm(){

    }

    public function doLogout(){

        Auth::logout();
        return Redirect::to('/');
    }

    public function doRegister(){
        $validator = Validator::make(
            array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'confirm-password' => Input::get('confirm-password'),
            ),
            array(
                'email' => 'required|email|unique:users',
                'password' => 'required|same:confirm-password',
                'confirm-password' => 'required|same:password'
            )
        );

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::to('/')->withErrors($validator);

        }

            $user = new User;
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            $messages = "User {{ Input::get('email') }} add successfully";
            return Redirect::to('/')->with("messages", $messages);


    }

    public function showIndex(){

    }

}
