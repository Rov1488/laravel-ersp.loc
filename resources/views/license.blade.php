<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NAPP - Электронная регистрация</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Josefin Sans', Arial, sans-serif;
            background: linear-gradient(135deg, #F5F7FA 0%, #E0E7FF 100%);
        }

        .header-bg {
            background-color: #FFFFFF;
        }

        .nav-bg {
            background-color: #00345C;
            /* узор справа */
            background-image: url("{{asset('storage/image3.png')}}");
            /* путь к твоему узору */
            background-repeat: no-repeat;
            background-position: 80% 25%;
            background-size: 180px auto;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }

        .card-hover:hover h3 {
            text-decoration: underline;
            color: #CAAF14;
        }

        .chart-container {
            position: relative;
            height: 200px;
            width: 100%;
        }

        .progress-bar {
            background: linear-gradient(to right, #00AEEF 0%, #00AEEF var(--percent), #E5E7EB var(--percent), #E5E7EB 100%);
        }

        .icon-custom {
            filter: hue-rotate(180deg) brightness(0.8) contrast(1.5);
        }

        .main-link {
            transition: color 0.2s ease-in-out;
        }

        .main-link:hover {
            color: #239058;
            text-decoration: underline;
        }        
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body class="text-[#030C11]">

    <!-- Header -->
    <header class="header-bg text-[#0B375B] shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center py-6 px-8">
            <div class="flex items-center gap-4">
                <img src="{{ asset('storage/logo.svg') }}" alt="NAPP Logo" />
            </div>
            <div class="flex items-center gap-6">
                <form class="max-w-lg mx-auto">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-96 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search Mockups, Logos..." required />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-[#D2C988] hover:bg-[#CAAF14] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </form>
                <button
                    class="bg-[#239058] text-white px-5 py-2 rounded-lg shadow-lg hover:bg-[#1d7a47] transition duration-300">Войти</button>
                <button
                    class="bg-[#D2C988] text-white px-5 py-2 rounded-lg shadow-lg hover:bg-[#CAAF14] transition duration-300">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
                <button
                    class="bg-[#D2C988] text-white px-5 py-2 rounded-lg shadow-lg hover:bg-[#CAAF14] transition duration-300">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z" />
                    </svg>
                </button>
                <select class="p-2 rounded-lg text-black bg-[#D2C988] hover:bg-[#CAAF14] border border-gray-300">
                    <option>RU</option>
                    <option>UZ</option>
                    <option>OZ</option>
                    <option>EN</option>
                </select>
            </div>
        </div>
        {{-- <div class="navbar justify-center">
            <a href="#">Главная</a>
            <a href="#">Реестр</a>
            <a href="#">Мой кабинет</a>
            <a href="#">Помощь</a>
            <a href="#" class="btn"><span>+</span>Подать заявку</a>
        </div> --}}
        <nav class="nav-bg text-white">
            <div class="max-w-7xl mx-auto flex justify-center gap-8 px-12 py-3 font-semibold uppercase text-base tracking-wide">
                <div class="flex gap-8 pt-4">
                <a href="#" class="main-link">Главная</a>
                <a href="#" class="main-link">Реестр</a>
                <a href="#" class="main-link">Мой кабинет</a>
                <a href="#" class="main-link">Помощь</a>
                </div>
                <button class="bg-[#239058] text-white px-8 py-3 rounded-lg shadow-lg hover:bg-[#1d7a47] transition duration-300">Подать заявку</button>                
            </div>
        </nav>
    </header>

    <!-- Hero -->
    <section class="max-w-7xl mx-auto py-20 px-6 text-center">
        <h1 class="text-4xl font-extrabold text-[#0B375B] tracking-wide leading-tight">
            СИСТЕМА <span class="text-[#239058]">ЭЛЕКТРОННОЙ РЕГИСТРАЦИИ</span>
        </h1>
        <p class="mt-6 text-gray-700 max-w-3xl mx-auto leading-relaxed">
            Подать заявку на получение лицензии или разрешения стало проще — удобные сервисы, прозрачность и скорость
            обработки. Начните прямо сейчас!
        </p>
    </section>

    <!-- Cards -->
    <section
        class="max-w-7xl rounded-lg bg-white mx-auto px-10 py-10 grid md:grid-cols-2 lg:grid-cols-2 gap-8 px-6 mb-16">
        <p class="col-span-full justify-left pt-5 font-semibold text-lg text-[#0B375B]"> <span
                style="background-color: #D2C988; text-[#D2C988] hight:var(--percent) width:var(--percent)">|</span>
            Виды лицензий и разрешительных документов по направлениям</p>
        <div class="bg-white border border-[#0B375B]/20 rounded-2xl p-8 shadow-md card-hover">
            <h3 class="font-semibold text-xl text-[#D2C988]"><a href="#">Провайдеры услуг и оборот
                    крипто-активов</a></h3>
            <p class="pt-5 font-semibold text-lg text-[#0B375B]"><a href="#">Майнинг</a> | <a
                    href="#">Крипто-биржи</a> | <a href="#">Крипто-магазины</a></p>
        </div>
        <div class="bg-white border border-[#0B375B]/20 rounded-2xl p-8 shadow-md card-hover">
            <h3 class="font-semibold text-xl text-[#239058]"><a href="#">Рынок капитала</a></h3>
            <p class="pt-5 font-semibold text-lg text-[#0B375B]"><a href="#">Инвестиционные посредники</a> | <a
                    href="#">Консультанты</a></p>
        </div>
        <div class="bg-white border border-[#0B375B]/20 rounded-2xl p-8 shadow-md card-hover">
            <h3 class="font-semibold text-xl text-[#D2C988]"><a href="#">Рынок страхования</a></h3>
            <p class="pt-5 font-semibold text-lg text-[#0B375B]"><a href="#">Страховая деятельность</a> | <a
                    href="#">Перестрахование</a></p>
        </div>
        <div class="bg-white border border-[#0B375B]/20 rounded-2xl p-8 shadow-md card-hover">
            <h3 class="font-semibold text-xl text-[#D2C988]"><a href="#">Организации игр, основанных на риске
                    (Гемблинг)</a></h3>
            <p class="pt-5 font-semibold text-lg text-[#0B375B]"><a href="#">Деятельность по организации
                    лотерей</a> | <a href="#">Деятельность по организации игр, основанных на риске, во всемирной
                    информационной сети Интернет</a> | <a href="#">Букмекерская деятельность</a></p>
        </div>
    </section>

    <!-- Statistics with fixed-size charts -->
    <section class="max-w-7xl rounded-lg bg-white mx-auto px-10 py-10 gap-8 px-6 mb-16">
        <h2 class="font-bold text-2xl mb-8 text-[#0B375B] text-center">Общая статистика</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="chart-container">
                <canvas id="chart1"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="chart2"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="chart3"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="chart4"></canvas>
            </div>
        </div>
        <div class="my-16">
            <h1 class="text-2xl font-bold mb-6">По деятельности</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-center gap-4">
                    <img src="https://img.icons8.com/ios-filled/50/0B375B/bitcoin.png" alt="Bitcoin Icon"
                        class="w-12 h-12" />
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">"Провайдер услуг"</h2>
                        <p class="text-sm text-gray-600">123 заявок</p>
                        <div class="w-full h-4 bg-gray-300 rounded-full mt-2">
                            <div class="progress-bar h-4 rounded-full" style="--percent: 55%;"></div>
                        </div>
                        <p class="text-sm text-gray-400">55%</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <img src="https://img.icons8.com/ios-filled/50/0B375B/graph.png" alt="Capital Icon"
                        class="w-12 h-12" />
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">"Рынок капитала"</h2>
                        <p class="text-sm text-gray-600">40 заявок</p>
                        <div class="w-full h-4 bg-gray-300 rounded-full mt-2">
                            <div class="progress-bar h-4 rounded-full" style="--percent: 30%;"></div>
                        </div>
                        <p class="text-sm text-gray-400">30%</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('storage/insurance-icon-png-chatGPT (2).png') }}" alt="Bitcoin Icon" />
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">"Cтрахование"</h2>
                        <p class="text-sm text-gray-600">35 заявок</p>
                        <div class="w-full h-4 bg-gray-300 rounded-full mt-2">
                            <div class="progress-bar h-4 rounded-full" style="--percent: 55%;"></div>
                        </div>
                        <p class="text-sm text-gray-400">55%</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <img src="https://img.icons8.com/ios-filled/50/0B375B/shopping-cart.png" alt="Commerce Icon"
                        class="w-12 h-12" />
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">Электронная коммерция</h2>
                        <p class="text-sm text-gray-600">160 заявок</p>
                        <div class="w-full h-4 bg-gray-300 rounded-full mt-2">
                            <div class="progress-bar h-4 rounded-full" style="--percent: 75%;"></div>
                        </div>
                        <p class="text-sm text-gray-400">75%</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <img src="https://img.icons8.com/ios-filled/50/0B375B/dice.png" alt="Gambling Icon"
                        class="w-12 h-12" />
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold">Организации игр, основанных на риске (Гемблинг)</h2>
                        <p class="text-sm text-gray-600">160 заявок</p>
                        <div class="w-full h-4 bg-gray-300 rounded-full mt-2">
                            <div class="progress-bar h-4 rounded-full" style="--percent: 75%;"></div>
                        </div>
                        <p class="text-sm text-gray-400">75%</p>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="font-bold text-2xl mb-8 text-[#0B375B] text-center">Статистика за месяц (Август 2025)</h2>
        <div class="chart-container h-96">
            <canvas id="barChart"></canvas>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0B375B] text-white py-12">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-12 px-6">
            <div>
                <h4 class="font-bold text-xl text-[#D2C988]">Навигация</h4>
                <ul class="mt-4 space-y-2 text-base">
                    <li><a href="#" class="hover:text-[#239058] transition">Главная</a></li>
                    <li><a href="#" class="hover:text-[#239058] transition">Реестр</a></li>
                    <li><a href="#" class="hover:text-[#239058] transition">Статистика</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-xl text-[#D2C988]">Нужна помощь?</h4>
                <p class="mt-4 text-base">+998 71 231-79-09</p>
                <p class="text-base">info@napp.uz</p>
            </div>
            <div>
                <h4 class="font-bold text-xl text-[#D2C988]">Мы в соцсетях</h4>
                <p class="mt-4 text-base">Twitter | Telegram | Facebook</p>
            </div>
        </div>
        <p class="text-center text-sm text-gray-400 mt-8">© 2025 НАПУ. Все права защищены.</p>
    </footer>

    <!-- Charts -->
    <script>
        // Custom plugin to display percentage in the center
        const centerTextPlugin = {
            id: 'centerText',
            afterDatasetsDraw(chart) {
                const {
                    ctx,
                    data
                } = chart;
                const dataset = data.datasets[0];
                const total = dataset.data.reduce((acc, value) => acc + value, 0);
                const percentage = Math.round((dataset.data[0] / total) * 100);

                ctx.save();
                ctx.font = 'bold 20px Josefin Sans';
                ctx.fillStyle = '#030C11';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                const centerX = chart.getDatasetMeta(0).data[0].x;
                const centerY = chart.getDatasetMeta(0).data[0].y;
                ctx.fillText(`${percentage}%`, centerX, centerY);
                ctx.restore();
            }
        };

        // Doughnut charts (общая статистика)
        const doughnutOpts = {
            type: 'doughnut',
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => `${ctx.label}: ${ctx.parsed}%`
                        }
                    }
                }
            }
        };

        new Chart(document.getElementById('chart1'), {
            ...doughnutOpts,
            plugins: [centerTextPlugin],
            data: {
                labels: ['Успешно', 'Остальное'],
                datasets: [{
                    data: [95, 5],
                    backgroundColor: ['#239058', '#e5e7eb']
                }]
            }
        });
        new Chart(document.getElementById('chart2'), {
            ...doughnutOpts,
            plugins: [centerTextPlugin],
            data: {
                labels: ['На рассмотрении', 'Остальное'],
                datasets: [{
                    data: [1.55, 98.45],
                    backgroundColor: ['#D2C988', '#e5e7eb']
                }]
            }
        });
        new Chart(document.getElementById('chart3'), {
            ...doughnutOpts,
            plugins: [centerTextPlugin],
            data: {
                labels: ['Отклонено', 'Остальное'],
                datasets: [{
                    data: [6.92, 93.08],
                    backgroundColor: ['#DA484C', '#e5e7eb']
                }]
            }
        });
        new Chart(document.getElementById('chart4'), {
            ...doughnutOpts,
            plugins: [centerTextPlugin],
            data: {
                labels: ['Завершено', 'Остальное'],
                datasets: [{
                    data: [91.05, 8.95],
                    backgroundColor: ['#0B375B', '#e5e7eb']
                }]
            }
        });

        // Stacked bar chart (статистика за месяц)
        const days = Array.from({
            length: 12
        }, (_, i) => `День ${i + 1}`);

        const datasetData = {
            incoming: [150, 180, 120, 200, 170, 160, 190, 210, 180, 200, 220, 170],
            reviewing: [30, 20, 40, 25, 35, 30, 20, 25, 30, 40, 25, 35],
            rejected: [10, 15, 8, 12, 20, 15, 18, 10, 12, 14, 15, 10],
            finished: [120, 150, 110, 180, 140, 130, 160, 190, 150, 170, 200, 140],
        };

        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: days,
                datasets: [{
                        label: 'Поступившие',
                        data: datasetData.incoming,
                        backgroundColor: '#239058'
                    },
                    {
                        label: 'На рассмотрении',
                        data: datasetData.reviewing,
                        backgroundColor: '#D2C988'
                    },
                    {
                        label: 'Отклоненные',
                        data: datasetData.rejected,
                        backgroundColor: '#DA484C'
                    },
                    {
                        label: 'Завершенные',
                        data: datasetData.finished,
                        backgroundColor: '#0B375B'
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
                            boxWidth: 10,
                            padding: 10
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    x: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Дни'
                        }
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Количество заявок'
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
