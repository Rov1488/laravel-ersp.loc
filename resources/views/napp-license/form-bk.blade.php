<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявление на получение лицензии</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .disclaimer {
            background-color: #f8d7da;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], select, textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="file"] {
            margin-top: 5px;
        }
        .radio-group, .checkbox-group {
            margin-bottom: 15px;
        }
        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Заявление на получение лицензии</h1>
    <div class="disclaimer">
        За рассмотрение лицензирующим органом документов на выдачу лицензии сбор не взимается.
    </div>
    <p>Вход в систему осуществляется посредством электронной цифровой подписи (ЭЦП) юридического лица через Единую систему идентификации (OneID).</p>

    <form id="licenseForm">
        <h2>Основные сведения</h2>
        <div class="form-group">
            <label>Полное наименование и организационно-правовая форма юридического лица</label>
            <input type="text" id="orgName" readonly placeholder="Данные заполняются автоматически из реестра">
        </div>
        <div class="form-group">
            <label>Местоположение юридического лица (почтовый адрес)</label>
            <input type="text" id="orgAddress" readonly placeholder="Данные заполняются автоматически из реестра">
        </div>
        <div class="form-group">
            <label>Номер телефона</label>
            <input type="text" id="orgPhone" readonly placeholder="Данные заполняются автоматически из реестра">
        </div>
        <div class="form-group">
            <label>Электронная почта</label>
            <input type="email" id="orgEmail" readonly placeholder="Данные заполняются автоматически из реестра">
        </div>
        <div class="form-group">
            <label>Ручной ввод данных (если система не заполнила автоматически)</label>
            <input type="text" id="manualOrgName" placeholder="Наименование организации">
            <input type="text" id="manualOrgAddress" placeholder="Адрес организации">
            <input type="text" id="manualOrgPhone" placeholder="Телефон">
            <input type="email" id="manualOrgEmail" placeholder="Электронная почта">
        </div>
        <div class="form-group">
            <label>Идентификационный номер налогоплательщика (ИНН)</label>
            <input type="text" id="inn" required>
        </div>
        <div class="form-group">
            <label>Доменное имя информационной системы</label>
            <input type="text" id="domainName" required placeholder="например, example.com">
        </div>
        <div class="form-group">
            <label>Наименование банка и расчетный счет</label>
            <input type="text" id="bankName" readonly placeholder="Данные заполняются автоматически из реестра">
            <input type="text" id="bankAccount" readonly placeholder="Данные заполняются автоматически из реестра">
            <div>
                <label>Ручной ввод банковских данных</label>
                <input type="text" id="manualBankName" placeholder="Наименование банка">
                <input type="text" id="manualBankAccount" placeholder="Расчетный счет">
            </div>
        </div>
        <div class="form-group">
            <label>Цель обращения</label>
            <select id="applicationPurpose" required>
                <option value="">Выберите цель</option>
                <option value="new_license">Получение новой лицензии</option>
                <option value="reissue_license">Переоформление лицензии</option>
                <option value="modify_license">Изменение лицензии</option>
            </select>
        </div>
        <div class="form-group">
            <label>Вид деятельности</label>
            <select id="activityType" required>
                <option value="">Выберите вид деятельности</option>
                <option value="lottery">Деятельность по организации лотерей</option>
                <option value="online_games">Деятельность по организации игр, основанных на риске, в Интернете</option>
                <option value="bookmaking">Букмекерская деятельность</option>
            </select>
        </div>

        <h2>Дополнительные документы</h2>
        <div class="disclaimer">
            Документы, представляемые для получения лицензии, должны быть подписаны (подтверждены) руководителем соискателя лицензии. Документы и данные, прилагаемые к заявлению, должны быть в хорошем качестве в форматах «PDF», «PNG» или «JPEG» и в читабельном виде.
        </div>
        <div class="form-group">
            <label>Сведения о структуре владения, управления и персональном составе</label>
            <input type="file" id="ownershipStructure" accept=".pdf,.png,.jpeg" required>
        </div>
        <div class="radio-group">
            <label>Гражданство руководителей</label>
            <input type="radio" name="directorCitizenship" value="uzbek" required> Граждане Республики Узбекистан
            <input type="radio" name="directorCitizenship" value="foreign"> Иностранные граждане
        </div>
        <div class="radio-group">
            <label>Гражданство учредителей</label>
            <input type="radio" name="founderCitizenship" value="uzbek" required> Граждане Республики Узбекистан
            <input type="radio" name="founderCitizenship" value="foreign"> Иностранные граждане
        </div>
        <div id="uzbekDirectors" style="display: none;">
            <div class="disclaimer">
                Сведения о руководителях указываются до конечного бенефициарного собственника – физического лица.
            </div>
            <div class="form-group">
                <label>Сведения о руководителях</label>
                <textarea id="uzbekDirectorDetails" placeholder="Укажите сведения о руководителях (ФИО, должность и т.д.)"></textarea>
            </div>
        </div>
        <div id="uzbekFounders" style="display: none;">
            <div class="disclaimer">
                Сведения об учредителях указываются до конечного бенефициарного собственника – физического лица.
            </div>
            <div class="form-group">
                <label>Сведения об учредителях</label>
                <textarea id="uzbekFounderDetails" placeholder="Укажите сведения об учредителях (ФИО, доля владения и т.д.)"></textarea>
            </div>
        </div>
        <div id="foreignCitizens" style="display: none;">
            <div class="disclaimer">
                Справка должна быть переведена на государственный язык Республики Узбекистан и нотариально заверена.
            </div>
            <div class="form-group">
                <label>Справка об отсутствии судимости для руководителей</label>
                <input type="file" id="directorCriminalRecord" accept=".pdf,.png,.jpeg">
            </div>
            <div class="form-group">
                <label>Справка об отсутствии судимости для учредителей</label>
                <input type="file" id="founderCriminalRecord" accept=".pdf,.png,.jpeg">
            </div>
        </div>
        <div class="form-group">
            <label>Справка о формировании уставного фонда</label>
            <input type="file" id="capitalCertificate" accept=".pdf,.png,.jpeg" required>
            <div class="disclaimer">
                Для формирования уставного капитала запрещается использование средств, полученных в кредит, под залог, и иных средств, обремененных обязательствами, а также средств, полученных от преступной деятельности.
            </div>
        </div>
        <div class="form-group">
            <label>Справка о депонировании резервного фонда</label>
            <input type="file" id="reserveFund" accept=".pdf,.png,.jpeg" required>
        </div>
        <div class="form-group">
            <label>Справка о банковской гарантии или страховом полисе</label>
            <input type="file" id="bankGuarantee" accept=".pdf,.png,.jpeg" required>
        </div>
        <div class="form-group">
            <label>Документы, подтверждающие право владения доменным именем</label>
            <input type="file" id="domainOwnership" accept=".pdf,.png,.jpeg" required>
        </div>
        <div class="form-group">
            <label>Документы о поставщиках информационной системы</label>
            <input type="file" id="supplierDocuments" accept=".pdf,.png,.jpeg" required>
        </div>
        <div class="form-group" id="gamingEquipmentGroup">
            <label>Документы, подтверждающие сертификацию игрового оборудования</label>
            <input type="file" id="gamingEquipment" accept=".pdf,.png,.jpeg">
        </div>

        <h2>Согласие</h2>
        <div class="checkbox-group">
            <input type="checkbox" id="licenseConditions" required>
            <label for="licenseConditions">Согласен с выполнением лицензионных требований и условий</label>
        </div>
        <div class="checkbox-group">
            <input type="checkbox" id="disclaimerConsent" required>
            <label for="disclaimerConsent">Согласен со всеми дисклеймерами</label>
        </div>

        <button type="submit" class="submit-btn">Отправить заявление</button>
    </form>
