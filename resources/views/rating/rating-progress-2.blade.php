<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Прогресс проверки данных</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center py-8 shadow-lg">
    <h1 class="text-4xl font-bold mb-2">Отслеживание проверки данных</h1>
    <p class="text-lg opacity-90">Комиссия по оценке страховщиков</p>
  </header>

  <main class="max-w-5xl mx-auto px-6 py-10">

    <!-- Прогресс -->
    <section class="bg-white p-6 rounded-2xl shadow mb-10">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-semibold">Прогресс проверки</h2>
        <span class="text-lg text-gray-500">50%</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-4">
        <div class="bg-green-500 h-4 rounded-full" style="width: 50%"></div>
      </div>
      <p class="mt-3 text-gray-600">2 из 4 экспертов завершили проверку</p>
    </section>

    <!-- Карточки экспертов -->
    <section class="grid md:grid-cols-2 gap-6">

      <!-- Completed -->
      <div class="bg-green-50 border border-green-200 rounded-xl p-5 shadow-sm">
        <div class="flex justify-between items-center mb-3">
          <h3 class="font-bold text-xl">Иванов Иван</h3>
          <span class="text-green-600 font-medium">✅ Готово</span>
        </div>
        <p>Проверяет: показатели 1–3</p>
        <p class="text-sm text-gray-500 mt-1">Оценка: <span class="font-bold">85</span></p>
        <p class="text-sm text-gray-400">Завершено: 27.06.2025</p>
      </div>

      <div class="bg-green-50 border border-green-200 rounded-xl p-5 shadow-sm">
        <div class="flex justify-between items-center mb-3">
          <h3 class="font-bold text-xl">Петрова Анна</h3>
          <span class="text-green-600 font-medium">✅ Готово</span>
        </div>
        <p>Проверяет: показатели 4–6</p>
        <p class="text-sm text-gray-500 mt-1">Оценка: <span class="font-bold">90</span></p>
        <p class="text-sm text-gray-400">Завершено: 27.06.2025</p>
      </div>

      <!-- Rejected -->
      <div class="bg-red-50 border border-red-200 rounded-xl p-5 shadow-sm">
        <div class="flex justify-between items-center mb-3">
          <h3 class="font-bold text-xl">Сидоров Виктор</h3>
          <span class="text-red-600 font-medium">⚠ Ошибки</span>
        </div>
        <p>Проверяет: показатели 7–9</p>
        <p class="text-sm text-red-600 mt-1">Ошибка в показателе 7 (-3 балла)</p>
        <button class="mt-3 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Исправить</button>
      </div>

      <!-- Pending -->
      <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 shadow-sm">
        <div class="flex justify-between items-center mb-3">
          <h3 class="font-bold text-xl">Кузнецова Елена</h3>
          <span class="text-gray-500 font-medium">⏳ В работе</span>
        </div>
        <p>Проверяет: показатели 10–12</p>
        <div class="mt-4 flex gap-3">
          <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Подтвердить</button>
          <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Отклонить</button>
        </div>
      </div>
    </section>

    <!-- Таблица -->
    <section class="mt-10 bg-white p-6 rounded-2xl shadow">
      <h2 class="text-2xl font-semibold mb-4">Состояние страховщиков</h2>
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-blue-600 text-white text-left">
            <th class="p-3 rounded-tl-lg">Страховщик</th>
            <th class="p-3">Статус</th>
            <th class="p-3 rounded-tr-lg">Баллы</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b">
            <td class="p-3">Страховщик 1</td>
            <td class="p-3 text-green-600">Проверено</td>
            <td class="p-3 font-semibold">175</td>
          </tr>
          <tr class="border-b">
            <td class="p-3">Страховщик 2</td>
            <td class="p-3 text-red-600">Ошибки</td>
            <td class="p-3 font-semibold">-3</td>
          </tr>
          <tr>
            <td class="p-3">Страховщик 3</td>
            <td class="p-3 text-gray-500">В работе</td>
            <td class="p-3 font-semibold">0</td>
          </tr>
        </tbody>
      </table>
    </section>

  </main>

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-center py-6 mt-10">
    <p>Связаться с поддержкой: support@rating-system.uz</p>
  </footer>

</body>
</html>