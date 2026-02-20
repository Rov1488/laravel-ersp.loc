<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фин. блок - Система портфеля</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
@php
    // $str = 'брат';
    // $base64 = base64_encode($str);    
    // echo "Base64 encoded string of '{$str}' is: {$base64}";
    $jsonUnicode = json_encode('муж');
    echo "JSON encoded string of 'брат' is: {$jsonUnicode}";
    echo "<br>";
    $text = "\u0424\u0438\u0437\u0438\u0447\u0435\u0441\u043a\u043e\u0435 \u043b\u0438\u0446\u043e";
    echo json_decode($text);

    if ("32" == (32 * 1.0000)) {
        echo !!true;
    }else{
        echo !!false;
    }

@endphp

    
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-center">Фин. блок</h1>
        
        <!-- Поля Фин. блока -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Дата поступления</label>
                <input type="date" id="date-receipt" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" value="2025-11-13">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Страховая премия (Ожидаемая)</label>
                <input type="number" id="expected-premium" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="10000.00" value="10000.00">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Наименование контрагента (Реквизиты)</label>
                <input type="text" id="counterparty-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Пример контрагента Ltd.">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">ИНН контрагента</label>
                <input type="text" id="counterparty-inn" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="1234567890">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Расчетный счёт контрагента</label>
                <input type="text" id="counterparty-account" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="40817810000000000000">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Наименование банка контрагента</label>
                <input type="text" id="counterparty-bank-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Пример банка">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">МФО банка контрагента</label>
                <input type="text" id="counterparty-bank-mfo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="123456">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">ИНН банка</label>
                <input type="text" id="bank-inn" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="123456789">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Номер слипа</label>
                <input type="text" id="slip-number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="SLIP-12345">
            </div>
        </div>
        
        <!-- Раздел обработки платежей -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-4">Обработка платежей</h2>
            
            <!-- Кнопка загрузки входящего платежа -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Входящий платеж (из банковской выписки 1C)</label>
                <button id="load-payment" class="mt-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Загрузить из банковской выписки
                </button>
                <div id="incoming-payment" class="mt-2 p-2 bg-red-100 border border-red-300 rounded-md text-red-700 font-bold hidden">
                    <!-- Значение платежа будет вставлено здесь -->
                </div>
            </div>
            
            <!-- Связанные платежи -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Связанные платежи</label>
                <input type="number" id="linked-payments" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Свяжите платежи здесь" value="0">
                <p class="text-sm text-gray-500 mt-1">Портфельщик связывает входящие платежи с базой.</p>
            </div>
            
            <!-- Остаток с условным цветом -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Остаток</label>
                <div id="remainder-display" class="mt-1 p-2 border rounded-md text-gray-700 font-bold">
                    0.00
                </div>
                <p class="text-sm text-gray-500 mt-1">Если связанные равны ожидаемым, зеленый; иначе остаток в светло-красном.</p>
            </div>
        </div>
        
        <!-- Кнопка Провести -->
        <div class="text-center">
            <button id="conduct-button" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Провести (Отправить в 1C)
            </button>
            <p class="text-sm text-gray-500 mt-2">После нажатия отправляет контрагента и номер слипа в программу 1C.</p>
        </div>
    </div>

    <script>
        // Симуляция загрузки входящего платежа из 1C (в красном)
        const loadPaymentBtn = document.getElementById('load-payment');
        const incomingPaymentDiv = document.getElementById('incoming-payment');
        const expectedPremiumInput = document.getElementById('expected-premium');
        const linkedPaymentsInput = document.getElementById('linked-payments');
        const remainderDisplay = document.getElementById('remainder-display');
        const conductBtn = document.getElementById('conduct-button');
        const counterpartyName = document.getElementById('counterparty-name');
        const slipNumber = document.getElementById('slip-number');

        let incomingPayment = 0;

        loadPaymentBtn.addEventListener('click', () => {
            // Симуляция загрузки платежа (например, из API, здесь hardcoded для демо)
            incomingPayment = 10000.00; // Пример значения, может быть динамическим
            incomingPaymentDiv.textContent = `${incomingPayment.toFixed(2)} (Появляется красным при загрузке из банковской выписки)`;
            incomingPaymentDiv.classList.remove('hidden');
            linkedPaymentsInput.value = incomingPayment; // Автосвязь для демо, или ручная
            updateRemainder();
        });

        // Обновление остатка при изменении ввода
        linkedPaymentsInput.addEventListener('input', updateRemainder);

        function updateRemainder() {
            const expected = parseFloat(expectedPremiumInput.value) || 0;
            const linked = parseFloat(linkedPaymentsInput.value) || 0;
            const remainder = expected - linked;
            
            remainderDisplay.textContent = `${remainder.toFixed(2)}`;
            
            if (remainder === 0) {
                remainderDisplay.classList.remove('text-red-400', 'bg-red-50');
                remainderDisplay.classList.add('text-green-700', 'bg-green-100');
                remainderDisplay.textContent += ' (Совпадает)';
            } else {
                remainderDisplay.classList.remove('text-green-700', 'bg-green-100');
                remainderDisplay.classList.add('text-red-400', 'bg-red-50');
                remainderDisplay.textContent += ' (Не совпадает)';
            }
        }

        // Действие кнопки Провести
        conductBtn.addEventListener('click', () => {
            const counterparty = counterpartyName.value;
            const slip = slipNumber.value;
            // Симуляция отправки в 1C (например, вызов API)
            console.log(`Отправка в 1C: Контрагент - ${counterparty}, Номер слипа - ${slip}`);
            alert(`Процесс завершен! Отправлено в 1C: ${counterparty} - ${slip}`);
        });

        // Начальное обновление
        updateRemainder();
    </script>
</body>
</html>