</div>

<script>
    // Управление отображением поля для сертификации игрового оборудования
    document.getElementById('activityType').addEventListener('change', function() {
        const gamingEquipmentGroup = document.getElementById('gamingEquipmentGroup');
        if (this.value === 'bookmaking') {
            gamingEquipmentGroup.style.display = 'none';
            document.getElementById('gamingEquipment').required = false;
        } else {
            gamingEquipmentGroup.style.display = 'block';
            document.getElementById('gamingEquipment').required = true;
        }
    });

    // Управление отображением полей в зависимости от гражданства руководителей
    document.querySelectorAll('input[name="directorCitizenship"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const isUzbekDirector = this.value === 'uzbek';
            document.getElementById('uzbekDirectors').style.display = isUzbekDirector ? 'block' : 'none';
            document.getElementById('uzbekDirectorDetails').required = isUzbekDirector;
            updateForeignCitizensDisplay();
        });
    });

    // Управление отображением полей в зависимости от гражданства учредителей
    document.querySelectorAll('input[name="founderCitizenship"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const isUzbekFounder = this.value === 'uzbek';
            document.getElementById('uzbekFounders').style.display = isUzbekFounder ? 'block' : 'none';
            document.getElementById('uzbekFounderDetails').required = isUzbekFounder;
            updateForeignCitizensDisplay();
        });
    });

    // Функция для управления отображением блока для иностранных граждан
    function updateForeignCitizensDisplay() {
        const isForeignDirector = document.querySelector('input[name="directorCitizenship"]:checked')?.value === 'foreign';
        const isForeignFounder = document.querySelector('input[name="founderCitizenship"]:checked')?.value === 'foreign';
        const foreignCitizensBlock = document.getElementById('foreignCitizens');
        foreignCitizensBlock.style.display = isForeignDirector || isForeignFounder ? 'block' : 'none';
        document.getElementById('directorCriminalRecord').required = isForeignDirector;
        document.getElementById('founderCriminalRecord').required = isForeignFounder;
    }

    // Обработка отправки формы
    document.getElementById('licenseForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Заявление успешно отправлено! Персональный кабинет создан.');
    });
</script>
</body>
</html>
