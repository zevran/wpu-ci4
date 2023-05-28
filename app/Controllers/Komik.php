<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        //$komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Daftar Komik | WebProgramming UNPAS',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => 'active',
            'isi_komik' => $this->komikModel->getKomik()
        ];

        //cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // dd($komik);
        // $komikModel = new KomikModel();
        //dd($komik);


        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => 'active',
            'isi_komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/detail', $data);
    }
}
