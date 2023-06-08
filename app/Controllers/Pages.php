<?php

namespace App\Controllers;


class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | WebProgramming UNPAS',
            'home' => 'active',
            'about' => '',
            'contact' => '',
            'komik' => '',
            'nav_orang' => ''
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About | WebProgramming UNPAS',
            'home' => '',
            'about' => 'active',
            'contact' => '',
            'komik' => '',
            'nav_orang' => ''
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | WebProgramming UNPAS',
            'home' => '',
            'about' => '',
            'contact' => 'active',
            'komik' => '',
            'nav_orang' => '',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Abc No. 123',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Kapas No. 23',
                    'kota' => 'Jakarta'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }

    public function phpinfo()
    {
        return phpinfo();
    }
}
