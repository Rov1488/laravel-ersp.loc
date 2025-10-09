<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>НПК Узбекистана — Дашборд</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#1E40AF',
            secondary: '#10B981',
            accent: '#F59E0B',
          },
        },
      },
    };
  </script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    body {
      transition: background-color 0.4s, color 0.4s;
    }
  </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

  <!-- Мобильный хедер -->
  <header class="md:hidden flex items-center justify-between p-4 bg-white shadow-md dark:bg-gray-800">
    <button id="menu-btn" class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
      <i data-lucide="menu" class="w-6 h-6"></i>
    </button>
    <h1 class="font-semibold text-primary dark:text-secondary">НПК Узбекистана</h1>
    <button id="theme-toggle" class="p-2 rounded-md hover:bg-gray-200 dark:hover:bg-gray-700">
      <i data-lucide="moon" class="w-6 h-6"></i>
    </button>
  </header>

  <div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside id="sidebar"
      class="w-64 bg-white dark:bg-gray-800 shadow-lg flex flex-col fixed md:relative z-40 h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300">
      <div class="flex items-center justify-center py-6 border-b dark:border-gray-700">
        <i data-lucide="bar-chart-3" class="w-6 h-6 text-primary dark:text-secondary"></i>
        <span class="ml-3 text-lg font-semibold text-primary dark:text-secondary">Дашборд НПК</span>
      </div>

      <nav class="flex-1 px-4 py-6 space-y-2">
        <a href="#" class="flex items-center px-3 py-2 rounded-lg bg-primary text-white">
          <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> Главная
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
          <i data-lucide="file-signature" class="w-5 h-5 mr-3"></i> Договоры
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
          <i data-lucide="handshake" class="w-5 h-5 mr-3"></i> Перестрахование
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
          <i data-lucide="bar-chart" class="w-5 h-5 mr-3"></i> Отчёты
        </a>
      </nav>

      <div class="border-t px-4 py-4 dark:border-gray-700">
        <button id="theme-toggle-desktop"
          class="w-full flex items-center justify-center px-3 py-2 border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
          <i data-lucide="moon" class="w-5 h-5 mr-2"></i> Тёмная тема
        </button>
      </div>
    </aside>

    <!-- 🌟 Основной контент -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 overflow-y-auto md:ml-64 transition-colors duration-300">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">Дашборд: Ключевые показатели</h2>
            <p class="text-gray-600 dark:text-gray-400">Актуальные данные за текущий месяц (октябрь 2025)</p>
        </div>

        <!-- Секция 1 -->
        <section class="mb-12">
            <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">1. Заключенные входящие и исходящие договоры за месяц</h3>
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
            <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">2. Принятые или отказанные перестраховочные договоры от страховых компаний</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <div class="bg-green-500 inline-block p-3 rounded-full mb-4">
                        <i data-lucide="check" class="w-6 h-6 text-white"></i>
                    </div>
                    <h4 class="text-lg font-medium dark:text-gray-100">Входящие: Принято</h4>
                    <p class="text-3xl font-bold text-green-500 mb-2">38</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Из 50 поступивших</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <div class="bg-red-500 inline-block p-3 rounded-full mb-4">
                        <i data-lucide="x" class="w-6 h-6 text-white"></i>
                    </div>
                    <h4 class="text-lg font-medium dark:text-gray-100">Входящие: Отказано</h4>
                    <p class="text-3xl font-bold text-red-500 mb-2">12</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">24% отказов</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <div class="bg-green-500 inline-block p-3 rounded-full mb-4">
                        <i data-lucide="check" class="w-6 h-6 text-white"></i>
                    </div>
                    <h4 class="text-lg font-medium dark:text-gray-100">Исходящие: Принято</h4>
                    <p class="text-3xl font-bold text-green-500 mb-2">28</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Из 35 поступивших</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <div class="bg-red-500 inline-block p-3 rounded-full mb-4">
                        <i data-lucide="x" class="w-6 h-6 text-white"></i>
                    </div>
                    <h4 class="text-lg font-medium dark:text-gray-100">Исходящие: Отказано</h4>
                    <p class="text-3xl font-bold text-red-500 mb-2">7</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">20% отказов</p>
                </div>
            </div>
        </section>

        <!-- Секция 3 -->
        <section>
            <h3 class="text-xl font-semibold mb-4 dark:text-gray-100">3. Поступившие входящие и исходящие перестраховочные претензии</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="bg-primary p-2 rounded-full mr-3">
                                <i data-lucide="inbox" class="w-6 h-6 text-white"></i>
                            </div>
                            <h4 class="text-lg font-medium dark:text-gray-100">Входящие претензии</h4>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-primary mb-2">56</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Обработано: 42 (75%)</p>
                    <div class="mt-4 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-primary rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="bg-purple-500 p-2 rounded-full mr-3">
                                <i data-lucide="send" class="w-6 h-6 text-white"></i>
                            </div>
                            <h4 class="text-lg font-medium dark:text-gray-100">Исходящие претензии</h4>
                        </div>
                    </div>
                    <p class="text-3xl font-bold text-purple-500 mb-2">23</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Обработано: 18 (78%)</p>
                    <div class="mt-4 h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-purple-500 rounded-full" style="width: 78%"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Претензии -->
        <section>
            <h3 class="text-xl font-semibold mb-4">3️⃣ Поступившие входящие и исходящие перестраховочные претензии</h3>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                <canvas id="claimsChart" height="100"></canvas>
            </div>
        </section>
    </main>
  </div>

  <!-- JS -->
  <script>
    lucide.createIcons();

    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });

    const themeBtns = [document.getElementById('theme-toggle'), document.getElementById('theme-toggle-desktop')];
    const html = document.documentElement;

    function setDarkMode(enable) {
      if (enable) {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      } else {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      }
    }

    themeBtns.forEach(btn => btn && btn.addEventListener('click', () => {
      setDarkMode(!html.classList.contains('dark'));
    }));

    if (localStorage.getItem('theme') === 'dark') html.classList.add('dark');

    // 3️⃣ График претензий
        new Chart(document.getElementById('claimsChart'), {
            type: 'line',
            data: {
                labels: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сен', 'Окт'],
                datasets: [
                    {
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
                plugins: {
                    legend: { position: 'bottom', labels: { color: '#9CA3AF' } }
                },
                scales: {
                    x: { ticks: { color: '#9CA3AF' } },
                    y: { ticks: { color: '#9CA3AF' } }
                }
            }
        });
  </script>
</body>
</html>