<?php namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['nama', 'alamat'];

    // Menyimpan pelanggan baru ke database
    public function simpanPelanggan($data)
    {
        $this->insert($data);
    }

    // Mengambil pelanggan terbaru yang baru saja terdaftar
    public function ambilPelangganTerbaru()
    {
        return $this->orderBy('id', 'DESC')->first();
    }
}
