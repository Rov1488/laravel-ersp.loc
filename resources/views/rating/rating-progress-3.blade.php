<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Рейтинг проверки данных</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes progressGrow {
      from { width: 0; }
      to { width: 50%; }
    }
    .animate-progress {
      animation: progressGrow 1.5s ease-out forwards;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-sm py-6">
    <div class="max-w-6xl mx-auto text-center">
      <h1 class="text-3xl font-bold text-blue-700">Панель проверки показателей</h1>
      <p class="text-gray-500">Мониторинг работы комиссии</p>
    </div>
  </header>

  <!-- Progress Section -->
  <section class="max-w-6xl mx-auto mt-10 bg-white rounded-2xl shadow p-6">
    <div class="flex justify-between mb-3">
      <h2 class="text-xl font-semibold">Общий прогресс</h2>
      <span class="text-gray-600 font-medium">2 / 4 завершено</span>
    </div>
    <div class="bg-gray-200 h-3 rounded-full overflow-hidden">
      <div class="bg-green-500 h-3 rounded-full animate-progress" style="width: 50%"></div>
    </div>
  </section>

  <!-- Комиссия -->
  <section class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">

    <!-- Completed -->
    <div class="bg-white rounded-xl shadow hover:shadow-md transition p-5 border-t-4 border-green-500">
      <h3 class="text-xl font-bold mb-1 text-green-600">Иванов Иван</h3>
      <p class="text-gray-600">Показатели 1–3</p>
      <p class="text-sm mt-2 text-green-700 font-medium">✅ Проверено — 85 баллов</p>
      <p class="text-xs text-gray-400 mt-1">27.06.2025</p>
    </div>

    <div class="bg-white rounded-xl shadow hover:shadow-md transition p-5 border-t-4 border-green-500">
      <h3 class="text-xl font-bold mb-1 text-green-600">Петрова Анна</h3>
      <p class="text-gray-600">Показатели 4–6</p>
      <p class="text-sm mt-2 text-green-700 font-medium">✅ Проверено — 90 баллов</p>
      <p class="text-xs text-gray-400 mt-1">27.06.2025</p>
    </div>

    <div class="bg-white rounded-xl shadow hover:shadow-md transition p-5 border-t-4 border-red-500">
      <h3 class="text-xl font-bold mb-1 text-red-600">Сидоров Виктор</h3>
      <p class="text-gray-600">Показатели 7–9</p>
      <p class="text-sm mt-2 text-red-600 font-medium">⚠ Ошибка в показателе 7</p>
      <button class="mt-3 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Исправить</button>
    </div>

    <div class="bg-white rounded-xl shadow hover:shadow-md transition p-5 border-t-4 border-gray-400">
      <h3 class="text-xl font-bold mb-1 text-gray-600">Кузнецова Елена</h3>
      <p class="text-gray-600">Показатели 10–12</p>
      <p class="text-sm mt-2 text-gray-500">⏳ В процессе проверки</p>
      <div class="mt-4 flex gap-2">
        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Подтвердить</button>
        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Отклонить</button>
      </div>
    </div>

  </section>

  <!-- Таблица -->
  <section class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow">
    <h2 class="text-2xl font-semibold mb-4">Рейтинг страховщиков</h2>
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="bg-blue-600 text-white">
            <th class="p-3 rounded-tl-lg">Компания</th>
            <th class="p-3">Статус</th>
            <th class="p-3 rounded-tr-lg">Баллы</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray-50">
            <td class="p-3 font-medium">Страховщик 1</td>
            <td class="p-3 text-green-600">Проверено</td>
            <td class="p-3">175</td>
          </tr>
          <tr class="border-b hover:bg-gray-50">
            <td class="p-3 font-medium">Страховщик 2</td>
            <td class="p-3 text-red-600">Ошибки</td>
            <td class="p-3">-3</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-medium">Страховщик 3</td>
            <td class="p-3 text-gray-600">В работе</td>
            <td class="p-3">0</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Footer -->
  <footer class="mt-12 py-6 bg-gray-800 text-gray-200 text-center">
    <p>© 2025 Rating System — support@rating-system.uz</p>
  </footer>

</body>
</html>