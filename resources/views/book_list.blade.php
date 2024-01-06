<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shelf</title>
    <!-- 
        COLOR PALLETE
        SECONDARY = #96EFFF
        PRIMARY = #5FBDFF
        DARK = #7B66FF
        LIGHT = #C5FFF8
     -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
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

    <div class="m-36 flex justify-between items-center grid grid-cols-3 gap-y-28">
        @foreach($books as $book)
        <div class="flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="aspect-auto object-contain mx-4 -mt-6 h-[400px] overflow-hidden rounded-xl bg-cover bg-center" style="background-image: url('img/{{ $book->cover_img }}');">
            </div>
            <div class="p-6">
                <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    {{ $book->title }}
                </h5>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    {{ $book->author }}
                </p>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    {{ $book->publish_year }}
                </p>
            </div>
            <div class="p-6 pt-0">
                <a href="{{ route('detail_book.show', ['slug' => $book->slug]) }}">
                <button data-ripple-light="true" type="button" class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Read More
                </button>
                </a>
            </div>
        </div>
            @endforeach
    </div>

    <footer>
        <aside class="items-center text-black text-center mt-6">
            <p>Copyright © 2023 Pustakanet - All right reserved</p>
        </aside>
    </footer>
</body>
</html>