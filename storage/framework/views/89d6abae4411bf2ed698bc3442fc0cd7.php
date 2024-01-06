<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,200&display=swap" rel="stylesheet">
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
          <a href="/categories" class="block">category</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/user" class="block">data user</a>
        </li>
        <li class="px-4 py-2 hover:bg-gray-700">
          <a href="/main" class="block">Go to User Page</a>
        </li>
      </ul>
    </nav>
    </aside>

    <main class="ml-64 p-6">
        <div>
        <form action="<?php echo e(route('categories.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label for="name" class="text-light">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Enter name">
                </div>
              

                <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">Submit</button>
            </form>
        </div>
    </main>
</body>
</html>
<?php /**PATH C:\booknew\book\resources\views/create_category.blade.php ENDPATH**/ ?>