<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Дополнительное соглашение к договору перестрахования</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">
      Форма добавления дополнительного соглашения к договору перестрахования
    </h1>

    <!-- Основные данные -->
    <form id="agreementForm" class="space-y-6">
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">1. Основная информация</h2>

        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium">UUID договора перестрахования *</label>
            <input type="text" name="reinsuranceContractUuid" class="mt-1 w-full border rounded p-2" required>
          </div>
          <div>
            <label class="block text-sm font-medium">Номер доп. соглашения *</label>
            <input type="text" name="additionalAgreementNumber" class="mt-1 w-full border rounded p-2" required>
          </div>
          <div>
            <label class="block text-sm font-medium">Дата доп. соглашения * (в пределах отчетного квартала, до 25 числа следующего)</label>
            <input type="date" name="additionalAgreementDate" class="mt-1 w-full border rounded p-2" required>
          </div>
          <div>
            <label class="block text-sm font-medium">№ слипа</label>
            <input type="text" name="slipNumber" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Дата слипа (в пределах отчетного квартала, до 25 числа следующего)</label>
            <input type="date" name="slipDate" class="mt-1 w-full border rounded p-2">
          </div>
        </div>

        <div class="mt-4">
          <label class="block text-sm font-medium">Условия облигатора (отправлять вместе с другими условиями)</label>
          <textarea name="obligatorCondition" class="mt-1 w-full border rounded p-2" rows="2"></textarea>
        </div>

        <div>
          <label class="block text-sm font-medium">Другие условия облигатора (обязательно, если указано obligatorCondition)</label>
          <textarea name="obligatorOtherCondition" class="mt-1 w-full border rounded p-2" rows="2"></textarea>
        </div>
      </section>

      <!-- Период перестрахования -->
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">2. Период перестрахования</h2>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium">Начало периода (в пределах отчетного квартала, до 25 числа следующего)</label>
            <input type="date" name="reinsuranceStartDate" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Конец периода (только для активного договора или истекшего до 25 числа следующего)</label>
            <input type="date" name="reinsuranceEndDate" class="mt-1 w-full border rounded p-2">
          </div>
        </div>
      </section>

      <!-- Финансовые параметры -->
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">3. Финансовые параметры</h2>
        <div class="grid md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium">Доля перестрахователя в ин. валюте (обязательно, если currencyId)</label>
            <input type="number" name="reinsurantShareInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Доля перестрахователя в сум</label>
            <input type="number" name="reinsurantShare" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Доля перестрахователя в %</label>
            <input type="number" name="reinsurantShareInPercents" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Лимит перестраховщика в ин. валюте (обязательно, если currencyId)</label>
            <input type="number" name="reinsurerLimitInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Лимит перестраховщика в сум</label>
            <input type="number" name="reinsurerLimit" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Лимит перестраховщика в %</label>
            <input type="number" name="reinsurerLimitInPercents" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Брутто перестраховочная премия в ин. валюте (обязательно, если currencyId)</label>
            <input type="number" name="bruttoInsurancePremiumInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Брутто перестраховочная премия в сум</label>
            <input type="number" name="bruttoInsurancePremium" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Брутто ставка в %</label>
            <input type="number" name="bruttoInsurancePremiumInPercents" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Комиссия в ин. валюте (обязательно, если currencyId)</label>
            <input type="number" name="commissionInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Комиссия в сум</label>
            <input type="number" name="commission" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Комиссия в %</label>
            <input type="number" name="commissionInPercents" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Нетто перестраховочная премия в ин. валюте (обязательно, если currencyId)</label>
            <input type="number" name="nettoInsurancePremiumInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Нетто перестраховочная премия в сум</label>
            <input type="number" name="nettoInsurancePremium" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Нетто ставка в %</label>
            <input type="number" name="nettoInsurancePremiumInPercents" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
        </div>
      </section>

      <!-- Брокер и ковернот -->
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">4. Брокерские параметры</h2>
        <div class="grid md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium">Размер комиссии страхового брокера</label>
            <input type="number" name="brokerCommission" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Размер комиссии брокера в ин. валюте</label>
            <input type="number" name="brokerCommissionInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">ID брокера</label>
            <input type="text" name="brokerId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">№ ковернота (обязательно, если brokerId)</label>
            <input type="text" name="covernoteNumber" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Дата ковернота (обязательно, если brokerId)</label>
            <input type="date" name="covernoteDate" class="mt-1 w-full border rounded p-2">
          </div>
        </div>
      </section>

      <!-- Валюта и курс -->
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">5. Валюта и курс</h2>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium">ID валюты (/api/references/currencies)</label>
            <input type="text" name="currencyId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Курс валюты (обязательно, если currencyId)</label>
            <input type="number" name="exchangeRate" class="mt-1 w-full border rounded p-2" step="0.0001">
          </div>
        </div>
      </section>

      <!-- Начисления и оплаты -->
      <section>
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">6. Начисления и оплаты</h2>
        <div class="grid md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium">Нетто перестраховочная премия для начисления</label>
            <input type="number" name="nettoAccrualPremium" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Дата начисления</label>
            <input type="date" name="nettoAccrualDate" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Комиссия для начисления</label>
            <input type="number" name="nettoAccrualCommission" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Брутто перестраховочная премия для начисления</label>
            <input type="number" name="bruttoAccrualPremium" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Срок оплаты 100% премии</label>
            <input type="date" name="deadlineForFullPremiumPayment" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Сумма оплаченной премии</label>
            <input type="number" name="paidPremium" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Дата оплаченной премии</label>
            <input type="date" name="premiumPaidDate" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Тип оплаты (/api/references/payment-conditions)</label>
            <input type="text" name="paymentTypeId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Срок оплаты 1-го транша (обязательно, если paymentTypeId=9)</label>
            <input type="date" name="firstPaymentDeadline" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Сумма оплаты 1-го транша (обязательно, если paymentTypeId=9)</label>
            <input type="number" name="firstPaymentSum" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Дата оплаты 1-го транша (обязательно, если paymentTypeId=9)</label>
            <input type="date" name="firstPaymentDate" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Сумма оплаченного 1-го транша (обязательно, если paymentTypeId=9)</label>
            <input type="number" name="firstPaymentPaidSum" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
        </div>
      </section>

      <!-- Договоры -->
      <section id="contractsSection">
        <h2 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800 flex justify-between items-center">
          7. Договоры
          <button type="button" id="addContractBtn" class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">
            + Добавить договор
          </button>
        </h2>
        <div id="contractsContainer" class="space-y-4"></div>
      </section>

      <!-- Кнопки -->
      <div class="flex gap-4 mt-8">
        <button type="button" id="showJsonBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Показать JSON
        </button>
        <button type="reset" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
          Очистить
        </button>
      </div>
    </form>

    <!-- Error Messages -->
    <div id="errorOutput" class="mt-8 bg-red-100 border border-red-400 rounded p-4 hidden">
      <h3 class="font-semibold mb-2 text-red-800">Ошибки валидации:</h3>
      <ul id="errorList" class="text-sm text-red-700 list-disc pl-5"></ul>
    </div>

    <!-- JSON Output -->
    <div id="jsonOutput" class="mt-8 bg-gray-50 border rounded p-4 hidden">
      <h3 class="font-semibold mb-2 text-gray-800">Сформированные данные:</h3>
      <pre class="text-sm text-gray-700 overflow-auto"></pre>
      <button type="button" id="hideJsonBtn" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
        Скрыть JSON
      </button>
    </div>
  </div>

  <script>
    const form = document.getElementById('agreementForm');
    const addContractBtn = document.getElementById('addContractBtn');
    const contractsContainer = document.getElementById('contractsContainer');
    const showJsonBtn = document.getElementById('showJsonBtn');
    const jsonOutput = document.getElementById('jsonOutput');
    const hideJsonBtn = document.getElementById('hideJsonBtn');
    const errorOutput = document.getElementById('errorOutput');
    const errorList = document.getElementById('errorList');

    // Функция для проверки даты на соответствие кварталу
    function isDateAllowed(dateStr) {
      if (!dateStr) return true;
      const current = new Date('2025-10-09');
      const d = new Date(dateStr);
      const year = d.getFullYear();
      const month = d.getMonth();
      const quarter = Math.floor(month / 3) + 1;
      let quarterStart, quarterEnd;
      if (quarter === 1) {
        quarterStart = new Date(year, 0, 1);
        quarterEnd = new Date(year, 2, 31);
      } else if (quarter === 2) {
        quarterStart = new Date(year, 3, 1);
        quarterEnd = new Date(year, 5, 30);
      } else if (quarter === 3) {
        quarterStart = new Date(year, 6, 1);
        quarterEnd = new Date(year, 8, 30);
      } else {
        quarterStart = new Date(year, 9, 1);
        quarterEnd = new Date(year, 11, 31);
      }
      if (d < quarterStart || d > quarterEnd) {
        return false;
      }
      let nextQuarterYear = year;
      let nextQuarterMonth = (quarter * 3) % 12;
      if (nextQuarterMonth === 0) {
        nextQuarterMonth = 0;
        nextQuarterYear++;
      }
      const allowanceEnd = new Date(nextQuarterYear, nextQuarterMonth, 25);
      if (current > allowanceEnd) {
        return false;
      }
      return true;
    }

    // Валидация формы
    function validateForm(data, contracts) {
      const errors = [];

      // Обязательные поля
      if (!data.reinsuranceContractUuid) errors.push('UUID договора перестрахования обязателен');
      if (!data.additionalAgreementNumber) errors.push('Номер доп. соглашения обязателен');
      if (!data.additionalAgreementDate) errors.push('Дата доп. соглашения обязательна');
      
      // Условия облигатора
      if (data.obligatorCondition && !data.obligatorOtherCondition) {
        errors.push('Другие условия облигатора обязательны, если указаны условия облигатора');
      }

      // Валюта
      if (data.currencyId) {
        if (!data.exchangeRate) errors.push('Курс валюты обязателен, если указан ID валюты');
        if (!data.reinsurantShareInForeignCurrency) errors.push('Доля перестрахователя в ин. валюте обязательна, если currencyId');
        if (!data.reinsurerLimitInForeignCurrency) errors.push('Лимит перестраховщика в ин. валюте обязателен, если currencyId');
        if (!data.bruttoInsurancePremiumInForeignCurrency) errors.push('Брутто перестраховочная премия в ин. валюте обязательна, если currencyId');
        if (!data.commissionInForeignCurrency) errors.push('Комиссия в ин. валюте обязательна, если currencyId');
        if (!data.nettoInsurancePremiumInForeignCurrency) errors.push('Нетто перестраховочная премия в ин. валюте обязательна, если currencyId');
      }

      // Брокер
      if (data.brokerId) {
        if (!data.covernoteNumber) errors.push('№ ковернота обязателен, если указан ID брокера');
        if (!data.covernoteDate) errors.push('Дата ковернота обязательна, если указан ID брокера');
      }

      // Оплата
      if (data.paymentTypeId === '9') {
        if (!data.firstPaymentDeadline) errors.push('Срок оплаты 1-го транша обязателен, если paymentTypeId=9');
        if (!data.firstPaymentSum) errors.push('Сумма оплаты 1-го транша обязательна, если paymentTypeId=9');
        if (!data.firstPaymentDate) errors.push('Дата оплаты 1-го транша обязательна, если paymentTypeId=9');
        if (!data.firstPaymentPaidSum) errors.push('Сумма оплаченного 1-го транша обязательна, если paymentTypeId=9');
      }

      // Даты с квартальными ограничениями
      if (data.additionalAgreementDate && !isDateAllowed(data.additionalAgreementDate)) {
        errors.push('Дата доп. соглашения не соответствует квартальным ограничениям');
      }
      if (data.slipDate && !isDateAllowed(data.slipDate)) {
        errors.push('Дата слипа не соответствует квартальным ограничениям');
      }
      if (data.reinsuranceStartDate && !isDateAllowed(data.reinsuranceStartDate)) {
        errors.push('Начало периода перестрахования не соответствует квартальным ограничениям');
      }

      // Валидация договоров
      contracts.forEach((contract, index) => {
        if (contract.isForeign === '1') {
          if (!contract.contractNumber) errors.push(`Договор ${index + 1}: Номер договора обязателен для иностранного договора`);
          if (contract.contractDelete !== '1') {
            // Если не удаление, проверить другие поля для добавления/изменения
            if (!contract.contractIssueDate) errors.push(`Договор ${index + 1}: Дата договора обязательна`);
            if (!contract.insuranceFormId) errors.push(`Договор ${index + 1}: Форма страхования обязательна`);
            if (!contract.insuranceProductName) errors.push(`Договор ${index + 1}: Наименование страхового продукта обязательно`);
            if (!contract.insurantName) errors.push(`Договор ${index + 1}: Наименование страхователя обязательно`);
            if (!contract.classes) errors.push(`Договор ${index + 1}: Классы страхования обязательны`);
            if (!contract.foreignInsuranceOrgId && !contract.insuranceOrgId) errors.push(`Договор ${index + 1}: Страховщик обязателен`);
            if (!contract.countryId) errors.push(`Договор ${index + 1}: Территория страхования обязательна`);
            if (!contract.startDate) errors.push(`Договор ${index + 1}: Начало периода страхования обязательно`);
            if (!contract.endDate) errors.push(`Договор ${index + 1}: Конец периода страхования обязательно`);
            if (contract.currencyId) {
              if (!contract.exchangeRate) errors.push(`Договор ${index + 1}: Курс валюты обязателен, если currencyId`);
              if (!contract.insuranceSumInForeignCurrency) errors.push(`Договор ${index + 1}: Страховая сумма в ин. валюте обязательна, если currencyId`);
            }
          }
        } else {
          if (!contract.contractUuid) errors.push(`Договор ${index + 1}: UUID договора обязателен для местного договора`);
        }
      });

      return errors;
    }

    // Добавление договора
    addContractBtn.addEventListener('click', () => {
      const div = document.createElement('div');
      div.className = "border p-4 rounded bg-gray-50 relative";
      div.innerHTML = `
        <button type="button" class="absolute top-2 right-2 text-red-600 hover:text-red-800 font-bold removeContract">×</button>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium">Иностр./местный (1/0)</label>
            <input type="number" name="isForeign" class="mt-1 w-full border rounded p-2" min="0" max="1">
          </div>
          <div>
            <label class="block text-sm font-medium">UUID договора</label>
            <input type="text" name="contractUuid" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Номер договора</label>
            <input type="text" name="contractNumber" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Удалить (1 - да)</label>
            <input type="number" name="contractDelete" class="mt-1 w-full border rounded p-2" min="0" max="1">
          </div>
          <div>
            <label class="block text-sm font-medium">Дата договора</label>
            <input type="date" name="contractIssueDate" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Форма страхования (/api/references/forms-of-insurance)</label>
            <input type="text" name="insuranceFormId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Наименование страхового продукта</label>
            <input type="text" name="insuranceProductName" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Наименование страхователя</label>
            <input type="text" name="insurantName" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Классы страхования (текстом)</label>
            <input type="text" name="classes" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Страховщик (местный) (/api/references/insurance-orgs)</label>
            <input type="text" name="insuranceOrgId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Страховщик (иностранный) (/api/references/foreign-insurance-orgs)</label>
            <input type="text" name="foreignInsuranceOrgId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Территория страхования (/api/references/countries)</label>
            <input type="text" name="countryId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Страховая сумма в ин. валюте (обязательно, если currencyId)</label>
            <input type="number" name="insuranceSumInForeignCurrency" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">Страховая сумма в сум</label>
            <input type="number" name="insuranceSum" class="mt-1 w-full border rounded p-2" step="0.01">
          </div>
          <div>
            <label class="block text-sm font-medium">ID валюты (/api/references/currencies)</label>
            <input type="text" name="currencyId" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Курс валюты (обязательно, если currencyId)</label>
            <input type="number" name="exchangeRate" class="mt-1 w-full border rounded p-2" step="0.0001">
          </div>
          <div>
            <label class="block text-sm font-medium">Начало периода страхования</label>
            <input type="date" name="startDate" class="mt-1 w-full border rounded p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Конец периода страхования</label>
            <input type="date" name="endDate" class="mt-1 w-full border rounded p-2">
          </div>
        </div>
      `;
      contractsContainer.appendChild(div);
    });

    // Удаление договора
    contractsContainer.addEventListener('click', e => {
      if (e.target.classList.contains('removeContract')) {
        e.target.parentElement.remove();
      }
    });

    // Показ JSON с валидацией
    showJsonBtn.addEventListener('click', () => {
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());
      const contracts = [];
      contractsContainer.querySelectorAll('div.border').forEach(block => {
        const obj = {};
        block.querySelectorAll('input').forEach(input => {
          if (input.value) obj[input.name] = input.value;
        });
        contracts.push(obj);
      });

      const errors = validateForm(data, contracts);

      if (errors.length > 0) {
        errorList.innerHTML = '';
        errors.forEach(error => {
          const li = document.createElement('li');
          li.textContent = error;
          errorList.appendChild(li);
        });
        errorOutput.classList.remove('hidden');
        jsonOutput.classList.add('hidden');
      } else {
        errorOutput.classList.add('hidden');
        data.contracts = contracts;
        jsonOutput.querySelector('pre').textContent = JSON.stringify(data, null, 2);
        jsonOutput.classList.remove('hidden');
      }
    });

    // Скрытие JSON
    hideJsonBtn.addEventListener('click', () => {
      jsonOutput.classList.add('hidden');
    });
  </script>
</body>
</html>