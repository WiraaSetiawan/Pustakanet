<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pinjaman</title>
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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#96EFFF] to-[#7B66FF] min-h-screen">
    <header class="bg-white md:py-4 md:px-4">
        <nav class="flex justify-between items-center 2-[92%]">
            <div class="flex items-center">
                <ion-icon name="library-outline" class="w-[40px] h-[40px] cursor-pointer"></ion-icon>
                <p class="ml-4 text-black">Pustakanet</p>
            </div>
            <div class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li class="flex items-center">
                        <ion-icon name="home-outline" class="w-[20px] h-[20px]"></ion-icon>
                        <a class="hover:text-gray-500 ml-2" href="/main">Beranda</a>
                    </li>                    
                    <li class="flex items-center">
                        <ion-icon name="book-outline" class="w-[20px] h-[20px]"></ion-icon>
                        <a class="hover:text-gray-500 ml-2" href="/book_list">Book Shelf</a>
                    </li>
                    <li class="flex items-center">
                    <ion-icon name="file-tray-full-outline" class="w-[20px] h-[20px]"></ion-icon>
                        <a class="hover:text-gray-500 ml-2" href="/daftar_pinjaman">Daftar Peminjaman</a>
                    </li>
                    <li class="flex items-center">
                    <ion-icon name="duplicate-outline" class="w-[20px] h-[20px]"></ion-icon>
                        <a class="hover:text-gray-500 ml-2" href="">Wishlist</a>
                    </li>
                    <li class="flex items-center">
                    <ion-icon name="settings-outline" class="w-[20px] h-[20px]"></ion-icon>
                        <a class="hover:text-gray-500 ml-2" href="">Setting</a>
                    </li>
                </ul>
            </div>
            <div>
                <a></a></a>
                <ion-icon onclick="onToggleMenu(this)" name="menu-outline" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
        </nav>
    </header>

    @if (isset($borrows) && count($borrows) > 0)
    @foreach($borrows as $borrow)
    <div class="flex items-center border p-4 bg-white mx-36 rounded-md mt-5">
        <div class="border border-gray-300 mx-4 flex-shrink-0 h-32 w-20 rounded-md overflow-hidden">
            <img src="{{ asset('img/' . $borrow->book->cover_img) }}" alt="Cover Buku" class="w-full h-full object-cover" />
        </div>
        <div class="mx-4">
            <h2 class="text-lg font-semibold mb-2">{{ $borrow->book->title }}</h2>
            <p class="text-gray-700">Penulis: {{ $borrow->book->author }}</p>
            <p class="text-sm text-gray-600 mt-2">Tanggal Pengembalian: {{ $borrow->return_date }}</p>
            
    
            <form action="{{ route('pengembalian', ['book' => $borrow->book->id]) }}" method="post">
                    @csrf
                    <button class="cursor-pointer group relative flex gap-1.5 my-6 p-4 bg-black bg-opacity-80 text-[#f1f1f1] rounded-3xl hover:bg-opacity-70 transition font-semibold shadow-md" type="submit">Pengembalian</button>
                </form>
        </div>
    </div>
@endforeach
@else
    <p class="text-center text-black">Data Peminjaman Kosong</p>
@endif
    <footer>
        <aside class="items-center grid-flow-col text-black text-center mt-6">
            <p>Copyright © 2023 Pustakanet - All right reserved</p>
        </aside>
    </footer>
</body>
</html>
