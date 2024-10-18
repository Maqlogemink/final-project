<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;


// Default route to show all products
$routes->get('/', 'Produk::index'); // Rute ini harus ada

// Route untuk melihat detail produk
$routes->get('produk/detail/(:num)', 'Produk::detail/$1');

// Route untuk checkout produk
$routes->get('produk/checkout/(:num)', 'Produk::checkout/$1');

// Route untuk memproses pesanan
$routes->post('produk/lakukanPesanan', 'Produk::lakukanPesanan');
