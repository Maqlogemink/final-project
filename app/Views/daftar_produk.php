<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk yang Tersedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Bagian Utama (header, main, dan footer jika ada) -->
    <header class="py-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert" aria-live="assertive">
                <?php echo session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <h1 class="text-3xl font-extrabold text-center text-gray-800">Produk yang Tersedia</h1>
    </header>

    <main class="container mx-auto p-6">
        <!-- Form pencarian produk -->
        <form action="<?php echo base_url('produk/cari'); ?>" method="get" class="mb-6" role="search" aria-label="Form pencarian produk">
            <label for="keyword" class="sr-only">Cari produk:</label>
            <input type="text" id="keyword" name="keyword" placeholder="Cari produk..." class="border px-4 py-2 rounded-md w-full" aria-label="Cari produk">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">
                Cari
            </button>
        </form>

        <!-- Daftar produk -->
        <section aria-labelledby="product-list-heading">
            <h2 id="product-list-heading" class="sr-only">Daftar produk yang tersedia</h2>
            <ul class="list-none space-y-4">
                <?php foreach ($produk as $item) { ?>
                    <li>
                        <article class="p-4 bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <h3 class="text-lg font-semibold">
                                <a href="<?php echo base_url('produk/detail/' . $item->id); ?>" class="text-blue-600 hover:text-blue-800">
                                    <?php echo $item->nama; ?>
                                </a>
                            </h3>
                        </article>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </main>
</body>
</html>
