<?php

namespace App\Controllers;


class Komik extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Komik | WebProgramming UNPAS',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => 'active',
        ];
        return view('komik/index', $data);
    }
}
