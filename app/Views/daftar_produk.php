<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h1 class="text-3xl font-extrabold mb-6 text-center text-gray-800">Daftar Produk</h1>
<ul class="list-none space-y-4">
    <?php foreach ($produk as $item) { ?>
        <li class="p-4 bg-white rounded-lg shadow hover:bg-gray-100 transition-colors">
            <a href="<?php echo base_url('produk/detail/' . $item->id); ?>" class="text-lg text-blue-600 hover:text-blue-800">
                <?php echo $item->nama; ?>
            </a>
        </li>
    <?php } ?>
</ul>
</body>
</html>