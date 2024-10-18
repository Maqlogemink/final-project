<?php namespace App\Models;

use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['nama', 'alamat'];

    public function simpanPelanggan($data)
    {
        $this->insert($data);
    }

    public function ambilPelangganTerbaru()
    {
        return $this->orderBy('id', 'DESC')->first();
    }
}
