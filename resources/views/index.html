<script type="text/javascript">
        var gk_isXlsx = false;
        var gk_xlsxFileLookup = {};
        var gk_fileData = {};
        function filledCell(cell) {
          return cell !== '' && cell != null;
        }
        function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row => row.some(filledCell));

                // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
                var headerRowIndex = filteredData.findIndex((row, index) =>
                  row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
                );
                // Fallback
                if (headerRowIndex === -1 || headerRowIndex > 25) {
                  headerRowIndex = 0;
                }

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
        }
        </script><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отслеживание этапов расчета рейтинга</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Стили для инфографики таймлайна */
        .timeline-step {
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: 2rem;
        }
        .timeline-step::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 1rem;
            height: 1rem;
            background-color: #3b82f6;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 0 0 3px #3b82f6;
        }
        .timeline-step.completed::before {
            background-color: #10b981;
            box-shadow: 0 0 0 3px #10b981;
        }
        .timeline-step::after {
            content: '';
            position: absolute;
            left: 0.45rem;
            top: 1rem;
            width: 0.1rem;
            height: 100%;
            background-color: #3b82f6;
        }
        .timeline-step:last-child::after {
            display: none;
        }
        .timeline-step.completed .step-content {
            background-color: #ecfdf5;
        }
        .step-content {
            background-color: #f3f4f6;
            padding: 1rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s;
        }
        .progress-bar {
            height: 0.5rem;
            background-color: #e5e7eb;
            border-radius: 0.25rem;
            overflow: hidden;
        }
        .progress-bar-fill {
            height: 100%;
            background-color: #10b981;
            transition: width 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Отслеживание рейтинга страховых компаний</h1>
            <p class="text-sm">Инфографика и статус этапов расчета</p>
        </div>
        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded">Выйти</button>
    </header>

    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white p-4 shadow-md h-screen">
            <h2 class="text-lg font-semibold mb-4">Навигация</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-blue-600 hover:underline">Личный кабинет</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Загрузка отчетов</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Уведомления</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">История отчетов</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Создание рейтинга</a></li>
                <li><a href="#" class="text-blue-600 hover:underline">Просмотр рейтинга</a></li>
            </ul>
        </aside>

        <!-- Main Section -->
        <main class="flex-1 p-6">
            <!-- Progress Bar -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Прогресс расчета рейтинга</h2>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width: 50%;"></div> <!-- Пример: 50% прогресса -->
                </div>
                <p class="text-sm text-gray-600 mt-2">Текущий прогресс: 50% (4 из 8 этапов завершены)</p>
            </section>

            <!-- Timeline with Infographic -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Этапы расчета рейтинга</h2>
                <div>
                    <!-- Step 1 -->
                    <div class="timeline-step completed">
                        <div class="step-content">
                            <h3 class="font-semibold">1. Загрузка отчетов</h3>
                            <p class="text-gray-600">Страховщик загружает отчеты (.xlsx) до 5-го числа.</p>
                            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Загрузить отчет</button>
                            <p class="text-sm text-green-600 mt-1">Завершено: 01.06.2025</p>
                        </div>
                    </div>
                    <!-- Step 2 -->
                    <div class="timeline-step completed">
                        <div class="step-content">
                            <h3 class="font-semibold">2. Проверка руководителем</h3>
                            <p class="text-gray-600">Руководитель страховщика утверждает или отклоняет отчеты.</p>
                            <div class="mt-2 flex space-x-2">
                                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Утвердить</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Отклонить</button>
                            </div>
                            <p class="text-sm text-green-600 mt-1">Завершено: 02.06.2025</p>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div class="timeline-step completed">
                        <div class="step-content">
                            <h3 class="font-semibold">3. Отправка в уполномоченный орган</h3>
                            <p class="text-gray-600">Утвержденные отчеты отправляются в уполномоченный орган.</p>
                            <p class="text-sm text-green-600 mt-1">Завершено: 03.06.2025</p>
                        </div>
                    </div>
                    <!-- Step 4 -->
                    <div class="timeline-step completed">
                        <div class="step-content">
                            <h3 class="font-semibold">4. Создание рейтинга</h3>
                            <p class="text-gray-600">Сотрудник органа создает рейтинг на основе данных.</p>
                            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Создать рейтинг</button>
                            <p class="text-sm text-green-600 mt-1">Завершено: 04.06.2025</p>
                        </div>
                    </div>
                    <!-- Step 5 -->
                    <div class="timeline-step">
                        <div class="step-content">
                            <h3 class="font-semibold">5. Проверка данных</h3>
                            <p class="text-gray-600">Сотрудники органа проверяют данные. Ошибки: -3 балла (макс. -9).</p>
                            <div class="mt-2 flex space-x-2">
                                <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Подтвердить</button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Отклонить</button>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Ожидает выполнения</p>
                        </div>
                    </div>
                    <!-- Step 6 -->
                    <div class="timeline-step">
                        <div class="step-content">
                            <h3 class="font-semibold">6. Формирование и публикация</h3>
                            <p class="text-gray-600">Руководитель органа формирует и публикует рейтинг.</p>
                            <div class="mt-2 flex space-x-2">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Сформировать</button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Опубликовать</button>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Ожидает выполнения</p>
                        </div>
                    </div>
                    <!-- Step 7 -->
                    <div class="timeline-step">
                        <div class="step-content">
                            <h3 class="font-semibold">7. Просмотр и скачивание</h3>
                            <p class="text-gray-600">Просмотр рейтинга и скачивание в PDF, PNG, XLS.</p>
                            <div class="mt-2 flex space-x-2">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Просмотр</button>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Скачать PDF</button>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Скачать PNG</button>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Скачать XLS</button>
                            </div>
                            <p class="text-sm text-gray-600 mt-1">Ожидает выполнения</p>
                        </div>
                    </div>
                    <!-- Step 8 -->
                    <div class="timeline-step">
                        <div class="step-content">
                            <h3 class="font-semibold">8. Уведомление страховщиков</h3>
                            <p class="text-gray-600">Результаты рейтинга отправляются страховщикам.</p>
                            <p class="text-sm text-gray-600 mt-1">Ожидает выполнения</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Status Table -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Статус рейтинга</h2>
                <div class="bg-white shadow-md rounded overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="p-3 text-left">Компания</th>
                                <th class="p-3 text-left">Статус отчета</th>
                                <th class="p-3 text-left">Этап</th>
                                <th class="p-3 text-left">Баллы</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="p-3">Страховщик 1</td>
                                <td class="p-3">Утвержден</td>
                                <td class="p-3">Создание рейтинга</td>
                                <td class="p-3">90</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">Страховщик 2</td>
                                <td class="p-3">Отклонен</td>
                                <td class="p-3">Ожидает исправления</td>
                                <td class="p-3">-6</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">Страховщик 3</td>
                                <td class="p-3">Не предоставлен</td>
                                <td class="p-3">Ожидает загрузки</td>
                                <td class="p-3">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Notifications -->
            <section>
                <h2 class="text-xl font-semibold mb-4">Уведомления</h2>
                <div class="bg-white shadow-md rounded p-4">
                    <ul class="space-y-2">
                        <li class="flex items-center space-x-2">
                            <span class="text-red-600">⚠</span>
                            <span>Ошибка в отчете Страховщик 2: неверные данные в 12-показателе.</span>
                            <button class="text-blue-600 hover:underline">Исправить</button>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-green-600">✔</span>
                            <span>Отчет Страховщик 1 успешно утвержден.</span>
                        </li>
                    </ul>
                </div>
            </section>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 text-center">
        <p>Справка | Техподдержка | Правила расчета рейтинга</p>
        <p>Контакты: support@rating-system.uz</p>
    </footer>
</body>
</html>