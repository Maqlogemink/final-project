<?php namespace App\Models;
use CodeIgniter\Model;

class Produk_model extends Model
{
    public function ambilSemuaProduk()
{
    $builder = $this->db->table('produk');
    $query = $builder->get();
    return $query->getResult();
}

public function cariProduk($keyword) {
    return $this->db->table('produk')
        ->like('nama', $keyword)
        ->get()
        ->getResult();
}


public function ambilProdukBerdasarkanId($id)
{
    $builder = $this->db->table('produk');
    $builder->where('id', $id);
    $query = $builder->get();
    return $query->getRow();
}

public function lakukanPesanan($pelanggan_id, $produk_id, $jumlah)
{
    $produk = $this->ambilProdukBerdasarkanId($produk_id);

    $total_harga = $produk->harga * $jumlah;

    // Menyimpan data pesanan
    $builder = $this->db->table('pesanan');
    $builder->insert([
        'pelanggan_id' => $pelanggan_id,
        'produk_id'    => $produk_id,
        'jumlah'       => $jumlah,
        'total_harga'  => $total_harga
    ]);
}

}
