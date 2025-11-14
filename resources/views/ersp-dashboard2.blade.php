<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>NAPP — Единый реестр страховых полисов (Dark)</title>

  <!-- Tailwind via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    /* Layout specifics */
    :root{
      --bg-very-dark: #071227; /* sidebar */
      --bg-header: linear-gradient(90deg,#071226,#0b1430); /* header */
      --bg-main: #0b1630; /* main background */
      --card: rgba(255,255,255,0.03);
      --muted: rgba(255,255,255,0.65);
    }

    html,body,#mapDark { height: 100%; }
    body { background: var(--bg-main); color: #dbeafe; font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }

    /* Sidebar */
    .sidebar {
      width: 260px;
      background: var(--bg-very-dark);
      border-right: 1px solid rgba(255,255,255,0.04);
      box-shadow: 0 6px 18px rgba(2,6,23,0.45);
    }

    /* Header */
    .topbar {
      background: var(--bg-header);
      border-bottom: 1px solid rgba(255,255,255,0.04);
      box-shadow: 0 4px 18px rgba(2,6,23,0.45);
    }

    /* Cards */
    .card {
      background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      border: 1px solid rgba(255,255,255,0.04);
      backdrop-filter: blur(6px);
    }

    /* map container */
    #mapDark { height: 320px; border-radius: 12px; overflow: hidden; }

    /* subtle scrollbar for main area */
    .scroll-area::-webkit-scrollbar { height:8px; width:8px; }
    .scroll-area::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.06); border-radius: 8px; }
  </style>
