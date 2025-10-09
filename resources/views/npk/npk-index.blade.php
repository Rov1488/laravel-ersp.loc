<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Инфографика перестрахования</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#004AAD',
                        secondary: '#2563EB',
                        accent: '#C7A33A',
                    },
                },
            },
        };
    </script>

    <!-- Chart.js и Lucide -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <!--Flowbite-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            transition: background-color 0.4s ease, color 0.4s ease;
        }

        .chart-container {
            width: 70%;
            max-width: 900px;
            height: 400px;
            margin: 20px auto;
            background: #1e293b;
            /* чуть тёмный фон под стиль dashboard */
            border-radius: 12px;
            padding: 10px;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-950 text-gray-800 dark:text-gray-100 transition-colors duration-300">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-gray-900 shadow-lg p-6 flex flex-col">
            <div class="flex items-center mb-3">
                <img src="{{ asset('storage/ChatGPT Image 6 окт. 2025 г., 14_53_17.png') }}" alt="Logo"
                    width="60" height="60">
                <span class="ml-3 text-[12px] text-center font-semibold text-primary dark:text-accent">Национальная
                    перестраховочная компания Узбекистана</span>
            </div>
            <hr class="border-gray-300 dark:border-gray-700 mb-3 mt-0 pt-0 py-0">
            <nav class="space-y-2">
                <a href="#"
                    class="flex items-center px-3 py-2 rounded-lg bg-primary/10 dark:bg-gray-800 text-primary dark:text-accent">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> Главная
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i data-lucide="layers" class="w-5 h-5 mr-3"></i> Оферты
                </a>
                <a href="{{ route('docs-form') }}"
                    class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i data-lucide="file-signature" class="w-5 h-5 mr-3"></i> Договоры
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i data-lucide="shield" class="w-5 h-5 mr-3"></i> Претензии
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i data-lucide="handshake" class="w-5 h-5 mr-3"></i> Партнёры
                </a>
                <a href="#"
                    class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                    <i data-lucide="bar-chart-3" class="w-5 h-5 mr-3"></i> Отчёты
                </a>
            </nav>
        </aside>
        <!-- END Sidebar -->

        <div class="flex flex-col flex-1 min-h-screen">

            <!-- HEADER -->
            <header
                class="flex items-center justify-between bg-white px-6 py-3 border-b shadow-sm sticky top-0 dark:bg-gray-900 z-30">
                <!-- Left: Logo + Название -->
                <div class="flex items-center space-x-3 dark:bg-gray-900">
                    {{-- <img src="{{ asset('storage/ChatGPT Image 6 окт. 2025 г., 14_53_17.png') }}" alt="Logo" class="w-10 h-10 rounded-full"> <div class="flex flex-col leading-tight"> 
        <span class="text-xs font-semibold text-gray-700">Национальная</span> <span class="text-xs font-semibold text-gray-700">перестраховочная компания Узбекистана</span> 
      </div> --}}
                </div>
                <!-- Left: Search -->
                <div class="relative flex-1 max-w-lg">
                    <input type="text" placeholder="Поиск..."
                        class="w-full py-2 pl-10 pr-4 text-sm rounded-lg border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-primary focus:outline-none" />
                    <i data-lucide="search" class="absolute left-3 top-2.5 w-5 h-5 text-gray-400"></i>
                </div>

                <!-- Right: Controls -->
                <div class="flex items-center space-x-4 ml-6">
                    <!-- Theme -->
                    <button id="theme-toggle"
                        class="p-2 rounded-lg border border-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i data-lucide="moon" class="w-5 h-5 text-gray-700 dark:text-gray-200"></i>
                    </button>

                    <!-- Language -->
                    <button class="p-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <img src="https://flagcdn.com/w20/ru.png" alt="Русский" class="w-6 h-4 rounded" />
                    </button>

                    <!-- Profile dropdown trigger -->
                    <div class="relative">
                        <button id="profile-btn" class="flex items-center space-x-2 focus:outline-none">
                            <img src="{{ asset('storage/ChatGPT Image 6 окт. 2025 г., 14_53_17.png') }}" alt="User"
                                class="w-9 h-9 rounded-full border-2 border-green-500" />
                            <span class="font-medium text-gray-800 dark:text-gray-200">R.Pulatov</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-500"></i>
                        </button>

                        <!-- Dropdown -->
                        <div id="profile-menu"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hidden">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                <li><a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Профиль</a>
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Настройки</a>
                                </li>
                                <li>
                                    <hr class="border-gray-200 dark:border-gray-700 my-1">
                                </li>
                                <li><a href="#"
                                        class="block px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition">Выход</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Затемнение фона при открытом меню -->
            <div id="dropdown-overlay" class="hidden fixed inset-0 bg-black/40 z-20"></div>
            <!-- END HEADER -->


            <!-- Main -->
            <main class="flex-1 p-8 overflow-y-auto">


                {{-- <div class="flex justify-end mb-6">
        <button id="theme-toggle" class="flex items-center px-3 py-2 rounded-lg border text-sm hover:bg-gray-100 dark:hover:bg-gray-800">
          <i data-lucide="moon" class="w-4 h-4 mr-2"></i> Тёмная тема
        </button>
      </div> --}}

                <h2 class="text-2xl font-bold mb-8 text-primary dark:text-accent">Инфографика перестрахования</h2>

                <!-- Секция 1 -->
                <section class="mb-12">
                    <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">
                        1. Заключённые входящие и исходящие договоры за месяц
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="bg-secondary p-2 rounded-full mr-3">
                                        <i data-lucide="file-text" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <h4 class="text-lg font-medium dark:text-gray-100">Входящие договоры</h4>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-secondary mb-2">45</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Заключено (+12% к прошлому месяцу)</p>
                            <div class="mt-4 h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-secondary rounded-full" style="width: 75%"></div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="bg-accent p-2 rounded-full mr-3">
                                        <i data-lucide="arrow-right-circle" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <h4 class="text-lg font-medium dark:text-gray-100">Исходящие договоры</h4>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-accent mb-2">32</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Заключено (+8% к прошлому месяцу)</p>
                            <div class="mt-4 h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-accent rounded-full" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Секция 2 -->
                <section class="mb-12">
                    <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">
                        2. Принятые / отказанные Оферты
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                            <i data-lucide="check-circle" class="w-8 h-8 text-green-500 mx-auto mb-2"></i>
                            <p class="font-medium">Входящие: Принято</p>
                            <p class="text-2xl font-bold text-green-500">38</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                            <i data-lucide="x-circle" class="w-8 h-8 text-red-500 mx-auto mb-2"></i>
                            <p class="font-medium">Входящие: Отказано</p>
                            <p class="text-2xl font-bold text-red-500">12</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                            <i data-lucide="check-circle" class="w-8 h-8 text-green-500 mx-auto mb-2"></i>
                            <p class="font-medium">Исходящие: Принято</p>
                            <p class="text-2xl font-bold text-green-500">28</p>
                        </div>
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                            <i data-lucide="x-circle" class="w-8 h-8 text-red-500 mx-auto mb-2"></i>
                            <p class="font-medium">Исходящие: Отказано</p>
                            <p class="text-2xl font-bold text-red-500">7</p>
                        </div>
                    </div>
                </section>

                <!-- Секция 3 -->
                <section class="mb-12">
                    <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">
                        3. Перестраховочные претензии
                    </h3>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                        <canvas id="claimsChart" class="w-full h-[400px]"></canvas>
                    </div>
                </section>
                <!-- Секция 4 -->
                <section class="mb-12">
                    <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">
                        4. Оферты между страховыми компаниями (НПК ↔ Страховые)
                    </h3>

                    <div class=" chart-container bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-10">
                        <h4 class="text-lg font-medium mb-4 dark:text-gray-200">Группированная диаграмма</h4>
                        <canvas id="offersGroupedChart"></canvas>
                    </div>

                    <div class=" chart-container bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                        <h4 class="text-lg font-medium mb-4 dark:text-gray-200">Горизонтальная диаграмма</h4>
                        <canvas id="offersBarChart"></canvas>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        lucide.createIcons();

        // Тёмная тема
        const themeBtn = document.getElementById("theme-toggle");
        const html = document.documentElement;

        function setDarkMode(enable) {
            if (enable) {
                html.classList.add("dark");
                localStorage.setItem("theme", "dark");
            } else {
                html.classList.remove("dark");
                localStorage.setItem("theme", "light");
            }
        }

        themeBtn.addEventListener("click", () => {
            setDarkMode(!html.classList.contains("dark"));
        });

        if (localStorage.getItem("theme") === "dark") {
            html.classList.add("dark");
        }

        // Chart.js график
        const ctx = document.getElementById('claimsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сен', 'Окт'],
                datasets: [{
                        label: 'Входящие претензии',
                        data: [40, 45, 50, 42, 55, 60, 58, 62, 59, 56],
                        borderColor: '#1E40AF',
                        backgroundColor: 'rgba(30,64,175,0.2)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Исходящие претензии',
                        data: [20, 25, 18, 22, 27, 23, 26, 25, 24, 23],
                        borderColor: '#8B5CF6',
                        backgroundColor: 'rgba(139,92,246,0.2)',
                        tension: 0.4,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#9CA3AF'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#bbb'
                        },
                        grid: {
                            color: '#333'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#bbb'
                        },
                        grid: {
                            color: '#333'
                        }
                    }
                }
            }
        });

        //Профиль для анимации dropdown
        // Дропдаун профильного меню
        const profileBtn = document.getElementById("profile-btn");
        const profileMenu = document.getElementById("profile-menu");
        const overlay = document.getElementById("dropdown-overlay");

        profileBtn.addEventListener("click", () => {
            const isVisible = !profileMenu.classList.contains("hidden");
            document.querySelectorAll("#profile-menu").forEach(el => el.classList.add("hidden"));
            if (!isVisible) {
                profileMenu.classList.remove("hidden");
                overlay.classList.remove("hidden");
            } else {
                profileMenu.classList.add("hidden");
                overlay.classList.add("hidden");
            }
        });

        overlay.addEventListener("click", () => {
            profileMenu.classList.add("hidden");
            overlay.classList.add("hidden");
        });



        // Chart.js для оферт
        // ==== 4. Оферты между страховыми компаниями ====

        const companies = [
            "UzInsurance",
            "Gross",
            "Kafolat",
            "O‘zagrosug‘urta",
            "Temiryo‘l Sug‘urta"
        ];

        const offersData = {
            received: [45, 32, 28, 40, 22], // Принято НПК от компании
            sent: [30, 25, 20, 35, 18] // Передано НПК другой компании
        };

        // === Группированная диаграмма ===
        const ctxGrouped = document.getElementById("offersGroupedChart").getContext("2d");
        new Chart(ctxGrouped, {
            type: "bar",
            data: {
                labels: companies,
                datasets: [{
                        label: "Принято НПК",
                        data: offersData.received,
                        backgroundColor: "rgba(37,99,235,0.7)", // синий
                        borderRadius: 6
                    },
                    {
                        label: "Передано НПК",
                        data: offersData.sent,
                        backgroundColor: "rgba(199,163,58,0.7)", // золотистый
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: "#bbb"
                        },
                        grid: {
                            color: "#333"
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: "#bbb"
                        },
                        grid: {
                            color: "#333"
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#9CA3AF"
                        }
                    },
                    tooltip: {
                        mode: "index",
                        intersect: false
                    }
                }
            }
        });

        // === Горизонтальная bar-диаграмма ===
        const ctxBar = document.getElementById("offersBarChart").getContext("2d");
        new Chart(ctxBar, {
            type: "bar",
            data: {
                labels: companies,
                datasets: [{
                        label: "Принято НПК",
                        data: offersData.received,
                        backgroundColor: "rgba(37,99,235,0.7)"
                    },
                    {
                        label: "Передано НПК",
                        data: offersData.sent,
                        backgroundColor: "rgba(199,163,58,0.7)"
                    }
                ]
            },
            options: {
                indexAxis: "y", // делает диаграмму горизонтальной
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: "#bbb"
                        },
                        grid: {
                            color: "#333"
                        }
                    },
                    y: {
                        ticks: {
                            color: "#bbb"
                        },
                        grid: {
                            color: "#333"
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#9CA3AF"
                        }
                    },
                    tooltip: {
                        mode: "index",
                        intersect: false
                    }
                }
            }
        });
    </script>


    {{-- <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Neil Sims
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300"
                                    role="none">
                                    neil.sims@flowbite.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav> --}}


</body>

</html>
