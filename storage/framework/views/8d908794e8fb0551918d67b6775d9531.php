<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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
    <h1 class="text-2xl font-semibold text-white mb-4">Category List</h1>

    <div class="my-5">
        <table class="w-full border rounded shadow">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="p-4">No.</th>
                    <th class="p-4">Name</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="p-4"><?php echo e($loop->iteration); ?></td>
                        <td class="p-4"><?php echo e($item->name); ?></td>
                        <td class="p-4">
                            <a href="/categories/<?php echo e($item->slug); ?>/edit" class="bg-secondary text-dark px-3 py-1 rounded">edit</a>
                            <a href="#" class="bg-danger text-white px-3 py-1 rounded">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="p-4 text-center">No categories found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

    </div>
  </main>
</body>
</html><?php /**PATH C:\booknew\book\resources\views/editCategory.blade.php ENDPATH**/ ?>