</head>
<body class="min-h-screen flex">

  <!-- SIDEBAR -->
  <aside class="sidebar flex flex-col text-sky-100">
    <div class="h-20 flex items-center px-6 border-b border-white/4">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-md bg-gradient-to-tr from-sky-500 to-indigo-600 flex items-center justify-center font-bold text-xs shadow">NAPP</div>
        <div>
          <div class="text-sm font-semibold">NAPP</div>
          <div class="text-xs text-white/60">Insurance Analytics</div>
        </div>
      </div>
    </div>

    <nav class="p-4 flex-1 space-y-1 overflow-y-auto">
      <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-white/3 shadow-sm">
        <span class="text-lg">🏠</span>
        <span class="font-medium">Главная</span>
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/2">
        <span class="text-lg">🧾</span>
        <span>Админ ЕАИС</span>
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/2">
        <span class="text-lg">🏛️</span>
        <span>Админ СК</span>
      </a>
      <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-white/2">
        <span class="text-lg">📊</span>
        <span>Аналитика</span>
      </a>

      <div class="mt-4 border-t border-white/6 pt-4 text-xs text-white/60">
        <div class="px-3 py-2">Фонд</div>
        <div class="px-3 py-2">HR-Менеджмент</div>
        <div class="px-3 py-2">Биллинг</div>
      </div>
    </nav>

    <div class="p-4 border-t border-white/6">
      <div class="flex items-center gap-3">
        <img src="https://i.pravatar.cc/40" class="w-9 h-9 rounded-full" alt="user">
        <div class="text-sm">
          <div class="font-medium">Али Сафаров</div>
          <div class="text-xs text-white/60">Администратор</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN AREA -->
  <div class="flex-1 flex flex-col">

    <!-- TOPBAR / HEADER -->
    <header class="topbar flex items-center justify-between px-6 py-4">
      <div class="flex items-center gap-6">
        <h1 class="text-xl font-semibold">Единый реестр страховых полисов</h1>
        <div class="hidden md:flex items-center gap-4 text-sm text-white/70">
          <div class="px-3 py-1 rounded bg-white/3">Апрель, 2024</div>
        </div>
      </div>

      <div class="flex items-center gap-4">
        <button class="text-sm px-3 py-1 rounded bg-white/3 hover:bg-white/4">Дата</button>

        <div class="flex items-center gap-3">
          <img src="https://flagcdn.com/w20/ru.png" class="w-5 h-4 rounded-sm" alt="RU">
        </div>

        <div class="flex items-center gap-3 pl-4 border-l border-white/6">
          <div class="text-right text-sm mr-2">
            <div class="font-medium">Али Сафаров</div>
            <div class="text-xs text-white/60">Администратор</div>
          </div>
          <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="avatar">
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <main class="p-6 overflow-auto scroll-area">

      <!-- TOP STATS -->
      <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="card p-4 rounded-2xl">
          <div class="text-sm text-white/70">Проданные полисы</div>
          <div class="mt-2 text-2xl font-bold">712 430</div>
          <div class="mt-1 text-sm text-emerald-400">+24%</div>
        </div>

        <div class="card p-4 rounded-2xl">
          <div class="text-sm text-white/70">Страховая премия</div>
          <div class="mt-2 text-2xl font-bold">582 430 902 120 сум</div>
          <div class="mt-1 text-sm text-emerald-400">+41%</div>
        </div>

        <div class="card p-4 rounded-2xl">
          <div class="text-sm text-white/70">Пользователи</div>
          <div class="mt-2 text-2xl font-bold">256</div>
          <div class="mt-1 text-sm text-emerald-400">+63%</div>
        </div>
      </section>

      <!-- CHART + TABLE -->
      <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2 card p-5 rounded-2xl">
          <div class="flex items-center justify-between mb-3">
            <h2 class="font-semibold">Проданные полисы страховыми организациями</h2>
            <div class="flex items-center gap-2">
              <button class="px-3 py-1 rounded bg-white/5 text-sm">Месяц</button>
              <button class="px-3 py-1 rounded bg-transparent text-sm border border-white/6">Квартал</button>
            </div>
          </div>

          <!-- Chart canvas -->
          <div class="w-full">
            <canvas id="insuranceChartDark" height="110"></canvas>
          </div>

          <!-- Small legend / tags -->
          <div class="flex items-center gap-3 mt-4 text-sm text-white/70">
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#06b6d4"></span> ALKOM</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#8b5cf6"></span> ORION</div>
            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full" style="background:#10b981"></span> SUGURTA</div>
          </div>

          <!-- Table -->
          <div class="mt-5 overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead class="text-white/70 text-left">
                <tr>
                  <th class="py-2">Страховая компания</th>
                  <th>Дата</th>
                  <th>Количество полисов</th>
                  <th>Доля</th>
                </tr>
              </thead>
              <tbody class="text-white/80">
                <tr class="border-t border-white/6">
                  <td class="py-3">"ALKOM" SK AJ</td><td>30 апреля, 2024</td><td>14 120</td><td>8.1%</td>
                </tr>
                <tr class="border-t border-white/6">
                  <td class="py-3">"ORION INSURANCE" AJ</td><td>30 апреля, 2024</td><td>13 540</td><td>7.8%</td>
                </tr>
                <tr class="border-t border-white/6">
                  <td class="py-3">"SUGURTA GLOBAL" AJ</td><td>30 апреля, 2024</td><td>12 840</td><td>7.4%</td>
                </tr>
                <tr class="border-t border-white/6">
                  <td class="py-3">"ASIA INSURANCE" AJ</td><td>30 апреля, 2024</td><td>11 900</td><td>6.8%</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- MAP + REGION SUMMARY -->
        <div class="card p-5 rounded-2xl">
          <div class="flex items-center justify-between mb-3">
            <h3 class="font-semibold">Проданные полисы по регионам</h3>
            <div class="text-sm text-white/60">тыс. полисов</div>
          </div>

          <div id="mapDark" class="mb-4"></div>

          <div class="text-sm text-white/80">
            <div class="flex items-center justify-between mb-1">
              <div>Ташкент вилояти</div>
              <div class="font-semibold">254.3</div>
            </div>
            <div class="text-xs text-white/60 mb-2">Премия: 52 120.5 млн сум • Полисы: 132 430 • Выплата: 3 120.8 млн сум</div>

            <div class="w-full bg-white/6 rounded-full h-2">
              <div class="h-2 rounded-full" style="width:72%; background:linear-gradient(90deg,#06b6d4,#8b5cf6)"></div>
            </div>
          </div>
        </div>
      </section>

      <!-- BOTTOM: extra metrics row -->
      <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="card p-4 rounded-2xl">
          <div class="text-sm text-white/70">Средняя премия</div>
          <div class="mt-2 text-xl font-semibold">812 320 сум</div>
        </div>
        <div class="card p-4 rounded-2xl">
          <div class="text-sm text-white/70">Заявки в обработке</div>
          <div class="mt-2 text-xl font-semibold">1 420</div>
        </div>
        <div class="card p-4 rounded-2xl">
          <div class="text-sm text-white/70">Возвраты</div>
          <div class="mt-2 text-xl font-semibold">34</div>
        </div>
      </section>

    </main>

    <!-- FOOTER (small) -->
    <footer class="px-6 py-3 text-xs text-white/60 border-t border-white/6">
      © NAPP — 2024. Дашборд для аналитики страховых полисов.
    </footer>

  </div>

  <!-- SCRIPTS: Chart + Leaflet init -->
  <script>
    // Chart.js line with two datasets (teal & purple accents)
    const ctx = document.getElementById('insuranceChartDark').getContext('2d');

    const labels = ['1','3','5','7','9','11','13','15','17','19','21','23','25','27','29'];
    const data = {
      labels,
      datasets: [
        {
          label: 'ALKOM',
          data: [420,480,520,600,670,700,760,820,790,850,900,930,950,980,1010],
          borderColor: '#06b6d4',
          backgroundColor: 'rgba(6,182,212,0.08)',
          tension: 0.25,
          fill: true,
          pointRadius: 3,
        },
        {
          label: 'ORION',
          data: [380,420,430,480,510,560,610,640,660,700,740,760,790,820,860],
          borderColor: '#8b5cf6',
          backgroundColor: 'rgba(139,92,246,0.06)',
          tension: 0.25,
          fill: true,
          pointRadius: 3,
        },
        {
          label: 'SUGURTA',
          data: [320,350,390,420,460,500,540,580,600,630,660,690,715,740,770],
          borderColor: '#10b981',
          backgroundColor: 'rgba(16,185,129,0.06)',
          tension: 0.25,
          fill: true,
          pointRadius: 3,
        }
      ]
    };

    new Chart(ctx, {
      type: 'line',
      data,
      options: {
        responsive: true,
        plugins: {
          legend: { labels: { color: 'rgba(255,255,255,0.85)' }, position: 'bottom' }
        },
        scales: {
          x: { ticks: { color: 'rgba(255,255,255,0.65)' }, grid: { color: 'transparent' } },
          y: { ticks: { color: 'rgba(255,255,255,0.65)' }, grid: { color: 'rgba(255,255,255,0.03)' } }
        },
        interaction: { mode: 'index', intersect: false }
      }
    });

    // Leaflet map init for Uzbekistan with a highlighted circle for Tashkent
    const map = L.map('mapDark', { zoomControl: false }).setView([41.3, 64.5], 5.7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 12,
      attribution: '© OpenStreetMap'
    }).addTo(map);

    // highlighted region (circle marker for demo)
    L.circle([41.3, 69.25], {
      color: '#8b5cf6',
      fillColor: '#8b5cf6',
      fillOpacity: 0.12,
      radius: 35000,
      weight: 2
    }).addTo(map).bindPopup('<strong>Ташкент вилояти</strong><br>254.3 тыс. полисов');

    // Some demo markers for other regions
    const regions = [
      { name: 'Самарканд', coords: [39.6542, 66.9597], v: '82k' },
      { name: 'Бухара', coords: [39.7750, 64.4156], v: '46k' },
      { name: 'Фергана', coords: [40.3917, 71.7781], v: '69k' },
    ];
    regions.forEach(r => {
      L.circleMarker(r.coords, { radius: 7, color:'#06b6d4', fillOpacity: 0.9 }).addTo(map).bindPopup(`${r.name}: ${r.v} полисов`);
    });

    // Responsive fix: invalidate size on load
    setTimeout(() => { map.invalidateSize(); }, 300);
  </script>
</body>
</html>