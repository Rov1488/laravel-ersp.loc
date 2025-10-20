<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Прогресс рейтинга и Дисклеймер</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .progress-bar {
      height: 2rem;
      background-color: #d1d5db;
      border-radius: 0.5rem;
      overflow: hidden;
    }
    .progress-bar-fill {
      height: 100%;
      background-color: #22c55e;
    }
    .step {
      margin-bottom: 1.5rem;
      padding: 1rem;
      border-radius: 0.5rem;
      font-size: 1.25rem;
    }
    .step.completed {
      background-color: #d1fae5;
    }
    .step.rejected {
      background-color: #fee2e2;
    }
    .step.pending {
      background-color: #e5e7eb;
    }
    .step-number {
      display: inline-block;
      width: 2rem;
      height: 2rem;
      line-height: 2rem;
      text-align: center;
      background-color: #9ca3af;
      color: white;
      border-radius: 50%;
      margin-right: 1rem;
    }
    .step.completed .step-number {
      background-color: #22c55e;
    }
    .step.rejected .step-number {
      background-color: #ef4444;
    }
    .disclaimer-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 2rem;
      background-color: #f9fafb;
      border-radius: 0.5rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .disclaimer-title {
      font-size: 1.875rem;
      font-weight: bold;
      color: #1f2937;
      margin-bottom: 1rem;
    }
    .disclaimer-text {
      font-size: 1rem;
      color: #4b5563;
      line-height: 1.5;
    }
    .disclaimer-text p {
      margin-bottom: 1rem;
    }
    .tab {
      display: none;
    }
    .tab.active {
      display: block;
    }
    .tab-button {
      padding: 1rem 2rem;
      font-size: 1.25rem;
      font-weight: bold;
      cursor: pointer;
    }
    .tab-button.active {
      background-color: #3b82f6;
      color: white;
      border-radius: 0.5rem 0.5rem 0 0;
    }
  </style>
</head>
<body class="bg-gray-200">
  <header class="bg-blue-500 text-white p-6 text-center">
    <h1 class="text-3xl font-bold">Проверка рейтинга страховщиков</h1>
    <p class="text-lg">Простое отслеживание и информация</p>
  </header>

  <main class="max-w-4xl mx-auto p-6">
    <!-- Navigation Tabs -->
    <div class="flex border-b-2 border-blue-500 mb-6">
      <button class="tab-button active" onclick="openTab(event, 'progress')">Прогресс рейтинга</button>
      <button class="tab-button" onclick="openTab(event, 'disclaimer')">Дисклеймер</button>
    </div>
<!-- Navigation Tabs end-->

    <!-- Content Sections Progress rating start-->
    <div id="progress" class="tab active">
      <section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Как далеко мы продвинулись?</h2>
        <div class="progress-bar">
          <div class="progress-bar-fill" style="width: 50%;"></div>
        </div>
        <p class="text-lg mt-2">Прогресс: 2 из 4 человек закончили проверку (50%)</p>
      </section>

      <section class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Что делает комиссия?</h2>
        <div class="step completed">
          <span class="step-number">1</span>
          <h3 class="inline font-bold">Иванов Иван</h3>
          <p>Проверяет показатели 1-3</p>
          <p class="text-lg">Статус: <span class="text-green-600">Готово</span></p>
          <p>Оценка: 85 баллов</p>
          <p class="text-sm">Закончено: 27.06.2025</p>
        </div>

        <div class="step completed">
          <span class="step-number">2</span>
          <h3 class="inline font-bold">Петрова Анна</h3>
          <p>Проверяет показатели 4-6</p>
          <p class="text-lg">Статус: <span class="text-green-600">Готово</span></p>
          <p>Оценка: 90 баллов</p>
          <p class="text-sm">Закончено: 27.06.2025</p>
        </div>

        <div class="step rejected">
          <span class="step-number">3</span>
          <h3 class="inline font-bold">Сидоров Виктор</h3>
          <p>Проверяет показатели 7-9</p>
          <p class="text-lg">Статус: <span class="text-red-600">Найдены ошибки</span></p>
          <p>Проблема: Ошибка в показателе 7 (-3 балла)</p>
          <button class="bg-red-500 text-white px-4 py-2 rounded mt-2">Исправить</button>
        </div>

        <div class="step pending">
          <span class="step-number">4</span>
          <h3 class="inline font-bold">Кузнецова Елена</h3>
          <p>Проверяет показатели 10-12</p>
          <p class="text-lg">Статус: <span class="text-gray-600">В работе</span></p>
          <div class="mt-2 flex space-x-2">
            <button class="bg-green-500 text-white px-4 py-2 rounded">Подтвердить</button>
            <button class="bg-red-500 text-white px-4 py-2 rounded">Отклонить</button>
          </div>
        </div>
      </section>

      <section>
        <h2 class="text-2xl font-bold mb-4">Состояние страховщиков</h2>
        <div class="bg-white p-4 rounded shadow">
          <table class="w-full text-left">
            <thead>
              <tr class="bg-blue-500 text-white">
                <th class="p-3">Страховщик</th>
                <th class="p-3">Статус</th>
                <th class="p-3">Баллы</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t">
                <td class="p-3">Страховщик 1</td>
                <td class="p-3 text-green-600">Проверено</td>
                <td class="p-3">175</td>
              </tr>
              <tr class="border-t">
                <td class="p-3">Страховщик 2</td>
                <td class="p-3 text-red-600">Ошибки</td>
                <td class="p-3">-3</td>
              </tr>
              <tr class="border-t">
                <td class="p-3">Страховщик 3</td>
                <td class="p-3 text-gray-600">В работе</td>
                <td class="p-3">0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
 <!-- Content Sections Progress rating end-->

 <!-- Content Sections Disclaimer start-->
    <div id="disclaimer" class="tab">
      <div class="disclaimer-container">
        <h2 class="disclaimer-title">Дисклеймер</h2>
        <div class="disclaimer-text">
          <p>Информация на сайте <strong>Rating System</strong> показана только для информации. Мы стараемся, чтобы данные были правильными, но не обещаем, что они всегда точные.</p>
          <p>Вы используете информацию на свой риск. Мы не отвечаем за проблемы, если вы используете данные с сайта.</p>
          <p>Рейтинги зависят от отчетов страховщиков. Если в отчетах ошибки, мы не виноваты.</p>
          <p>На сайте могут быть ссылки на другие сайты. Мы не отвечаем за то, что там написано.</p>
          <p>Вопросы? Пишите нам: <a href="mailto:support@rating-system.uz" class="text-blue-500 hover:underline">support@rating-system.uz</a>.</p>
        </div>
      </div>
    </div>
    <!-- Content Sections Disclaimer end-->
  </main>

  <footer class="bg-blue-500 text-white p-6 text-center">
    <p class="text-lg">© 2025 Rating System. Все права защищены.</p>
    <p><a href="mailto:support@rating-system.uz" class="text-white hover:underline">Контакты: support@rating-system.uz</a></p>
  </footer>

  <script>
    function openTab(event, tabId) {
      document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
      document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
      document.getElementById(tabId).classList.add('active');
      event.currentTarget.classList.add('active');
    }
  </script>
</body>
</html>