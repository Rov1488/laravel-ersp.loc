<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор ОСГОП</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
    <h1 class="text-2xl font-bold mb-6 text-center">Калькулятор премии ОСГОП</h1>
    <form method="POST" action="{{ route('osgop-calculate') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Тип транспортного средства</label>
            <select name="vehicle_type" class="mt-1 block w-full p-2 border rounded">
                <option value="car" @selected(old('vehicle_type') == 'car')>Легковые автомобили</option>
                <option value="minibus" @selected(old('vehicle_type') == 'minibus')>Микроавтобусы</option>
                <option value="bus" @selected(old('vehicle_type') == 'bus')>Автобусы</option>
                <option value="trolleybus" @selected(old('vehicle_type') == 'trolleybus')>Троллейбусы</option>
                <option value="tram" @selected(old('vehicle_type') == 'tram')>Трамваи</option>
                <option value="metro" @selected(old('vehicle_type') == 'metro')>Метрополитен</option>
                <option value="railway" @selected(old('vehicle_type') == 'railway')>Железнодорожный транспорт</option>
                <option value="air" @selected(old('vehicle_type') == 'air')>Воздушный транспорт</option>
                <option value="other" @selected(old('vehicle_type') == 'other')>Другие</option>
            </select>
            @error('vehicle_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Пассажировместимость</label>
            <input type="number" name="passenger_capacity" value="{{ old('passenger_capacity') }}" class="mt-1 block w-full p-2 border rounded" min="1" required>
            @error('passenger_capacity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Страховая сумма на одного пассажира</label>
            <input type="number" name="insurance_sum" value="{{ old('insurance_sum') }}" class="mt-1 block w-full p-2 border rounded" min="0" step="0.01" required>
            @error('insurance_sum') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Страховая премия за прошлый год</label>
            <input type="number" name="previous_premium" value="{{ old('previous_premium') }}" class="mt-1 block w-full p-2 border rounded" min="0" step="0.01" required>
            @error('previous_premium') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Страховые выплаты за прошлый год</label>
            <input type="number" name="previous_claims" value="{{ old('previous_claims') }}" class="mt-1 block w-full p-2 border rounded" min="0" step="0.01" required>
            @error('previous_claims') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Период страхования (дни)</label>
            <input type="number" name="policy_period" value="{{ old('policy_period') }}" class="mt-1 block w-full p-2 border rounded" min="1" required>
            @error('policy_period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Сумма страхового возмещения (если есть)</label>
            <input type="number" name="claim_amount" value="{{ old('claim_amount', 0) }}" class="mt-1 block w-full p-2 border rounded" min="0" step="0.01">
            @error('claim_amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Оставшийся период страхования (дни, если есть выплата)</label>
            <input type="number" name="remaining_period" value="{{ old('remaining_period', 0) }}" class="mt-1 block w-full p-2 border rounded" min="0">
            @error('remaining_period') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Рассчитать</button>
    </form>

    @if(isset($total_premium))
        <div class="mt-6 p-4 bg-gray-50 rounded">
            <h2 class="text-lg font-semibold">Результаты расчета</h2>
            <p>Базовая премия: {{ number_format($base_premium, 2) }} UZS</p>
            <p>Дополнительная премия: {{ number_format($additional_premium, 2) }} UZS</p>
            <p><strong>Итоговая страховая премия: {{ number_format($total_premium, 2) }} UZS</strong></p>
            <p>Нетто-ставка (75%): {{ number_format($net_premium, 2) }} UZS</p>
            <p>Расходы (25%): {{ number_format($expenses, 2) }} UZS</p>
        </div>
    @endif
</div>
</body>
</html>
