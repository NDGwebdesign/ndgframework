<?php

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'NDG Framework'
        ]);
    }

    public function blog()
    {
        $posts = [
            ['title' => 'First post'],
            ['title' => 'Second post']
        ];

        return view('blog', compact('posts'));
    }
}