<?php

class TableDemoController extends Controller
{
    public function index()
    {
        $users = User::getAllRecords();

        return $this->view('table-demo', [
            'users' => $users,
        ]);
    }
}
