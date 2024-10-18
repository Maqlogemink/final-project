<?php namespace App\Controllers;

use App\Models\Pelanggan_model;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new Pelanggan_model();
    }

    public function daftar()
    {
        return view('form_pendaftaran');
    }

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

        $data = [
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->pelangganModel->simpanPelanggan($data);

        $pelanggan = $this->pelangganModel->ambilPelangganTerbaru();
        session()->set('pelanggan_id', $pelanggan['id']);

        // Redirect ke halaman produk setelah pendaftaran
        return redirect()->to('produk/index')->with('message', 'Pendaftaran berhasil, Anda telah login.');
    }
}
