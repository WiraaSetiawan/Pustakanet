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
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" />
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
                <a href="/login"><button class="bg-[#5FBDFF] text-white px-5 py-2 rounded-full hover:bg-[#96EFFF] hover:text-gray-500">Login</button></a>
                <ion-icon onclick="onToggleMenu(this)" name="menu-outline" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
        </nav>
    </header>

    <div class="flex p-8 lg:items-center">
        <div class="flex">
            <img class="h-[400px] object-contain rounded-xl" src="<?php echo e(URL('img/vol-2.jpeg')); ?>" alt="" id="main-image">
        </div>

        <div class="flex flex-col gap-4 mr-20">
            <div>
                <span class="text-[#343a69] font-semibold text-5xl my-12"><?php echo e($book->genre); ?></span>
                <h1 class="text-3xl text-black font-bold my-6"><?php echo e($book->judul); ?></h1>
            </div>
            <div>
                <p class="text-black">
                    <?php echo e($book->sinopsis); ?>

                </p>
            </div>

            <div>
                <p class="text-black text-lg">Penulis: <span class="font-semibold"><?php echo e($book->penulis); ?></span></p>
            </div>
            <div>
                <p class="text-black text-lg">Jumlah Hal: <span class="font-semibold"><?php echo e($book->jumlah_halaman); ?></span></p>
            </div>
            <div>
                <p class="text-black text-lg">Status: <span class="font-semibold"><?php echo e($book->status); ?></span></p>
            </div>

                <p class="text-black text-lg">Tanggal Terbit: <span class="font-semibold"><?php echo e($book->tanggal_terbit); ?></span></p>
            </div>
        
        </div>
    </div>

<h2 class="text-white text-center">DISINI NANTI ISI FORUM DISKUSI TERKAIT BUKU PKE VUE JS MSH TAK USAHAIN TAK BUAT, ERROR MULU DRI TADI</h2>

    <footer>
        <aside class="items-center grid-flow-col text-black text-center mt-6">
            <p>Copyright © 2023 Pustakanet - All right reserved</p>
        </aside>
    </footer>
</body>
</html><?php /**PATH D:\Kelompok web\book\resources\views/detail_book.blade.php ENDPATH**/ ?>