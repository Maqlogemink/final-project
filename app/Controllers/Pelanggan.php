<?php namespace App\Controllers;

use App\Models\Pelanggan_model;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new Pelanggan_model();
    }

    // Menampilkan form pendaftaran
    public function daftar()
    {
        return view('form_pendaftaran');
    }

    // Menyimpan data pelanggan
    public function simpan()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        // Simpan data ke database
        $this->pelangganModel->simpanPelanggan($data);

        // Set session pelanggan_id
        $pelanggan = $this->pelangganModel->ambilPelangganTerbaru();
        session()->set('pelanggan_id', $pelanggan['id']);

        // Redirect ke halaman produk setelah pendaftaran
        return redirect()->to('produk/index')->with('message', 'Pendaftaran berhasil, Anda telah login.');
    }
}
