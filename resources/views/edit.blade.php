<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <!-- 
        COLOR PALLETE
        SECONDARY = #96EFFF
        PRIMARY = #5FBDFF
        DARK = #7B66FF
        LIGHT = #C5FFF8
     -->
     <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,200&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
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

    <div class="flex flex-col items-center justify-center h-screen">
      <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Update Data</h2>

        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT') 
       <input type="text" name="title" value ="{{$book->title}}"class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Judul">
      <label class="text-black mt-6 mb-2">Gambar cover Buku</label>

      <input type="file" name="cover_img" value ="{{ $book->cover_img }}" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" accept="image/*" placeholder="cover">

      <input type="text" name="author"  value ="{{$book->author}}" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Penulis">



      <label for="category" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">Kategori</label>
      @foreach ($categories as $category)
    <label class="inline-flex items-center">
        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
            @if ($book->categories && in_array($category->id, $book->categories->pluck('id')->toArray()))
                checked
            @endif
            class="form-checkbox h-5 w-5 text-blue-600">
        <span class="ml-2 text-gray-700">{{ $category->name }}</span>
    </label>
@endforeach

      <input type="text" name="pages"  value ="{{$book->pages}}" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Jumlah halaman">
      <input type="year" name="publish_year"  value ="{{$book->publish_year}}" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="Tahun Terbit">
      <input type="text" name="sipnosis"  value ="{{$book->sipnosis}}" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150" placeholder="sipnosis">
      <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">Update</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
    $('.select-multiple').select2();
    });
    </script>

</div>

</body>
</html>