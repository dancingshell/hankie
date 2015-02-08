<?php

class SessionController extends BaseController {

    public function create()
    {
        return View::make('sessions.create');
    }

    public function store()
    {
        $data = array();

        if (Auth::check()) {
            $data = Auth::user();
            return Redirect::intended('/profile')->with('AlertMessage','<p class="alert alert-success">Has iniciado sesión <strong>correctamente</strong></p>');
        }

        return Redirect::intended('/profile')->with('AlertMessage','<p class="alert alert-danger">El usuario y/o la contraseña son <strong>incorrectos</strong></p>');
    }

    public function show()
    {
        return View::make('sessions.view');
    }

    public function destroy()
    {
        Auth::logout();

        return Redirect::to('/')->with('AlertMessage','<p class="alert alert-info">Has cerrado sesión <strong>correctamente</strong></p>');
    }

    public function callback()
    {
        $code = Input::get('code');
        if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();

        if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

        $me = $facebook->api('/me');

        $user = User::whereUid($uid)->first();
        if (empty($user)) {

            $user = new User;
            $user->first_name = $me['first_name'];
            $user->last_name = $me['last_name'];
            $user->email = $me['email'];
            $user->username = $me['username'];
            $user->uid = $uid;

            $user->save();
        }

        $user->access_token = $facebook->getAccessToken();
        $user->save();

        Auth::login($user);

        return Redirect::to('/')->with('message', 'Logged in with Facebook');
    }

    public function facebook()
    {
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => route('facebook.callback'),
            'scope' => 'email',
        );
        return Redirect::to($facebook->getLoginUrl($params));
    }
}