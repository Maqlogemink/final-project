<?php namespace App\Controllers;

use App\Models\Produk_model; // Pastikan path ini sesuai

class Produk extends BaseController {
    protected $produkModel;

    public function __construct() {
        // Memuat model
        $this->produkModel = new Produk_model();
        
    }

    public function index() {
        // Mengambil semua produk
        $data['produk'] = $this->produkModel->ambilSemuaProduk();
        // Debugging
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
        // Mengambil produk berdasarkan ID
        $produk = $this->produkModel->ambilProdukBerdasarkanId($id);
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id tidak ditemukan.");
        }
        $data['produk'] = $produk;
        return view('detail_produk', $data);
    }

    public function checkout($id) {
        // Mengambil produk untuk halaman checkout
        $produk = $this->produkModel->ambilProdukBerdasarkanId($id);
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id tidak ditemukan.");
        }
        $data['produk'] = $produk;
        return view('checkout', $data);
    }

    public function lakukanPesanan() {
        // Mengambil data dari form
        $pelanggan_id = $this->request->getPost('pelanggan_id');
        $produk_id = $this->request->getPost('produk_id');
        $jumlah = $this->request->getPost('jumlah');

        // Memuat model dan membuat pesanan
        $this->produkModel->lakukanPesanan($pelanggan_id, $produk_id, $jumlah);
        session()->setFlashdata('pesan', 'Pesanan berhasil dilakukan!');
        // Redirect ke halaman produk
        return redirect()->to('/produk/index');
    }
}