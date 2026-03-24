<?php 

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            redirect('/login');
        }

        $users = User::all();

        return view('user', compact('users'));
    }
}