<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard — Dark</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <style>
    html,body,#map { height: 100%; }
    body { background: #0b1220; color: #e6eef8; }
    .sidebar { width: 260px; }
    .card { background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); border: 1px solid rgba(255,255,255,0.04); }
    .map-box { height: 320px; border-radius: 1rem; overflow: hidden; }
  </style>
</head>
<body class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="sidebar bg-[#071029]  text-slate-200 flex flex-col shadow-xl">
    <div class="px-6 py-4 flex items-center justify-center border-b border-slate-800">
      <div class="text-2xl font-bold pt-1">NAPP</div>
    </div>
    <nav class="p-4 space-y-2 flex-1">
      <a class="flex items-center gap-3 px-3 py-2 rounded-lg card shadow-sm" href="#">
        <span>🏠</span><span>Главная</span>
      </a>
      <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/40" href="#"><span>📊</span><span>Аналитика</span></a>
      <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/40" href="#"><span>📁</span><span>Договора</span></a>
      <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-slate-800/40" href="#"><span>⚙️</span><span>Настройки</span></a>
    </nav>
    <div class="p-4 border-t border-slate-800">
      <button class="w-full text-sm py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-sky-500 shadow">Выйти</button>
    </div>
  </aside>

  <!-- Main -->
  <main class="flex-1 flex flex-col">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 border-b border-slate-800 bg-[#071029]">
      <h1 class="text-xl font-semibold">Единый реестр страховых полисов</h1>
      <div class="flex items-center gap-4">
        <div class="text-sm text-slate-300">Апрель, 2024</div>
        <div class="flex items-center gap-2">
          <img src="https://i.pravatar.cc/40" class="w-9 h-9 rounded-full" alt="user">
          <div class="text-sm">
            <div class="font-medium">Али Сафаров</div>
            <div class="text-xs text-slate-400">Администратор</div>
          </div>
        </div>
      </div>
    </header>

    <!-- Content -->
    <section class="p-6 space-y-6 overflow-auto">
      <!-- Top cards -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="p-4 rounded-2xl card">
          <div class="text-sm text-slate-400">Проданные полисы</div>
          <div class="mt-2 text-3xl font-bold">696 068</div>
          <div class="mt-1 text-green-400 text-sm">+22%</div>
        </div>
        <div class="p-4 rounded-2xl card">
          <div class="text-sm text-slate-400">Страховая премия</div>
          <div class="mt-2 text-3xl font-bold">570 171 122 020 сум</div>
          <div class="mt-1 text-green-400 text-sm">+38%</div>
        </div>
        <div class="p-4 rounded-2xl card">
          <div class="text-sm text-slate-400">Пользователи</div>
          <div class="mt-2 text-3xl font-bold">238</div>
          <div class="mt-1 text-green-400 text-sm">+57%</div>
        </div>
      </div>

      <!-- Big chart + table -->
      <div class="grid md:grid-cols-3 gap-6">
        <div class="md:col-span-2 p-4 rounded-2xl card">
          <div class="flex items-center justify-between mb-3">
            <h3 class="font-semibold">Проданные полисы — компании</h3>
            <div class="flex items-center gap-2">
              <button class="px-3 py-1 text-sm rounded bg-slate-800/50">Месяц</button>
              <button class="px-3 py-1 text-sm rounded bg-slate-800/30">Год</button>
            </div>
          </div>
          <canvas id="chartDark" height="120"></canvas>

          <div class="mt-4 overflow-x-auto">
            <table class="w-full text-sm">
              <thead class="text-slate-400">
                <tr><th class="py-2">Компания</th><th>Дата</th><th>Полисы</th><th>Доля</th></tr>
              </thead>
              <tbody>
                <tr class="border-t border-slate-800/40"><td>ALSKOM</td><td>20 апр, 2024</td><td>12 342</td><td>7.2%</td></tr>
                <tr class="border-t border-slate-800/40"><td>APEX</td><td>20 апр, 2024</td><td>12 342</td><td>5.9%</td></tr>
                <tr class="border-t border-slate-800/40"><td>ARIA SUGURTA</td><td>20 апр, 2024</td><td>12 342</td><td>12.3%</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Map + region summary -->
        <div class="p-4 rounded-2xl card">
          <div class="flex items-center justify-between mb-3">
            <h3 class="font-semibold">Проданные по регионам</h3>
            <div class="text-sm text-slate-400">тыс. полисов</div>
          </div>
          <div id="mapDark" class="map-box mb-4"></div>
          <div class="text-sm">
            <div class="font-medium">Ташкент вилояти</div>
            <div class="text-slate-300">Премия: 48 220.3 млн сум</div>
            <div class="text-slate-300">Полисы: 132 086 шт</div>
            <div class="mt-3 w-full bg-slate-800 rounded-full h-2"><div style="width:70%" class="h-2 rounded-full bg-gradient-to-r from-indigo-500 to-sky-400"></div></div>
          </div>
        </div>
      </div>

    </section>
  </main>

  <script>
    // Chart.js - dark theme
    const ctx = document.getElementById('chartDark').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['2','4','6','8','10','12','14','16','18','20','22','24','26','28','30'],
        datasets: [
          { label:'ALSKOM', data:[500,600,700,800,750,700,650,800,820,900,750,770,820,830,800], borderColor:'#10b981', backgroundColor:'rgba(16,185,129,0.08)', tension:0.3, fill:true },
          { label:'APEX', data:[400,450,500,550,530,600,580,620,640,660,680,700,690,710,720], borderColor:'#0ea5e9', backgroundColor:'rgba(14,165,233,0.06)', tension:0.3, fill:true }
        ]
      },
      options: {
        responsive:true,
        plugins: { legend:{labels:{color:'#cbd5e1'}} },
        scales: {
          x:{ ticks:{color:'#94a3b8'}, grid:{color:'rgba(255,255,255,0.03)'} },
          y:{ ticks:{color:'#94a3b8'}, grid:{color:'rgba(255,255,255,0.03)'} }
        }
      }
    });

    // Leaflet map
    const map = L.map('mapDark').setView([41.3,69.25],6);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{ attribution:'© OpenStreetMap' }).addTo(map);
    L.circle([41.3,69.25], { color:'#60a5fa', fillColor:'#60a5fa', fillOpacity:0.15, radius:30000 }).addTo(map).bindPopup('Ташкент: 132 086 шт');
  </script>
</body>
</html>