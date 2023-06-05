<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    protected $table = 'komik';
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getKomik($slug = false)
    {
        // cek kalau tidak ada slug yang dikirim, tampilkan semua data
        if ($slug == false) {
            return $this->findAll();
        }
        // apabila ada slug dikirim, tampilkan satu data berdasarkan slug
        return $this->where(['slug' => $slug])->first();
    }
}
