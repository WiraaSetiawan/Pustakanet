<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pustakanet</title>
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
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body class="font-[Poppins] bg-gradient-to-t from-[#96EFFF] to-[#7B66FF]">
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
                        <a class="hover:text-gray-500 ml-2" href="/">Beranda</a>
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

    <script>
        const navLinks = document.querrySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>

    <div class="m-24 flex items-center">
        <div class="flex-1 pr-6">
            <h2 class="text-[#343a69] text-5xl uppercase font-semibold tracking-wide leading-10 mb-4">temukanlah buku terbaik</h2>
            <ul id="typing-list" class="text-white text-4xl uppercase font-semibold tracking-wide mb-7">
                <li>tentang <span id="app">{{ currentText }}</span></li>
            </ul>
            <p class="text-base font-medium mb-7 text-black">
            Dirancang untuk mempermudah pengguna dalam melakukan <br>
            peminjaman dan pengembalian buku. Mulailah membaca <br>
            dan jelajahilah dunia baru bersama kami
            </p>
            <a href="/book_list" class="text-white bg-[#226A80] no-underline uppercase font-bold tracking-wide py-2 px-5 rounded-md">get started</a>
        </div>
        <div class="ml-auto">
            <img src="<?php echo e(URL('img/book.png')); ?>" class="w-[500px] h-[400px]">
        </div>

        <script>
            const app = Vue.createApp({
                data() {
                    return {
                        texts: [
                            "Artikel",
                            "Pembelajaran",
                            "Biografi",
                            "Novel"
                        ],
                        index: 0,
                        currentText: ''
                    };
                },
                methods: {
                    typeWriter(text) {
                        let innerText = '';
                        let charIndex = 0;

                        const addChar = () => {
                            if (charIndex < text.length) {
                                innerText += text.charAt(charIndex);
                                this.currentText = innerText;
                                charIndex++;
                                setTimeout(addChar, 100);
                            }
                        };

                        addChar();
                    },
                    changeText() {
                        this.index = this.index < this.texts.length - 1 ? this.index + 1 : 0;
                        const text = this.texts[this.index];
                        this.currentText = '';
                        this.typeWriter(text);
                    },
                    startTypingAnimation() {
                        setInterval(this.changeText, 2000);
                    }
                },
                mounted() {
                    this.startTypingAnimation();
                }
            });

            app.mount('#app');
        </script>
    </div>

    <h2 class="mt-12 w-full text-center text-white text-4xl uppercase font-semibold tracking-wide mb-7">Kenapa harus Pustakanet </h2>

    <div class="mx-52 mt-12 mb-52 flex justify-between">
        <div class="m-4 flex-shrink-0 group duration-500 cursor-pointer group overflow-hidden relative text-gray-50 h-72 w-56 rounded-2xl hover:duration-700 duration-700">
            <div class="w-56 h-72 bg-lime-400 text-gray-800">
                <div class="flex flex-row justify-between"></div>
            </div>
            <div class="absolute bg-gray-50 -bottom-24 w-56 p-3 flex flex-col gap-1 group-hover:-bottom-0 group-hover:duration-600 duration-500">
                <span class="text-gray-800 font-bold text-3xl">Mudah Digunakan</span>
                <p class="text-neutral-800">Memudahkan mengakses dan mengontrol perpustakaan anda</p>
            </div>
        </div>

        <div class="m-4 flex-shrink-0 group duration-500 cursor-pointer group overflow-hidden relative text-gray-50 h-72 w-56 rounded-2xl hover:duration-700 duration-700">
            <div class="w-56 h-72 bg-lime-400 text-gray-800">
                <div class="flex flex-row justify-between"></div>
            </div>
            <div class="absolute bg-gray-50 -bottom-24 w-56 p-3 flex flex-col gap-1 group-hover:-bottom-0 group-hover:duration-600 duration-500">
                <span class="text-gray-800 font-bold text-3xl">Akses Mudah</span>
                <p class="text-neutral-800">Akses ke ribuan buku dari berbagai penerbit di dunia</p>
            </div>
        </div>

        <div class="m-4 flex-shrink-0 group duration-500 cursor-pointer group overflow-hidden relative text-gray-50 h-72 w-56 rounded-2xl hover:duration-700 duration-700">
            <div class="w-56 h-72 bg-lime-400 text-gray-800">
                <div class="flex flex-row justify-between"></div>
            </div>
            <div class="absolute bg-gray-50 -bottom-24 w-56 p-3 flex flex-col gap-1 group-hover:-bottom-0 group-hover:duration-600 duration-500">
                <span class="text-gray-800 font-bold text-3xl">Komunitas yang terbuka</span>
                <p class="text-neutral-800">Memiliki komunitas aktif yang mendengarkan request ataupun keluhan pengguna</p>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center space-x-4">
        <a href="#" class="text-gray-500 hover:text-black transition-colors duration-300">
            <ion-icon name="logo-facebook" class="w-[50px] h-[50px] mx-12"></ion-icon>
        </a>
        <a href="#" class="text-gray-500 hover:text-black transition-colors duration-300">
            <ion-icon name="logo-instagram" class="w-[50px] h-[50px] mx-12"></ion-icon>
        </a>
        <a href="#" class="text-gray-500 hover:text-black transition-colors duration-300">
            <ion-icon name="logo-twitter" class="w-[50px] h-[50px] mx-12"></ion-icon>
        </a>
    </div>

    <footer>
        <aside class="items-center grid-flow-col text-black text-center mt-6">
            <p>Copyright © 2023 Pustakanet - All right reserved</p>
        </aside>
    </footer>
</body>
</html><?php /**PATH D:\.Project\web laravel\book\resources\views/welcome.blade.php ENDPATH**/ ?>