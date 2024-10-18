<?php namespace App\Controllers;

use App\Models\Produk_model;

class Produk extends BaseController {
    protected $produkModel;

    public function __construct() {
        $this->produkModel = new Produk_model();
        
    }

    public function index() {
        $data['produk'] = $this->produkModel->ambilSemuaProduk();
        if (empty($data['produk'])) {
            log_message('info', 'Tidak ada produk ditemukan.');
        }
        return view('daftar_produk', $data);
    }

    public function cari() {
        $keyword = $this->request->getGet('keyword');
        $data['produk'] = $this->produkModel->cariProduk($keyword);
        
        return view('daftar_produk', $data);
    }
    

    
    public function detail($id) {
        $produk = $this->produkModel->ambilProdukBerdasarkanId($id);
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id tidak ditemukan.");
        }
        $data['produk'] = $produk;
        return view('detail_produk', $data);
    }

    public function checkout($id) {
        $produk = $this->produkModel->ambilProdukBerdasarkanId($id);
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id tidak ditemukan.");
        }
        $data['produk'] = $produk;
        return view('checkout', $data);
    }

    public function lakukanPesanan() {
        $pelanggan_id = $this->request->getPost('pelanggan_id');
        $produk_id = $this->request->getPost('produk_id');
        $jumlah = $this->request->getPost('jumlah');

        $this->produkModel->lakukanPesanan($pelanggan_id, $produk_id, $jumlah);
        session()->setFlashdata('pesan', 'Pesanan berhasil dilakukan!');
        // Redirect ke halaman produk
        return redirect()->to('/produk/index');
    }
}
