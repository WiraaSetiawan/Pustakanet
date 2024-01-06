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
          <a href="/input" class="block">Input Data Buku</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/categories" class="block">Category</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/user" class="block">Data user</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/borrows" class="block">Data peminjamam</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/main" class="block">Go to User Page</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/logout" class="block">Logout</a>
        </li>
      </ul>
    </nav>
    </aside>

    <main class="ml-64 p-6">
        <h2 class="text-2xl font-semibold mb-4 text-black">List Data</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Penulis</th>
                        <th class="py-2 px-4 border-b">Tahun</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Kategori</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo e($book->title); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($book->author); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($book->publish_year); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($book->status); ?></td>
                        <td class="py-2 px-4 border-b">
                <?php if($book->categories): ?>
               <?php $__currentLoopData = $book->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php echo e($category->name); ?>

                <?php if(!$loop->last): ?>
                ,
                <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php endif; ?>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="<?php echo e(route('book.edit', ['id' => $book->id])); ?>" class="text-primary mr-2">Edit</a>
                            <form action="<?php echo e(route('book.delete',['id' => $book->id])); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-secondary">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html><?php /**PATH C:\booknew\book\resources\views/admin.blade.php ENDPATH**/ ?>