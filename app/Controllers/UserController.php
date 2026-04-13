<?php 

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            redirect('/login');
        }

        $users = User::getAllRecords();

        return view('user', compact('users'));
    }

    public function store()
    {
        if (!Auth::check()) {
            redirect('/login');
        }

        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;

        if (!$name || !$email) {
            return redirect('/users');
        }

        User::addRecord([
            'name' => $name,
            'email' => $email,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/users');
    }
}