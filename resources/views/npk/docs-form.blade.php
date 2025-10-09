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

        /* небольшой стиль для скролла блока contracts */
        .contracts-list {
            max-height: 420px;
            overflow: auto;
        }

        .required {
            color: #dc2626;
            margin-left: .25rem;
        }

        /* red star */
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
                <a href="#"
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

                <div class="mb-12">
                    <h1 class="text-2xl font-semibold mb-4">Создать перестраховочный договор (CreateReinsuranceContract)
                    </h1>
                    <form id="contractForm" class="space-y-6 bg-white dark:bg-slate-800 p-6 rounded-lg shadow">

                        <!-- ofertaUuids (comma separated) -->
                        <div>
                            <label class="block text-sm font-medium mb-1">ofertaUuids <span
                                    class="required">*</span></label>
                            <input id="ofertaUuids" name="ofertaUuids" type="text" placeholder="uuid1, uuid2, uuid3"
                                class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                            <div id="err_ofertaUuids" class="field-error hidden"></div>
                            <div class="text-xs text-slate-500 mt-1">UUID оферт через запятую. (Обязательно если
                                direction=1 и reinsurerIsForeign=1 и isInvest=0)</div>
                        </div>

                        <!-- Direction & ReinsurerIsForeign & isInvest -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">direction <span class="required">*</span>
                                    <div class="text-xs text-slate-400">1 — Исходящий, 2 — Входящий иностранный</div>
                                </label>
                                <select id="direction" name="direction" required
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                                    <option value="">— выберите —</option>
                                    <option value="1">1 — Исходящий</option>
                                    <option value="2">2 — Входящий иностранный</option>
                                </select>
                                <div id="err_direction" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">reinsurerIsForeign <span
                                        class="required">*</span>
                                    <div class="text-xs text-slate-400">0 — местный, 1 — иностранный</div>
                                </label>
                                <select id="reinsurerIsForeign" name="reinsurerIsForeign" required
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                                    <option value="">— выберите —</option>
                                    <option value="0">0 — местный</option>
                                    <option value="1">1 — иностранный</option>
                                </select>
                                <div id="err_reinsurerIsForeign" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">isInvest
                                    <div class="text-xs text-slate-400">0 — нет, 1 — да</div>
                                </label>
                                <select id="isInvest" name="isInvest"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                                    <option value="0">0 — нет</option>
                                    <option value="1">1 — да</option>
                                </select>
                            </div>
                        </div>

                        <!-- Company fields -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div id="wrap_reinsurantForeignInsuranceOrgId">
                                <label class="block text-sm font-medium mb-1">reinsurantForeignInsuranceOrgId
                                    <div class="text-xs text-slate-400">ID иностранной СК — обязателен если direction=2
                                    </div>
                                </label>
                                <input id="reinsurantForeignInsuranceOrgId" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsurantForeignInsuranceOrgId" class="field-error hidden"></div>
                            </div>

                            <div id="wrap_reinsurerOrgId">
                                <label class="block text-sm font-medium mb-1">reinsurerOrgId
                                    <div class="text-xs text-slate-400">ID местного страховщика — обязателен если
                                        direction=1 и reinsurerIsForeign=0</div>
                                </label>
                                <input id="reinsurerOrgId" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsurerOrgId" class="field-error hidden"></div>
                            </div>

                            <div id="wrap_reinsurerForeignOrgId">
                                <label class="block text-sm font-medium mb-1">reinsurerForeignOrgId
                                    <div class="text-xs text-slate-400">ID иностранной СК — обязателен если direction=1
                                        и reinsurerIsForeign=1</div>
                                </label>
                                <input id="reinsurerForeignOrgId" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsurerForeignOrgId" class="field-error hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">reinsuranceTypeId <span
                                        class="required">*</span></label>
                                <input id="reinsuranceTypeId" name="reinsuranceTypeId" required type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                            </div>
                        </div>

                        <!-- Contract basics -->
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">contractNumber <span
                                        class="required">*</span></label>
                                <input id="contractNumber" required type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_contractNumber" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">contractIssueDate <span
                                        class="required">*</span></label>
                                <input id="contractIssueDate" required type="date"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_contractIssueDate" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">reinsuranceFormId <span
                                        class="required">*</span></label>
                                <select id="reinsuranceFormId" required
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                                    <option value="">— выберите —</option>
                                    <option value="1">Облигаторный</option>
                                    <option value="2">Облигаторно-факультативный</option>
                                    <option value="3">Факультативный</option>
                                    <option value="4">Факультативно-облигаторный</option>
                                </select>
                                <div id="err_reinsuranceFormId" class="field-error hidden"></div>
                            </div>
                        </div>

                        <!-- Dates -->
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">reinsuranceStartDate <span
                                        class="required">*</span></label>
                                <input id="reinsuranceStartDate" required type="date"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsuranceStartDate" class="field-error hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">reinsuranceEndDate <span
                                        class="required">*</span></label>
                                <input id="reinsuranceEndDate" required type="date"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsuranceEndDate" class="field-error hidden"></div>
                            </div>
                        </div>

                        <!-- Form-dependent fields -->
                        <div class="grid md:grid-cols-2 gap-4">
                            <div id="obligatorWrap" class="hidden">
                                <label class="block text-sm font-medium mb-1">obligatorCondition</label>
                                <input id="obligatorCondition" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_obligatorCondition" class="field-error hidden"></div>
                            </div>
                            <div id="obligatorOtherWrap" class="hidden">
                                <label class="block text-sm font-medium mb-1">obligatorOtherCondition</label>
                                <input id="obligatorOtherCondition" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_obligatorOtherCondition" class="field-error hidden"></div>
                            </div>

                            <div id="slipNumberWrap" class="hidden">
                                <label class="block text-sm font-medium mb-1">slipNumber</label>
                                <input id="slipNumber" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_slipNumber" class="field-error hidden"></div>
                            </div>
                            <div id="slipDateWrap" class="hidden">
                                <label class="block text-sm font-medium mb-1">slipDate</label>
                                <input id="slipDate" type="date"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_slipDate" class="field-error hidden"></div>
                            </div>
                        </div>

                        <!-- Financials (some required) -->
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">reinsurantShare <span
                                        class="required">*</span></label>
                                <input id="reinsurantShare" required type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsurantShare" class="field-error hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">reinsurantShareInPercents <span
                                        class="required">*</span></label>
                                <input id="reinsurantShareInPercents" required type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsurantShareInPercents" class="field-error hidden"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">reinsurerLimit <span
                                        class="required">*</span></label>
                                <input id="reinsurerLimit" required type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_reinsurerLimit" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">bruttoInsurancePremium <span
                                        class="required">*</span></label>
                                <input id="bruttoInsurancePremium" required type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_bruttoInsurancePremium" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">commission <span
                                        class="required">*</span></label>
                                <input id="commission" required type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_commission" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">nettoInsurancePremium <span
                                        class="required">*</span></label>
                                <input id="nettoInsurancePremium" required type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_nettoInsurancePremium" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">currencyId (опционально)</label>
                                <input id="currencyId" type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">exchangeRate (если currencyId)</label>
                                <input id="exchangeRate" type="number" step="0.0001"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                            </div>
                        </div>

                        <!-- Payments -->
                        <div class="grid md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">paymentTypeId <span
                                        class="required">*</span></label>
                                <input id="paymentTypeId" required type="text"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_paymentTypeId" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">deadlineForFullPremiumPayment <span
                                        class="required">*</span></label>
                                <input id="deadlineForFullPremiumPayment" required type="date"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                                <div id="err_deadlineForFullPremiumPayment" class="field-error hidden"></div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">paidPremium (опционально)</label>
                                <input id="paidPremium" type="number" step="0.01"
                                    class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                            </div>
                        </div>

                        <!-- Invest justification -->
                        <div id="investJustificationWrap" class="hidden">
                            <label class="block text-sm font-medium mb-1">investJustification (обязательно если
                                isInvest=1)</label>
                            <textarea id="investJustification" rows="2" class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700"></textarea>
                            <div id="err_investJustification" class="field-error hidden"></div>
                        </div>

                        <!-- Contracts array -->
                        <section>
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="text-lg font-semibold">contracts (массив)</h3>
                                <div class="space-x-2">
                                    <button id="addContractBtn" type="button"
                                        class="inline-flex items-center px-3 py-2 rounded bg-green-600 text-white">Добавить
                                        контракт</button>
                                    <button id="clearContractsBtn" type="button"
                                        class="inline-flex items-center px-3 py-2 rounded border">Очистить</button>
                                </div>
                            </div>

                            <div id="contractsContainer" class="space-y-3 contracts-list"></div>
                            <div class="text-xs text-slate-500 mt-2">Для локального договора: заполните contractUuid.
                                Для иностранного — передайте все поля кроме contractUuid и отметьте isForeign=1.</div>
                        </section>

                        <!-- Form actions -->
                        <div class="flex items-center gap-3">
                            <button id="submitBtn" type="submit" class="px-5 py-2 bg-primary-600 text-white rounded"
                                style="background:#004AAD">Сохранить / Отправить</button>
                            <button id="previewBtn" type="button" class="px-4 py-2 border rounded">Показать
                                JSON</button>
                            <div id="formMessage" class="text-sm text-red-600 ml-3 hidden"></div>
                        </div>
                    </form>
                </div>

                <!-- JSON modal -->
                <div id="jsonModal" class="fixed inset-0 hidden items-center justify-center z-50">
                    <div class="absolute inset-0 modal-backdrop"></div>
                    <div class="relative max-w-3xl w-full bg-white dark:bg-slate-800 rounded p-4 shadow-lg">
                        <div class="flex justify-between items-center mb-3">
                            <h4 class="font-semibold">JSON payload</h4>
                            <div class="space-x-2">
                                <button id="copyJson" class="px-2 py-1 border rounded">Копировать</button>
                                <button id="closeJson" class="px-2 py-1 border rounded">Закрыть</button>
                            </div>
                        </div>
                        <pre id="jsonOutput" class="text-xs overflow-auto max-h-[60vh] p-2 bg-slate-100 dark:bg-slate-900 rounded"></pre>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        // ---------- init ----------
        document.addEventListener('DOMContentLoaded', () => {
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

            // Elements
            const contractForm = document.getElementById('contractForm');
            const directionEl = document.getElementById('direction');
            const reinsurerIsForeignEl = document.getElementById('reinsurerIsForeign');
            const isInvestEl = document.getElementById('isInvest');
            const ofertaUuidsEl = document.getElementById('ofertaUuids');

            const reinsurantForeignEl = document.getElementById('reinsurantForeignInsuranceOrgId');
            const reinsurerOrgEl = document.getElementById('reinsurerOrgId');
            const reinsurerForeignEl = document.getElementById('reinsurerForeignOrgId');

            const wrap_reinsurantForeign = document.getElementById('wrap_reinsurantForeignInsuranceOrgId');
            const wrap_reinsurerOrg = document.getElementById('wrap_reinsurerOrgId');
            const wrap_reinsurerForeign = document.getElementById('wrap_reinsurerForeignOrgId');

            const reinsuranceFormIdEl = document.getElementById('reinsuranceFormId');
            const obligatorWrap = document.getElementById('obligatorWrap');
            const obligatorOtherWrap = document.getElementById('obligatorOtherWrap');
            const slipNumberWrap = document.getElementById('slipNumberWrap');
            const slipDateWrap = document.getElementById('slipDateWrap');

            const investJustificationWrap = document.getElementById('investJustificationWrap');

            const addContractBtn = document.getElementById('addContractBtn');
            const clearContractsBtn = document.getElementById('clearContractsBtn');
            const contractsContainer = document.getElementById('contractsContainer');

            const previewBtn = document.getElementById('previewBtn');
            const jsonModal = document.getElementById('jsonModal');
            const jsonOutput = document.getElementById('jsonOutput');
            const closeJson = document.getElementById('closeJson');
            const copyJson = document.getElementById('copyJson');
            const formMessage = document.getElementById('formMessage');





            // ---------- helpers ----------
            function showFieldError(id, msg) {
                const el = document.getElementById('err_' + id);
                if (el) {
                    el.textContent = msg;
                    el.classList.remove('hidden');
                }
            }

            function hideFieldError(id) {
                const el = document.getElementById('err_' + id);
                if (el) {
                    el.textContent = '';
                    el.classList.add('hidden');
                }
            }

            function clearAllErrors() {
                document.querySelectorAll('.field-error').forEach(e => {
                    e.textContent = '';
                    e.classList.add('hidden');
                });
                formMessage.classList.add('hidden');
            }

            // ---------- conditional UI ----------
            function updateConditionalFields() {
                const dir = directionEl.value;
                const reinsurerIsForeign = reinsurerIsForeignEl.value;

                // reinsurantForeign required if direction=2 (show)
                wrap_reinsurantForeign.style.display = dir === '2' ? 'block' : 'none';

                // reinsurerOrgId if direction=1 and reinsurerIsForeign=0
                wrap_reinsurerOrg.style.display = (dir === '1' && reinsurerIsForeign === '0') ? 'block' : 'none';

                // reinsurerForeignOrgId if direction=1 and reinsurerIsForeign=1
                wrap_reinsurerForeign.style.display = (dir === '1' && reinsurerIsForeign === '1') ? 'block' :
                    'none';

                // ofertaUuids visibility note (always visible but mandatory conditionally) -> handled in validation
            }

            function updateFormIdDepends() {
                const val = reinsuranceFormIdEl.value;
                if (val === '2' || val === '4') {
                    obligatorWrap.classList.remove('hidden');
                    obligatorOtherWrap.classList.remove('hidden');
                    slipNumberWrap.classList.add('hidden');
                    slipDateWrap.classList.add('hidden');
                } else if (val === '1' || val === '3') {
                    slipNumberWrap.classList.remove('hidden');
                    slipDateWrap.classList.remove('hidden');
                    obligatorWrap.classList.add('hidden');
                    obligatorOtherWrap.classList.add('hidden');
                } else {
                    obligatorWrap.classList.add('hidden');
                    obligatorOtherWrap.classList.add('hidden');
                    slipNumberWrap.classList.add('hidden');
                    slipDateWrap.classList.add('hidden');
                }
            }

            function updateInvestDepends() {
                investJustificationWrap.classList.toggle('hidden', isInvestEl.value !== '1');
            }

            // attach events
            directionEl.addEventListener('change', () => {
                updateConditionalFields();
                clearAllErrors();
            });
            reinsurerIsForeignEl.addEventListener('change', () => {
                updateConditionalFields();
                clearAllErrors();
            });
            reinsuranceFormIdEl.addEventListener('change', () => {
                updateFormIdDepends();
                clearAllErrors();
            });
            isInvestEl.addEventListener('change', () => {
                updateInvestDepends();
                clearAllErrors();
            });

            updateConditionalFields();
            updateFormIdDepends();
            updateInvestDepends();

            // ---------- contracts dynamic ----------
            let contractIndex = 0;

            function createContractCard(index) {
                const wrap = document.createElement('div');
                wrap.className =
                    'p-4 bg-slate-50 dark:bg-slate-900 rounded border dark:border-slate-700 relative contract-card';
                wrap.dataset.index = index;

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'absolute top-2 right-2 text-sm px-2 py-1 rounded border';
                removeBtn.textContent = 'Удалить';
                removeBtn.addEventListener('click', () => {
                    wrap.remove();
                });

                const header = document.createElement('div');
                header.className = 'flex items-center justify-between mb-2';
                header.appendChild(document.createTextNode(`Contract #${index+1}`));
                header.appendChild(removeBtn);

                const grid = document.createElement('div');
                grid.className = 'grid grid-cols-1 md:grid-cols-2 gap-2';

                // fields inside contract
                const fields = [{
                        id: 'isForeign',
                        label: 'isForeign',
                        type: 'select',
                        options: [{
                            v: '0',
                            t: '0 - местный'
                        }, {
                            v: '1',
                            t: '1 - иностранный'
                        }]
                    },
                    {
                        id: 'contractUuid',
                        label: 'contractUuid',
                        type: 'text'
                    },
                    {
                        id: 'contractNumber',
                        label: 'contractNumber',
                        type: 'text'
                    },
                    {
                        id: 'contractIssueDate',
                        label: 'contractIssueDate',
                        type: 'date'
                    },
                    {
                        id: 'insuranceFormId',
                        label: 'insuranceFormId',
                        type: 'text'
                    },
                    {
                        id: 'insuranceProductName',
                        label: 'insuranceProductName',
                        type: 'text'
                    },
                    {
                        id: 'insurantName',
                        label: 'insurantName',
                        type: 'text'
                    },
                    {
                        id: 'classes',
                        label: 'classes',
                        type: 'text'
                    },
                    {
                        id: 'insuranceOrgId',
                        label: 'insuranceOrgId',
                        type: 'text'
                    },
                    {
                        id: 'foreignInsuranceOrgId',
                        label: 'foreignInsuranceOrgId',
                        type: 'text'
                    },
                    {
                        id: 'countryId',
                        label: 'countryId',
                        type: 'text'
                    },
                    {
                        id: 'insuranceSum',
                        label: 'insuranceSum',
                        type: 'number'
                    },
                    {
                        id: 'currencyId',
                        label: 'currencyId',
                        type: 'text'
                    },
                    {
                        id: 'startDate',
                        label: 'startDate',
                        type: 'date'
                    },
                    {
                        id: 'endDate',
                        label: 'endDate',
                        type: 'date'
                    },
                    {
                        id: 'insOrgObjectId',
                        label: 'insOrgObjectId',
                        type: 'text'
                    },
                    {
                        id: 'objectName',
                        label: 'objectName',
                        type: 'text'
                    }
                ];

                fields.forEach(f => {
                    const fieldWrap = document.createElement('label');
                    fieldWrap.className = 'text-xs flex flex-col';
                    fieldWrap.innerHTML = `<span class="mb-1">${f.label}</span>`;
                    let input;
                    if (f.type === 'select') {
                        input = document.createElement('select');
                        input.className = `contract-${f.id} p-2 border rounded bg-white dark:bg-slate-700`;
                        f.options.forEach(o => {
                            const opt = document.createElement('option');
                            opt.value = o.v;
                            opt.textContent = o.t;
                            input.appendChild(opt);
                        });
                    } else {
                        input = document.createElement('input');
                        input.type = f.type;
                        input.className = `contract-${f.id} p-2 border rounded bg-white dark:bg-slate-700`;
                    }
                    fieldWrap.appendChild(input);
                    grid.appendChild(fieldWrap);
                });

                wrap.appendChild(header);
                wrap.appendChild(grid);
                return wrap;
            }

            addContractBtn.addEventListener('click', () => {
                const card = createContractCard(contractIndex++);
                contractsContainer.appendChild(card);
            });

            clearContractsBtn.addEventListener('click', () => {
                contractsContainer.innerHTML = '';
                contractIndex = 0;
            });

            // ---------- collect payload ----------
            function collectContracts() {
                const cards = Array.from(contractsContainer.querySelectorAll('.contract-card'));
                return cards.map(card => {
                    const obj = {};
                    const inputs = card.querySelectorAll('input, select, textarea');
                    inputs.forEach(i => {
                        const cls = Array.from(i.classList).find(c => c.startsWith('contract-'));
                        if (!cls) return;
                        const key = cls.replace('contract-', '');
                        let val = i.value;
                        if (i.type === 'number') val = val === '' ? null : Number(val);
                        if (key === 'isForeign') val = val === '1' ? 1 : 0;
                        if (val !== '' && val !== null) obj[key] = val;
                    });
                    return obj;
                });
            }

            function collectForm() {
                const payload = {};

                // ofertaUuids -> array of trimmed non-empty strings
                const rawOferta = ofertaUuidsEl.value.trim();
                payload.ofertaUuids = rawOferta === '' ? [] : rawOferta.split(',').map(s => s.trim()).filter(
                    Boolean);

                // basic fields
                const toNum = (id) => {
                    const v = document.getElementById(id).value;
                    return v === '' ? null : (isFinite(v) ? Number(v) : v);
                };

                payload.direction = toNum('direction');
                payload.reinsurerIsForeign = toNum('reinsurerIsForeign');
                payload.reinsurantForeignInsuranceOrgId = document.getElementById('reinsurantForeignInsuranceOrgId')
                    .value || null;
                payload.reinsurerOrgId = document.getElementById('reinsurerOrgId').value || null;
                payload.reinsurerForeignOrgId = document.getElementById('reinsurerForeignOrgId').value || null;
                payload.contractNumber = document.getElementById('contractNumber').value || null;
                payload.contractIssueDate = document.getElementById('contractIssueDate').value || null;
                payload.reinsuranceStartDate = document.getElementById('reinsuranceStartDate').value || null;
                payload.reinsuranceEndDate = document.getElementById('reinsuranceEndDate').value || null;
                payload.reinsuranceFormId = toNum('reinsuranceFormId');
                payload.reinsuranceTypeId = toNum('reinsuranceTypeId');
                payload.reinsurantShare = toNum('reinsurantShare');
                payload.reinsurantShareInPercents = toNum('reinsurantShareInPercents');
                payload.reinsurerLimit = toNum('reinsurerLimit');
                payload.bruttoInsurancePremium = toNum('bruttoInsurancePremium');
                payload.commission = toNum('commission');
                payload.nettoInsurancePremium = toNum('nettoInsurancePremium');
                payload.currencyId = document.getElementById('currencyId').value || null;
                payload.exchangeRate = toNum('exchangeRate');
                payload.paymentTypeId = document.getElementById('paymentTypeId').value || null;
                payload.deadlineForFullPremiumPayment = document.getElementById('deadlineForFullPremiumPayment')
                    .value || null;
                payload.paidPremium = toNum('paidPremium');
                payload.isInvest = isInvestEl.value === '1' ? 1 : 0;
                payload.investJustification = document.getElementById('investJustification').value || null;

                // dependent fields
                payload.obligatorCondition = document.getElementById('obligatorCondition').value || null;
                payload.obligatorOtherCondition = document.getElementById('obligatorOtherCondition').value || null;
                payload.slipNumber = document.getElementById('slipNumber').value || null;
                payload.slipDate = document.getElementById('slipDate').value || null;

                // contracts array
                payload.contracts = collectContracts();

                return payload;
            }

            // ---------- validation ----------
            function validatePayload(p) {
                const errors = [];

                // reset visible errors
                clearAllErrors();

                // required basics
                if (![1, 2].includes(Number(p.direction))) {
                    errors.push('direction должен быть 1 или 2.');
                    showFieldError('direction', 'Выберите направление (1 или 2).');
                }
                if (p.reinsurerIsForeign === null || p.reinsurerIsForeign === '') {
                    errors.push('reinsurerIsForeign обязателен.');
                    showFieldError('reinsurerIsForeign', 'Выберите — местный(0) или иностранный(1).');
                }
                if (!p.contractNumber) {
                    errors.push('contractNumber обязателен.');
                    showFieldError('contractNumber', 'Введите номер договора.');
                }
                if (!p.contractIssueDate) {
                    errors.push('contractIssueDate обязателен.');
                    showFieldError('contractIssueDate', 'Выберите дату выпуска.');
                }
                if (!p.reinsuranceStartDate) {
                    errors.push('reinsuranceStartDate обязателен.');
                    showFieldError('reinsuranceStartDate', 'Выберите дату начала.');
                }
                if (!p.reinsuranceEndDate) {
                    errors.push('reinsuranceEndDate обязателен.');
                    showFieldError('reinsuranceEndDate', 'Выберите дату конца.');
                }
                if (!p.reinsuranceFormId) {
                    errors.push('reinsuranceFormId обязателен.');
                    showFieldError('reinsuranceFormId', 'Выберите форму перестрахования.');
                }
                if (p.reinsurantShare === null || p.reinsurantShare === undefined) {
                    errors.push('reinsurantShare обязателен.');
                    showFieldError('reinsurantShare', 'Укажите долю (сум).');
                }
                if (p.reinsurantShareInPercents === null || p.reinsurantShareInPercents === undefined) {
                    errors.push('reinsurantShareInPercents обязателен.');
                    showFieldError('reinsurantShareInPercents', 'Укажите долю в %.');
                }
                if (p.reinsurerLimit === null || p.reinsurerLimit === undefined) {
                    errors.push('reinsurerLimit обязателен.');
                    showFieldError('reinsurerLimit', 'Укажите лимит.');
                }
                if (p.bruttoInsurancePremium === null || p.bruttoInsurancePremium === undefined) {
                    errors.push('bruttoInsurancePremium обязателен.');
                    showFieldError('bruttoInsurancePremium', 'Укажите брутто премию.');
                }
                if (p.commission === null || p.commission === undefined) {
                    errors.push('commission обязателен.');
                    showFieldError('commission', 'Укажите комиссию.');
                }
                if (p.nettoInsurancePremium === null || p.nettoInsurancePremium === undefined) {
                    errors.push('nettoInsurancePremium обязателен.');
                    showFieldError('nettoInsurancePremium', 'Укажите нетто премию.');
                }
                if (!p.paymentTypeId) {
                    errors.push('paymentTypeId обязателен.');
                    showFieldError('paymentTypeId', 'Укажите тип оплаты.');
                }
                if (!p.deadlineForFullPremiumPayment) {
                    errors.push('deadlineForFullPremiumPayment обязателен.');
                    showFieldError('deadlineForFullPremiumPayment', 'Укажите срок оплаты.');
                }

                // conditional: direction=2 requires reinsurantForeignInsuranceOrgId
                if (Number(p.direction) === 2 && !p.reinsurantForeignInsuranceOrgId) {
                    errors.push('reinsurantForeignInsuranceOrgId обязателен для direction=2.');
                    showFieldError('reinsurantForeignInsuranceOrgId', 'Обязательное поле при direction=2.');
                }

                // conditional for direction=1
                if (Number(p.direction) === 1) {
                    if (Number(p.reinsurerIsForeign) === 0 && !p.reinsurerOrgId) {
                        errors.push('reinsurerOrgId обязателен для direction=1 и reinsurerIsForeign=0.');
                        showFieldError('reinsurerOrgId',
                            'Обязательное поле при direction=1 и reinsurerIsForeign=0.');
                    }
                    if (Number(p.reinsurerIsForeign) === 1 && !p.reinsurerForeignOrgId) {
                        errors.push('reinsurerForeignOrgId обязателен для direction=1 и reinsurerIsForeign=1.');
                        showFieldError('reinsurerForeignOrgId',
                            'Обязательное поле при direction=1 и reinsurerIsForeign=1.');
                    }
                }

                // ofertaUuids conditional: required if direction=1 and reinsurerIsForeign=1 and isInvest=0
                if (Number(p.direction) === 1 && Number(p.reinsurerIsForeign) === 1 && Number(p.isInvest) === 0) {
                    if (!Array.isArray(p.ofertaUuids) || p.ofertaUuids.length === 0) {
                        errors.push('ofertaUuids обязателен при direction=1 и reinsurerIsForeign=1 и isInvest=0.');
                        showFieldError('ofertaUuids', 'Обязательно: укажите хотя бы один UUID оферты.');
                    }
                }

                // reinsuranceFormId specifics
                const rf = Number(p.reinsuranceFormId);
                if (rf === 2 || rf === 4) {
                    if (!p.obligatorCondition) {
                        errors.push('obligatorCondition обязателен для формы 2/4.');
                        showFieldError('obligatorCondition', 'Укажите условия облигатора.');
                    }
                    if (!p.obligatorOtherCondition) {
                        errors.push('obligatorOtherCondition обязателен для формы 2/4.');
                        showFieldError('obligatorOtherCondition', 'Укажите другие условия облигатора.');
                    }
                } else if (rf === 1 || rf === 3) {
                    if (!p.slipNumber) {
                        errors.push('slipNumber обязателен для формы 1/3.');
                        showFieldError('slipNumber', 'Укажите № слипа.');
                    }
                    if (!p.slipDate) {
                        errors.push('slipDate обязателен для формы 1/3.');
                        showFieldError('slipDate', 'Укажите дату слипа.');
                    }
                }

                // contracts array at least one
                if (!Array.isArray(p.contracts) || p.contracts.length === 0) {
                    errors.push('Добавьте хотя бы один элемент в contracts.');
                    formMessage.textContent = 'Добавьте хотя бы один контракт в раздел contracts.';
                    formMessage.classList.remove('hidden');
                }

                return errors;
            }

            // ---------- preview / modal ----------
            function openJsonModal(payload) {
                jsonOutput.textContent = JSON.stringify(payload, null, 2);
                jsonModal.classList.remove('hidden');
                jsonModal.classList.add('flex');
            }

            function closeJsonModal() {
                jsonModal.classList.add('hidden');
                jsonModal.classList.remove('flex');
            }
            copyJson.addEventListener('click', () => {
                navigator.clipboard.writeText(jsonOutput.textContent).then(() => {
                    copyJson.textContent = 'Скопировано';
                    setTimeout(() => copyJson.textContent = 'Копировать', 1200);
                });
            });
            closeJson.addEventListener('click', closeJsonModal);

            previewBtn.addEventListener('click', (e) => {
                const payload = collectForm();
                clearAllErrors();
                const errs = validatePayload(payload);
                if (errs.length) {
                    // scroll to first error
                    document.querySelector('.field-error:not(.hidden)')?.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    return;
                }
                openJsonModal(payload);
            });

            // ---------- submit with fetch ----------
            contractForm.addEventListener('submit', (e) => {
                e.preventDefault();
                clearAllErrors();
                formMessage.classList.add('hidden');
                const payload = collectForm();

                const errs = validatePayload(payload);
                if (errs.length) {
                    // show summarized message
                    formMessage.textContent = 'Есть ошибки в форме. Исправьте выделенные поля.';
                    formMessage.classList.remove('hidden');
                    scrollToFirstError();
                    return;
                }

                // show modal preview, then post
                openJsonModal(payload);

                // example fetch to test URL
                fetch('https://example.com/api/reinsurance', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                }).then(async res => {
                    const text = await res.text();
                    console.log('Response status:', res.status);
                    console.log('Response text:', text);
                    alert('Форма отправлена (пример). Посмотрите консоль для ответа сервера.');
                }).catch(err => {
                    console.error('Fetch error:', err);
                    alert('Ошибка при отправке (пример). Проверьте консоль.');
                });
            });

            function scrollToFirstError() {
                const node = document.querySelector('.field-error:not(.hidden)');
                if (node) node.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

        }); // DOMContentLoaded
    </script>


</body>

</html>
