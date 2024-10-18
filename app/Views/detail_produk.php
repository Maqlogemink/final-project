<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h1 class="text-2xl font-bold mb-4">Checkout</h1>

<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>
    <p class="text-lg">Nama Produk: <?php echo $produk->nama; ?></p>
    <p class="text-lg">Harga: Rp <?php echo number_format($produk->harga, 0, ',', '.'); ?></p>
</div>


<form action="<?php echo base_url('produk/lakukanPesanan'); ?>" method="post" class="mt-4">
    <input type="hidden" name="pelanggan_id" value="<?php echo session()->get('pelanggan_id'); ?>">
    <input type="hidden" name="produk_id" value="<?php echo $produk->id; ?>">

    <div class="mb-4">
        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
        <input type="number" name="jumlah" value="1" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <div>
        <input type="submit" value="Lakukan Pemesanan" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </div>
</form>
</body>
</html>