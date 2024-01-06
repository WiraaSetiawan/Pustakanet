<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- 
        COLOR PALLETE
        SECONDARY = #96EFFF
        PRIMARY = #5FBDFF
        DARK = #7B66FF
        LIGHT = #C5FFF8
     -->
     <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,200&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
    /* Style untuk warna dari palet yang diberikan */
    .bg-primary { background-color: #5FBDFF; }
    .bg-secondary { background-color: #96EFFF; }
    .bg-dark { background-color: #7B66FF; }
    .bg-light { background-color: #C5FFF8; }
    .text-primary { color: #5FBDFF; }
    .text-secondary { color: #96EFFF; }
    .text-dark { color: #7B66FF; }
    .text-light { color: #C5FFF8; }
    </style>
</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#96EFFF] to-[#7B66FF] min-h-screen">
  <aside class="bg-gray-800 text-gray-200 h-screen w-64 fixed top-0 left-0 overflow-y-auto">
    <div class="p-4">
      <h1 class="text-2xl font-semibold">Admin Dashboard</h1>
      <p class="text-sm mt-2">Welcome, Admin</p>
    </div>
    <nav>
      <ul class="mt-6">
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/admin" class="block">Dashboard</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/input" class="block">Input Data</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/main" class="block">Go to User Page</a>
        </li>
      </ul>
    </nav>
  </aside>


  <main class="ml-64 p-6">
    <h2 class="text-2xl font-semibold mb-4 text-black">List Data</h2>

    <div class="flex flex-col gap-4">
      <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="flex items-center bg-white p-4 rounded-md shadow-md justify-between">
        <div class="flex items-center">
      <div class="border border-gray-300 mr-4 flex-shrink-0 h-32 w-20 rounded-md overflow-hidden">
        <img src="img/<?php echo e($book->sampul); ?>" alt="Cover Buku" class="w-full h-full object-cover" />
      </div>
          <div>
            <h3 class="text-lg font-semibold mb-2 text-black"><?php echo e($book->judul); ?></h3>
            <label class="text-black">Pengarang</label>
            <p class="text-black"><?php echo e($book->penulis); ?></p>
          </div>
        </div>
        <div>
          <form action="<?php echo e(route('book.edit', $book->id)); ?>" method="POST" class="flex flex-col" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <a href="<?php echo e(route('book.update', ['id' => $book->id])); ?>"><button class="px-4 py-2 bg-primary text-black rounded-md mr-2 mb-4">Update</button></a>
          </form>
          <form action="<?php echo e(route('book.delete',['id' => $book->id])); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button class="px-4 py-2 bg-secondary text-black rounded-md">Delete</button>
          </form>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </main>
</body>
</html><?php /**PATH D:\Kelompok web\book\resources\views/admin.blade.php ENDPATH**/ ?>