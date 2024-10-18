<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Checkout</h1>
        <p>Produk: <?php echo $produk->nama; ?></p>
        <p>Harga: <?php echo $produk->harga; ?></p>
        <form action="<?php echo base_url('produk/lakukanPesanan'); ?>" method="post" class="mt-4">
        <input type="hidden" name="pelanggan_id" value="<?php echo session()->get('pelanggan_id'); ?>">
            <input type="hidden" name="produk_id" value="<?php echo $produk->id; ?>">
            <div class="mb-4">
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="number" name="jumlah" value="1" min="1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Lakukan Pemesanan</button>
        </form>
    </div>
</body>
</html>