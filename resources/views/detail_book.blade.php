
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Book</title>
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

    <!-- Main Content -->
    <div class="flex p-24 lg:items-center">
        <!-- Gambar Buku -->
        <div class="flex">
            <img class="aspect-auto object-fit-cover h-[300px] w-[200px] object-contain rounded-xl" src="{{ asset('img/' . $book->cover_img) }}" alt="" id="main-image">
        </div>


        <!-- Informasi Buku -->
        <div class="flex flex-col mx-8">
                <!-- Judul Buku -->
            <div>
                <h1 class="text-3xl text-black font-bold my-2">{{ $book->title }}</h1>
            </div>

            <div class="mb-6">
                <p class="text-black text-lg">Kategori:</p>
                @if($book->categories)
                @foreach($book->categories as $category)
                <span class="font-semibold text-black">{{ $category->name }},</span>
                @if(!$loop->last)
                ,
                @endif
                @endforeach
                @endif
            </div>
            
            <div class="collapse text-black">
                <input type="radio" name="my-accordion-1" checked="checked" /> 
                <div class="collapse-title text-xl font-medium">
                    Click to see the sinopsis
                </div>
                <div class="collapse-content"> 
                    <p>{{ $book->sipnosis }}</p>
                </div>
            </div>

            <div class="collapse text-black">
                <input type="radio" name="my-accordion-1" /> 
                <div class="collapse-title text-xl font-medium">
                    Click to see book information
                </div>
                <div class="collapse-content"> 
                    <div class="gap-4">
                        <div>
                            <p class="text-black text-lg">Penulis:
                            <span class="font-semibold">{{ $book->author }}</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-black text-lg">Jumlah Hal: 
                            <span class="font-semibold">{{ $book->pages }}</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-black text-lg">Tanggal Terbit: 
                            <span class="font-semibold">{{ $book->publish_year }}</span>
                            </p>
                        </div>
                        <div>
                            <p class="text-black text-lg">Status: 
                            <span class="font-semibold">{{ $book->status }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end m-6 p8">
        <form action="{{ route('borrow.create', ['book' => $book->id]) }}" method="get">
                @csrf
                <button class="cursor-pointer group relative flex gap-1.5 px-8 py-4 bg-black bg-opacity-80 text-[#f1f1f1] rounded-3xl hover:bg-opacity-70 transition font-semibold shadow-md" type="submit">Pinjam</button>
        </form>
    </div>
    
    <footer>
        <aside class="items-center grid-flow-col text-black text-center mt-6">
            <p>Copyright © 2023 Pustakanet - All right reserved</p>
        </aside>
    </footer>
</body>
</html>









