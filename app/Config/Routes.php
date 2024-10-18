<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Route untuk menampilkan form pendaftaran
$routes->get('/', 'Pelanggan::daftar');

// Route untuk memproses pendaftaran pelanggan
$routes->post('pelanggan/simpan', 'Pelanggan::simpan');

// Default route to show all products
$routes->get('produk/index', 'Produk::index'); // Rute ini harus ada



// Route untuk pencarian produk
$routes->get('produk/cari', 'Produk::cari');

// Route untuk melihat detail produk
$routes->get('produk/detail/(:num)', 'Produk::detail/$1');

// Route untuk checkout produk
$routes->get('produk/checkout/(:num)', 'Produk::checkout/$1');

// Route untuk memproses pesanan
$routes->post('produk/lakukanPesanan', 'Produk::lakukanPesanan');
