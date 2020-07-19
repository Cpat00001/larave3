<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function contact()
    {
        return view('contact');
    }
    public function blogPost($id, $num)
    {
        $section = [
            1 => ['tytul' => 'motoryzacja'],
            2 => ['tytul' => 'lotnictwo']
        ];
        $author = [
            1 => ['author' => 'Romek'],
            2 => ['author' => 'Patryk']
        ];

        return view('blog-post', ['section' => $section[$id], 'name' => $author[$num]]);
    }
}
