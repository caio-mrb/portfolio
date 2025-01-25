<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>

    <script>
        (function() {
            const savedMode = localStorage.getItem('darkMode');
            const isDarkModePreferred = savedMode === 'true' ||
                (savedMode === null && window.matchMedia('(prefers-color-scheme: dark)').matches);

            if (isDarkModePreferred) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
</head>

<body class="flex flex-col min-h-screen bg-neutral-100 dark:bg-slate-900">
    <header
        class="bg-neutral-100 dark:border-b-1 border-slate-600 dark:bg-slate-900 w-full h-fit fixed z-30 top-0 select-none">
        <div class="max-w-7xl mx-auto p-4 h-16">
            <nav class="flex justify-between items-center h-full">
                <!-- Mobile Menu Toggle -->
                <svg id="mobile-menu-toggle"
                    class="block sm:hidden cursor-pointer w-7 fill-neutral-800 dark:fill-slate-600 transition-transform duration-300 ease-in-out"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                </svg>

                <a href="/" class="font-bold text-blue-600 dark:text-slate-400 text-xl">Caio Barbosa</a>

                <div class="flex items-center space-x-4">
                    <!-- Existing desktop menu items -->
                    <a href="/"
                        class="hidden sm:block text-neutral-800 dark:text-slate-400 text-lg hover:brightness-75 
                        {{ request()->is('/') ? 'font-bold' : '' }}">Home</a>
                    <a href="/about"
                        class="hidden sm:block text-neutral-800 dark:text-slate-400 text-lg hover:brightness-75 
                        {{ request()->is('about') ? 'font-bold' : '' }}">About
                        Me</a>
                    <a href="/contact"
                        class="hidden sm:block text-neutral-800 dark:text-slate-400 text-lg hover:brightness-75 mr-10 
                        {{ request()->is('contact') ? 'font-bold' : '' }}">Contact</a>

                    <!-- Dark mode toggle and other existing elements -->
                    <div class="flex items-center space-x-2">
                        <svg class="fill-yellow-500 dark:fill-slate-600 cursor-pointer h-7"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M375.7 19.7c-1.5-8-6.9-14.7-14.4-17.8s-16.1-2.2-22.8 2.4L256 61.1 173.5 4.2c-6.7-4.6-15.3-5.5-22.8-2.4s-12.9 9.8-14.4 17.8l-18.1 98.5L19.7 136.3c-8 1.5-14.7 6.9-17.8 14.4s-2.2 16.1 2.4 22.8L61.1 256 4.2 338.5c-4.6 6.7-5.5 15.3-2.4 22.8s9.8 13 17.8 14.4l98.5 18.1 18.1 98.5c1.5 8 6.9 14.7 14.4 17.8s16.1 2.2 22.8-2.4L256 450.9l82.5 56.9c6.7 4.6 15.3 5.5 22.8 2.4s12.9-9.8 14.4-17.8l18.1-98.5 98.5-18.1c8-1.5 14.7-6.9 17.8-14.4s2.2-16.1-2.4-22.8L450.9 256l56.9-82.5c4.6-6.7 5.5-15.3 2.4-22.8s-9.8-12.9-17.8-14.4l-98.5-18.1L375.7 19.7zM269.6 110l65.6-45.2 14.4 78.3c1.8 9.8 9.5 17.5 19.3 19.3l78.3 14.4L402 242.4c-5.7 8.2-5.7 19 0 27.2l45.2 65.6-78.3 14.4c-9.8 1.8-17.5 9.5-19.3 19.3l-14.4 78.3L269.6 402c-8.2-5.7-19-5.7-27.2 0l-65.6 45.2-14.4-78.3c-1.8-9.8-9.5-17.5-19.3-19.3L64.8 335.2 110 269.6c5.7-8.2 5.7-19 0-27.2L64.8 176.8l78.3-14.4c9.8-1.8 17.5-9.5 19.3-19.3l14.4-78.3L242.4 110c8.2 5.7 19 5.7 27.2 0zM256 368a112 112 0 1 0 0-224 112 112 0 1 0 0 224zM192 256a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z" />
                        </svg>
                        <label for="darkmode-toggle" class="inline-flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" id="darkmode-toggle" class="hidden" onchange="toggleDarkMode()">
                                <div
                                    class="toggle-bg w-12 h-6 bg-gray-300 dark:bg-slate-600 rounded-full p-1 flex items-center">
                                    <div
                                        class="toggle-circle w-4 h-4 bg-neutral-100 dark:bg-slate-900 rounded-full shadow-md transition-all duration-100">
                                    </div>
                                </div>
                            </div>
                        </label>
                        <svg class="fill-blue-600 dark:fill-slate-600 h-7" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512">
                            <path
                                d="M144.7 98.7c-21 34.1-33.1 74.3-33.1 117.3c0 98 62.8 181.4 150.4 211.7c-12.4 2.8-25.3 4.3-38.6 4.3C126.6 432 48 353.3 48 256c0-68.9 39.4-128.4 96.8-157.3zm62.1-66C91.1 41.2 0 137.9 0 256C0 379.7 100 480 223.5 480c47.8 0 92-15 128.4-40.6c1.9-1.3 3.7-2.7 5.5-4c4.8-3.6 9.4-7.4 13.9-11.4c2.7-2.4 5.3-4.8 7.9-7.3c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-3.7 .6-7.4 1.2-11.1 1.6c-5 .5-10.1 .9-15.3 1c-1.2 0-2.5 0-3.7 0l-.3 0c-96.8-.2-175.2-78.9-175.2-176c0-54.8 24.9-103.7 64.1-136c1-.9 2.1-1.7 3.2-2.6c4-3.2 8.2-6.2 12.5-9c3.1-2 6.3-4 9.6-5.8c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-3.6-.3-7.1-.5-10.7-.6c-2.7-.1-5.5-.1-8.2-.1c-3.3 0-6.5 .1-9.8 .2c-2.3 .1-4.6 .2-6.9 .4z" />
                        </svg>
                    </div>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobile-menu"
                class="fixed top-16 left-0 w-4/5 w-full bg-neutral-100 dark:bg-slate-900 z-50 sm:hidden 
                transform transition-all duration-300 ease-in-out -translate-x-full opacity-0 shadow-lg rounded-br-xl">
                <div class="flex flex-col p-4 space-y-4">
                    <a href="/"
                        class="text-neutral-800 dark:text-slate-400 text-lg hover:brightness-75 
                        {{ request()->is('/') ? 'font-bold' : '' }}">Home</a>
                    <a href="/about"
                        class="text-neutral-800 dark:text-slate-400 text-lg hover:brightness-75 
                        {{ request()->is('about') ? 'font-bold' : '' }}">About
                        Me</a>
                    <a href="/contact"
                        class="text-neutral-800 dark:text-slate-400 text-lg hover:brightness-75 
                        {{ request()->is('contact') ? 'font-bold' : '' }}">Contact</a>
                </div>
            </div>
        </div>
    </header>



    <main class="flex-grow max-w-7xl mx-auto w-full p-4 mt-16 ">
        @yield('content')
    </main>

    <div id="mobile-menu-overlay"
        class="fixed inset-0 bg-black/0 invisible z-20 transition-all duration-300 ease-in-out"></div>

    <footer
        class="w-full bg-blue-700 dark:bg-slate-900 font-semibold text-neutral-100 dark:text-slate-500 dark:border-t-1">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between w-full px-4 py-4">
            <p>Caio Maxwel Ribeiro e Barbosa</p>
            <a class="flex items-center" href="tel:+351963852691">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="h-4 w-4 fill-neutral-100 dark:fill-slate-500 mr-2">
                    <path
                        d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                </svg><span>+351 963 852 691</span></a>

            <a class="flex items-center" href="mailto:caiomaxwel@hotmail.com">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="h-4 w-4 fill-neutral-100 dark:fill-slate-500 mr-2">
                    <path
                        d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                </svg><span>caiomaxwel@hotmail.com</span></a>

            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                    class="h-4 w-4 fill-neutral-100 dark:fill-slate-500 mr-2">
                    <path
                        d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                </svg>
                <p>Leiria, Leiria, Portugal</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new TypeWriter('.typography', [
                'Software Engineer',
                'Web Developer',
                'Full Stack Developer',
                'Problem Solver'
            ], {
                speed: 100,
                delay: 2000,
                loop: true,
                cursor: true
            });

            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            let isMenuOpen = false;

            function toggleMobileMenu() {
                // Toggle menu state
                isMenuOpen = !isMenuOpen;

                if (isMenuOpen) {
                    // Open menu
                    mobileMenu.classList.remove('-translate-x-full');
                    mobileMenu.classList.remove('opacity-0');
                    mobileMenu.classList.add('translate-x-0');
                    mobileMenu.classList.add('opacity-100');

                    // Show overlay
                    mobileMenuOverlay.classList.remove('invisible');
                    mobileMenuOverlay.classList.remove('bg-black/0');
                    mobileMenuOverlay.classList.add('visible');
                    mobileMenuOverlay.classList.add('bg-black/50');

                    // Change to cross icon
                    mobileMenuToggle.innerHTML = `
                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                    `;
                } else {
                    // Close menu
                    mobileMenu.classList.add('-translate-x-full');
                    mobileMenu.classList.add('opacity-0');
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.remove('opacity-100');

                    // Hide overlay
                    mobileMenuOverlay.classList.add('invisible');
                    mobileMenuOverlay.classList.add('bg-black/0');
                    mobileMenuOverlay.classList.remove('visible');
                    mobileMenuOverlay.classList.remove('bg-black/50');

                    // Restore hamburger icon
                    mobileMenuToggle.innerHTML = `
                        <path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
                    `;
                }
            }

            // Toggle menu when menu icon is clicked
            mobileMenuToggle.addEventListener('click', toggleMobileMenu);

            // Close menu when clicking outside
            mobileMenuOverlay.addEventListener('click', () => {
                if (isMenuOpen) {
                    toggleMobileMenu();
                }
            });

            // Rest of the dark mode toggle code remains the same...
            const darkModeToggle = document.getElementById('darkmode-toggle');
            const circle = document.querySelector('.toggle-circle');

            function toggleDarkMode() {
                const checkbox = document.getElementById('darkmode-toggle');
                const circle = document.querySelector('.toggle-circle');
                if (checkbox.checked) {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('darkMode', 'true');
                    circle.classList.add('translate-x-6');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('darkMode', 'false');
                    circle.classList.remove('translate-x-6');
                }
            }

            darkModeToggle.addEventListener('change', toggleDarkMode);

            // Restore dark mode preference
            const savedMode = localStorage.getItem('darkMode');
            const darkModePreferred = savedMode === 'true' ||
                (savedMode === null && window.matchMedia('(prefers-color-scheme: dark)').matches);

            darkModeToggle.checked = darkModePreferred;

            if (darkModePreferred) {
                document.documentElement.classList.add('dark');
                circle.classList.add('translate-x-6');
            } else {
                document.documentElement.classList.remove('dark');
                circle.classList.remove('translate-x-6');
            }
        });
    </script>
</body>

</html>
