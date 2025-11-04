<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Форма создания оферты перестрахования</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-blue-700">Форма создания оферты перестрахования</h1>

    <!-- Период и форма -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-lg font-semibold mb-4 text-blue-600">Период и форма перестрахования</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
          <label class="block text-sm font-medium">Начало периода *</label>
          <input type="date" id="reinsuranceStartDate" class="w-full border rounded-lg p-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Конец периода *</label>
          <input type="date" id="reinsuranceEndDate" class="w-full border rounded-lg p-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Классы страхования *</label>
          <select id="classes" multiple class="w-full border rounded-lg p-2">
            <option value="1">Класс 1</option>
            <option value="2">Класс 2</option>
            <option value="3">Класс 3</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium">Тип перестрахования *</label>
          <select id="reinsuranceTypeId" class="w-full border rounded-lg p-2">
            <option value="1">Факультативное</option>
            <option value="2">Облигаторное</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Доли и лимиты -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-lg font-semibold mb-4 text-blue-600">Доли и лимиты</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium">Приоритет / Доля перестрахователя в сум *</label>
          <input type="number" id="reinsurantShare" class="w-full border rounded-lg p-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Доля перестрахователя в % *</label>
          <input type="number" id="reinsurantShareInPercents" class="w-full border rounded-lg p-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Перестраховочная сумма *</label>
          <input type="number" id="reinsurerLimit" class="w-full border rounded-lg p-2">
        </div>
      </div>
    </div>

    <!-- Премии и комиссии -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-lg font-semibold mb-4 text-blue-600">Премии и комиссии</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium">Брутто премия *</label>
          <input type="number" id="bruttoInsurancePremium" class="w-full border rounded-lg p-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Комиссия *</label>
          <input type="number" id="commission" class="w-full border rounded-lg p-2">
        </div>
        <div>
          <label class="block text-sm font-medium">Нетто премия *</label>
          <input type="number" id="nettoInsurancePremium" class="w-full border rounded-lg p-2">
        </div>
      </div>
    </div>

    <!-- Детали оплаты -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-lg font-semibold mb-4 text-blue-600">Детали оплаты</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium">Валюта</label>
          <select id="currencyId" class="w-full border rounded-lg p-2">
            <option value="">Не выбрано</option>
            <option value="1">UZS</option>
            <option value="2">USD</option>
            <option value="3">EUR</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium">Тип оплаты *</label>
          <select id="paymentTypeId" class="w-full border rounded-lg p-2">
            <option value="1">Единовременно</option>
            <option value="9">Траншами</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium">Срок оплаты 100% премии *</label>
          <input type="date" id="deadlineForFullPremiumPayment" class="w-full border rounded-lg p-2">
        </div>
      </div>
    </div>

    <!-- Массив договоров -->
    <div class="bg-white rounded-xl shadow p-6 mb-6">
      <h2 class="text-lg font-semibold mb-4 text-blue-600">Массив договоров</h2>
      <div id="contractsContainer"></div>
      <button type="button" id="addContract" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-lg">Добавить договор</button>
    </div>

    <!-- Кнопка -->
    <div class="text-right">
      <button id="showJson" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
        Сохранить / Отправить
      </button>
    </div>
  </div>

  <!-- JS -->
  <script>
    function createContractBlock(index) {
      return `
      <div class="border rounded-lg p-4 mb-4 bg-gray-50 contract-block">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label class="block text-sm font-medium">Местный или иностранный</label>
            <select class="isForeign w-full border rounded-lg p-2">
              <option value="0">Местный</option>
              <option value="1">Иностранный</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium">Uuid договора</label>
            <input type="text" class="contractUuid w-full border rounded-lg p-2">
          </div>
          <div>
            <label class="block text-sm font-medium">Наименование продукта *</label>
            <input type="text" class="insuranceProductName w-full border rounded-lg p-2">
          </div>
        </div>
        <button type="button" class="removeContract mt-4 bg-red-600 text-white px-3 py-1 rounded-lg">Удалить</button>
      </div>`;
    }

    $(document).ready(function() {
      $("#addContract").click(function() {
        $("#contractsContainer").append(createContractBlock());
      });

      $(document).on("click", ".removeContract", function() {
        $(this).closest(".contract-block").remove();
      });

      $("#showJson").click(function() {
        const data = {
          classes: $("#classes").val(),
          reinsuranceStartDate: $("#reinsuranceStartDate").val(),
          reinsuranceEndDate: $("#reinsuranceEndDate").val(),
          reinsuranceTypeId: $("#reinsuranceTypeId").val(),
          reinsurantShare: $("#reinsurantShare").val(),
          reinsurantShareInPercents: $("#reinsurantShareInPercents").val(),
          reinsurerLimit: $("#reinsurerLimit").val(),
          bruttoInsurancePremium: $("#bruttoInsurancePremium").val(),
          commission: $("#commission").val(),
          nettoInsurancePremium: $("#nettoInsurancePremium").val(),
          currencyId: $("#currencyId").val(),
          paymentTypeId: $("#paymentTypeId").val(),
          deadlineForFullPremiumPayment: $("#deadlineForFullPremiumPayment").val(),
          contracts: []
        };

        $(".contract-block").each(function() {
          const block = $(this);
          data.contracts.push({
            isForeign: block.find(".isForeign").val(),
            contractUuid: block.find(".contractUuid").val(),
            insuranceProductName: block.find(".insuranceProductName").val()
          });
        });

        alert(JSON.stringify(data, null, 2));
      });
    });
  </script>
</body>
</html>