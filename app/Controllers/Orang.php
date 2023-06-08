<?php

namespace App\Controllers;

use App\Models\OrangModel;

class Orang extends BaseController
{
    //agar $komikModel bisa di gunakan di semua function dimasukan ke construct
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index()
    {
        // curentPage adalah URL yang bisa dilihat di pagination ketika di klik
        // kalau currentPage ada isinya maka isinya ya curenpage itu, tapi klo tidak ada isinya maka set 1
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        }
        $data = [
            'title' => 'Daftar Orang | WebProgramming UNPAS',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => '',
            'nav_orang' => 'active',
            // 'orang' => $this->orangModel->findAll()
            // 8 adalah jumlah data yang akan ditampilkan dalam satu halaman, orang adalah nama tabelnya
            'orang' => $orang->paginate(8, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage
        ];

        //cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // dd($komik);
        // $komikModel = new KomikModel();
        //dd($komik);


        return view('orang/index', $data);
    }
}
