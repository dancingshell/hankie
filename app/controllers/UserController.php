<?php

class UserController extends BaseController {

    public function index()
    {
        $users = User::all();

        return View::make('users', array('users' => $users));
    }

    public function showProfile($id)
    {
        $user = User::find($id);

        return View::make('user', array('user' => $user));
    }
}