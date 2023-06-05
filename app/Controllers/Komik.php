<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\Config\Services;

class Komik extends BaseController
{
    //agar $komikModel bisa di gunakan di semua function dimasukan ke construct
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
        //$komik = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Detail Komik',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => 'active',
            'isi_komik' => $this->komikModel->getKomik($slug)
        ];

        //jika komik tidak ada di table
        if (empty($data['isi_komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        // session(); // untuk menampilkan pesan validation harus memulai sesi terlebih dahulu karena validation tersimpanya di session. Dalam hal ini session sudah di seting jalan di awal di BaseController
        $data = [
            'title' => 'Tambah Data Komik',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => 'active',
            'validation' => session('validation') // ambil data validation

        ];

        return view('komik/create', $data);
        //dd($data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            // 'judul' => ['required|is_unique[komik.judul]'] -> ini untuk menampilkan pesan error dlm bahasa inggris
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus di isi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ]
        ])) {
            //tampilkan pesan kesalahan input
            $validation = \Config\Services::validation();
            //mengirim variable validation ke redirect, withInput untuk mengambil semua inputan, with untuk menampilkan pesan kesalahan
            //catatan : kalau menggunakan redirect tidak bisa langsung mengirimkan data variabel seperti halnya return view!
            return redirect()->to('komik/create')->withInput()->with('validation', $this->validator->getErrors());
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/komik');
        // return view('komik/index', $alert);
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Komik',
            'home' => '',
            'about' => '',
            'contact' => '',
            'komik' => 'active',
            'validation' => session('validation'), // ambil data validation
            'isi_komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        //cek judul apakah dirubah atau tidak
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        //validasi input
        if (!$this->validate([

            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus di isi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ],
            'sampul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus di isi.'
                ]
            ]
        ])) {
            //tampilkan pesan kesalahan input
            $validation = \Config\Services::validation();
            //mengirim variable validation ke redirect, withInput untuk mengambil semua inputan, with untuk menampilkan pesan kesalahan
            //catatan : kalau menggunakan redirect tidak bisa langsung mengirimkan data variabel seperti halnya return view!
            return redirect()->to('komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $this->validator->getErrors());
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        // menggunakan kembali method save, karena secara default CI sudah tahu kalau yg dikirim ada 'id' maka querynya update, kalau tidak ada maka querynya insert
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/komik');
    }
}
