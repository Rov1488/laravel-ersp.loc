<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Create Reinsurance Contract — Форма</title>

    <!-- Tailwind (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            },
            darkMode: 'class'
        }
    </script>

    <style>
        /* небольшой стиль для скролла блока contracts */
        .contracts-list {
            max-height: 420px;
            overflow: auto;
        }

        .required {
            color: #dc2626;
            margin-left: .25rem;
        }

        /* red star */
    </style>
</head>

<body class="bg-gray-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100 min-h-screen">

    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Создать перестраховочный договор (CreateReinsuranceContract)</h1>

        <form id="contractForm" class="space-y-6 bg-white dark:bg-slate-800 p-6 rounded-lg shadow">
            <!-- Основные поля -->
            <!-- Oferta UUIDs -->
            <div id="ofertaBlock">
                <label class="block font-medium text-gray-700 mb-1">
                    UUID оферт <span id="ofertaRequired" class="text-red-500 hidden">*</span>
                </label>
                <input type="text" id="ofertaUuids" name="ofertaUuids"
                    class="w-full border rounded-lg p-2 transition" placeholder="sadad-asd-asdasd-asdasd">
                <p class="text-sm text-gray-500">
                    Обязательно, если <strong>direction = 1</strong> и <strong>reinsurerIsForeign = 1</strong> и
                    <strong>isInvest = 0</strong>
                </p>
            </div>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">direction <span class="required">*</span>
                        <div class="text-xs text-slate-500">1 — Исходящий, 2 — Входящий иностранный</div>
                    </label>
                    <select id="direction" name="direction" required
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                        <option value="">Выберите направление</option>
                        <option value="1">1 — Исходящий</option>
                        <option value="2">2 — Входящий иностранный</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsurerIsForeign <span class="required">*</span>
                        <div class="text-xs text-slate-500">0 — местный, 1 — иностранный</div>
                    </label>
                    <select id="reinsurerIsForeign" name="reinsurerIsForeign" required
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                        <option value="">Выберите</option>
                        <option value="0">0 — местный</option>
                        <option value="1">1 — иностранный</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsurantForeignInsuranceOrgId
                        <div class="text-xs text-slate-500">id иностранной СК — обязательно если direction=2</div>
                    </label>
                    <input id="reinsurantForeignInsuranceOrgId" name="reinsurantForeignInsuranceOrgId" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsurerOrgId
                        <div class="text-xs text-slate-500">id местного страховщика — обязателен если direction=1 и
                            reinsurerIsForeign=0</div>
                    </label>
                    <input id="reinsurerOrgId" name="reinsurerOrgId" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsurerForeignOrgId
                        <div class="text-xs text-slate-500">id иностранной СК — обязателен если direction=1 и
                            reinsurerIsForeign=1</div>
                    </label>
                    <input id="reinsurerForeignOrgId" name="reinsurerForeignOrgId" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">contractNumber <span class="required">*</span></label>
                    <input id="contractNumber" name="contractNumber" required type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">contractIssueDate <span
                            class="required">*</span></label>
                    <input id="contractIssueDate" name="contractIssueDate" required type="date"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsuranceStartDate <span
                            class="required">*</span></label>
                    <input id="reinsuranceStartDate" name="reinsuranceStartDate" required type="date"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsuranceEndDate <span
                            class="required">*</span></label>
                    <input id="reinsuranceEndDate" name="reinsuranceEndDate" required type="date"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsuranceFormId <span class="required">*</span>
                        <div class="text-xs text-slate-500">Форма перестрахования (id)</div>
                    </label>
                    <select id="reinsuranceFormId" name="reinsuranceFormId" required
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                        <option value="">Выберите форму</option>
                        <option value="1">1 — slip form</option>
                        <option value="2">2 — obligator form</option>
                        <option value="3">3 — slip form B</option>
                        <option value="4">4 — obligator form B</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsuranceTypeId <span
                            class="required">*</span></label>
                    <input id="reinsuranceTypeId" name="reinsuranceTypeId" required type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>
            </section>

            <!-- Финансы и суммы -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">reinsurantShare <span class="required">*</span>
                        <div class="text-xs text-slate-500">Доля в сум</div>
                    </label>
                    <input id="reinsurantShare" name="reinsurantShare" required type="number" step="0.01"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsurantShareInPercents <span
                            class="required">*</span></label>
                    <input id="reinsurantShareInPercents" name="reinsurantShareInPercents" required type="number"
                        step="0.01" class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">reinsurerLimit <span
                            class="required">*</span></label>
                    <input id="reinsurerLimit" name="reinsurerLimit" required type="number" step="0.01"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">bruttoInsurancePremium <span
                            class="required">*</span></label>
                    <input id="bruttoInsurancePremium" name="bruttoInsurancePremium" required type="number"
                        step="0.01" class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">commission <span class="required">*</span></label>
                    <input id="commission" name="commission" required type="number" step="0.01"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">currencyId (опционально)</label>
                    <input id="currencyId" name="currencyId" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">exchangeRate (если currencyId)</label>
                    <input id="exchangeRate" name="exchangeRate" type="number" step="0.0001"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">nettoInsurancePremium <span
                            class="required">*</span></label>
                    <input id="nettoInsurancePremium" name="nettoInsurancePremium" required type="number"
                        step="0.01" class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>
            </section>

            <!-- Платежи и сроки -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">paymentTypeId <span
                            class="required">*</span></label>
                    <input id="paymentTypeId" name="paymentTypeId" required type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">deadlineForFullPremiumPayment <span
                            class="required">*</span></label>
                    <input id="deadlineForFullPremiumPayment" name="deadlineForFullPremiumPayment" required
                        type="date" class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">paidPremium (опционально)</label>
                    <input id="paidPremium" name="paidPremium" type="number" step="0.01"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">premiumPaidDate (опционально)</label>
                    <input id="premiumPaidDate" name="premiumPaidDate" type="date"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>
            </section>

            <!-- Invest -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">isInvest</label>
                    <select id="isInvest" name="isInvest"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700">
                        <option value="0">0 — нет</option>
                        <option value="1">1 — да</option>
                    </select>
                </div>

                <div id="investJustificationWrap" class="hidden">
                    <label class="block text-sm font-medium mb-1">investJustification (обязательно если
                        isInvest=1)</label>
                    <textarea id="investJustification" name="investJustification" rows="2"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700"></textarea>
                </div>
            </section>

            <!-- Поля зависящие от reinsuranceFormId -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div id="obligatorWrap" class="hidden">
                    <label class="block text-sm font-medium mb-1">obligatorCondition</label>
                    <input id="obligatorCondition" name="obligatorCondition" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div id="obligatorOtherWrap" class="hidden">
                    <label class="block text-sm font-medium mb-1">obligatorOtherCondition</label>
                    <input id="obligatorOtherCondition" name="obligatorOtherCondition" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div id="slipNumberWrap" class="hidden">
                    <label class="block text-sm font-medium mb-1">slipNumber</label>
                    <input id="slipNumber" name="slipNumber" type="text"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>

                <div id="slipDateWrap" class="hidden">
                    <label class="block text-sm font-medium mb-1">slipDate</label>
                    <input id="slipDate" name="slipDate" type="date"
                        class="w-full rounded border px-3 py-2 bg-white dark:bg-slate-700" />
                </div>
            </section>

            <!-- Массив contracts -->
            <section>
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold">Contracts (массив)</h3>
                    <div class="space-x-2">
                        <button id="addContractBtn" type="button"
                            class="inline-flex items-center px-3 py-2 rounded bg-green-600 text-white hover:bg-green-700">Добавить
                            контракт</button>
                        <button id="clearContractsBtn" type="button"
                            class="inline-flex items-center px-3 py-2 rounded border hover:bg-slate-50 dark:hover:bg-slate-700">Очистить</button>
                    </div>
                </div>

                <div id="contractsContainer" class="space-y-3 contracts-list"></div>
                <div class="text-xs text-slate-500 mt-2">Для локального договора: заполните contractUuid. Для
                    иностранного — передайте все поля кроме contractUuid и отметьте isForeign=1.</div>
            </section>

            <!-- Действия -->
            <div class="flex items-center gap-3">
                <button id="submitBtn" type="submit"
                    class="px-5 py-2 bg-primary text-white rounded hover:brightness-95">Сохранить / Отправить</button>
                <button id="previewBtn" type="button"
                    class="px-4 py-2 border rounded hover:bg-slate-50 dark:hover:bg-slate-700">Показать JSON</button>
                <div id="formMessage" class="text-sm text-red-600 ml-3 hidden"></div>
            </div>
        </form>

        <!-- Модал для вывода JSON -->
        <div id="jsonModal" class="fixed inset-0 hidden items-center justify-center z-50">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative max-w-3xl w-full bg-white dark:bg-slate-800 rounded p-4 shadow-lg">
                <div class="flex justify-between items-center mb-3">
                    <h4 class="font-semibold">JSON payload</h4>
                    <button id="closeJson"
                        class="text-sm px-2 py-1 rounded hover:bg-slate-200 dark:hover:bg-slate-700">Закрыть</button>
                </div>
                <pre id="jsonOutput" class="text-xs overflow-auto max-h-[60vh] p-2 bg-slate-100 dark:bg-slate-900 rounded"></pre>
            </div>
        </div>

    </div>

    <script>
        // ---------- Utilities ----------
        function el(tag, attrs = {}, ...children) {
            const e = document.createElement(tag);
            for (const k in attrs) {
                if (k.startsWith('on') && typeof attrs[k] === 'function') e.addEventListener(k.substring(2), attrs[k]);
                else if (k === 'class') e.className = attrs[k];
                else e.setAttribute(k, attrs[k]);
            }
            for (const ch of children) {
                if (typeof ch === 'string') e.appendChild(document.createTextNode(ch));
                else if (ch) e.appendChild(ch);
            }
            return e;
        }

        // ---------- Dynamic contracts array ----------
        const contractsContainer = document.getElementById('contractsContainer');
        const addContractBtn = document.getElementById('addContractBtn');
        const clearContractsBtn = document.getElementById('clearContractsBtn');

        let contractIndex = 0;

        function createContractCard(index) {
            // wrapper
            const wrap = el('div', {
                class: 'p-4 bg-slate-50 dark:bg-slate-900 rounded border dark:border-slate-700'
            });

            const header = el('div', {
                    class: 'flex items-center justify-between mb-2'
                },
                el('div', {
                    class: 'font-medium'
                }, `Contract #${index+1}`),
                el('div', {},
                    el('button', {
                        type: 'button',
                        class: 'text-sm px-2 py-1 rounded border',
                        onClick: () => {
                            wrap.remove();
                        }
                    }, 'Удалить')
                )
            );

            // fields: isForeign, contractUuid, contractNumber, contractIssueDate, insuranceOrgId, foreignInsuranceOrgId, startDate, endDate, insuranceSum
            const fields = [{
                    id: 'isForeign',
                    label: 'isForeign (0/1)',
                    type: 'select',
                    options: [{
                        v: '0',
                        t: '0 - местный'
                    }, {
                        v: '1',
                        t: '1 - иностранный'
                    }]
                },
                {
                    id: 'contractUuid',
                    label: 'contractUuid (uuid)',
                    type: 'text'
                },
                {
                    id: 'contractNumber',
                    label: 'contractNumber',
                    type: 'text'
                },
                {
                    id: 'contractIssueDate',
                    label: 'contractIssueDate',
                    type: 'date'
                },
                {
                    id: 'insuranceFormId',
                    label: 'insuranceFormId',
                    type: 'text'
                },
                {
                    id: 'insuranceProductName',
                    label: 'insuranceProductName',
                    type: 'text'
                },
                {
                    id: 'insurantName',
                    label: 'insurantName',
                    type: 'text'
                },
                {
                    id: 'classes',
                    label: 'classes',
                    type: 'text'
                },
                {
                    id: 'insuranceOrgId',
                    label: 'insuranceOrgId (местный)',
                    type: 'text'
                },
                {
                    id: 'foreignInsuranceOrgId',
                    label: 'foreignInsuranceOrgId (иностранный)',
                    type: 'text'
                },
                {
                    id: 'countryId',
                    label: 'countryId',
                    type: 'text'
                },
                {
                    id: 'insuranceSum',
                    label: 'insuranceSum (в сум)',
                    type: 'number'
                },
                {
                    id: 'currencyId',
                    label: 'currencyId',
                    type: 'text'
                },
                {
                    id: 'startDate',
                    label: 'startDate',
                    type: 'date'
                },
                {
                    id: 'endDate',
                    label: 'endDate',
                    type: 'date'
                },
                {
                    id: 'insOrgObjectId',
                    label: 'insOrgObjectId',
                    type: 'text'
                },
                {
                    id: 'objectName',
                    label: 'objectName',
                    type: 'text'
                }
            ];

            const grid = el('div', {
                class: 'grid grid-cols-1 md:grid-cols-2 gap-2'
            });
            fields.forEach(f => {
                let fieldEl;
                if (f.type === 'select') {
                    fieldEl = el('select', {
                            id: `contracts_${index}_${f.id}`,
                            class: 'w-full rounded border px-2 py-1 bg-white dark:bg-slate-700'
                        },
                        ...f.options.map(o => el('option', {
                            value: o.v
                        }, o.t))
                    );
                } else {
                    fieldEl = el('input', {
                        id: `contracts_${index}_${f.id}`,
                        type: f.type,
                        class: 'w-full rounded border px-2 py-1 bg-white dark:bg-slate-700'
                    });
                }
                grid.appendChild(el('label', {
                    class: 'text-xs'
                }, f.label, fieldEl));
            });

            wrap.appendChild(header);
            wrap.appendChild(grid);

            return wrap;
        }

        addContractBtn.addEventListener('click', () => {
            const card = createContractCard(contractIndex);
            contractsContainer.appendChild(card);
            contractIndex++;
        });

        clearContractsBtn.addEventListener('click', () => {
            contractsContainer.innerHTML = '';
            contractIndex = 0;
        });

        // ---------- Conditional fields behavior ----------
        const directionEl = document.getElementById('direction');
        const reinsurerIsForeignEl = document.getElementById('reinsurerIsForeign');

        function updateConditionalFields() {
            const dir = directionEl.value;
            const reinsurerIsForeign = reinsurerIsForeignEl.value;

            // reinsurantForeignInsuranceOrgId required if direction=2
            document.getElementById('reinsurantForeignInsuranceOrgId').closest('div').style.display = dir === '2' ?
                'block' : 'none';

            // reinsurerOrgId required if direction=1 and reinsurerIsForeign=0
            document.getElementById('reinsurerOrgId').closest('div').style.display = (dir === '1' && reinsurerIsForeign ===
                '0') ? 'block' : 'none';

            // reinsurerForeignOrgId if direction=1 and reinsurerIsForeign=1
            document.getElementById('reinsurerForeignOrgId').closest('div').style.display = (dir === '1' &&
                reinsurerIsForeign === '1') ? 'block' : 'none';
        }

        directionEl.addEventListener('change', updateConditionalFields);
        reinsurerIsForeignEl.addEventListener('change', updateConditionalFields);

        // reinsuranceFormId dependent fields
        const reinsuranceFormIdEl = document.getElementById('reinsuranceFormId');
        const obligatorWrap = document.getElementById('obligatorWrap');
        const obligatorOtherWrap = document.getElementById('obligatorOtherWrap');
        const slipNumberWrap = document.getElementById('slipNumberWrap');
        const slipDateWrap = document.getElementById('slipDateWrap');

        function updateFormIdDepends() {
            const val = reinsuranceFormIdEl.value;
            // if reinsuranceFormId = 2 or 4 => show obligator*
            if (val === '2' || val === '4') {
                obligatorWrap.classList.remove('hidden');
                obligatorOtherWrap.classList.remove('hidden');
                slipNumberWrap.classList.add('hidden');
                slipDateWrap.classList.add('hidden');
            } else {
                // if 1 or 3 -> show slip fields
                slipNumberWrap.classList.remove('hidden');
                slipDateWrap.classList.remove('hidden');
                obligatorWrap.classList.add('hidden');
                obligatorOtherWrap.classList.add('hidden');
            }
        }
        reinsuranceFormIdEl.addEventListener('change', updateFormIdDepends);

        // isInvest
        const isInvestEl = document.getElementById('isInvest');
        const investJustificationWrap = document.getElementById('investJustificationWrap');
        isInvestEl.addEventListener('change', () => {
            investJustificationWrap.classList.toggle('hidden', isInvestEl.value !== '1');
        });

        // paymentTypeId conditional (example: 9 requires first payment fields)
        const paymentTypeIdEl = document.getElementById('paymentTypeId');
        // (We'll show example fields if equals 9)
        paymentTypeIdEl.addEventListener('change', () => {
            // Implement if needed: show/hide firstPaymentDeadline etc.
            // For brevity these fields not added in UI above except placeholders. Extend similarly as reinsuranceFormId.
        });

        // ---------- Build payload ----------
        function collectContracts() {
            const nodes = Array.from(contractsContainer.children);
            return nodes.map((card, idx) => {
                // query inputs inside card using ids
                const obj = {};
                const inputs = card.querySelectorAll('input, select, textarea');
                inputs.forEach(inp => {
                    const id = inp.id.replace(/^contracts_\d+_/, '');
                    let val = inp.value;
                    // cast numeric boolean fields if appropriate
                    if (['isForeign'].includes(id)) {
                        val = val === '1' ? 1 : 0;
                    } else if (inp.type === 'number') {
                        val = val === '' ? null : Number(val);
                    }
                    if (val !== '') obj[id] = val;
                });
                return obj;
            });
        }

        function collectForm() {
            const form = document.getElementById('contractForm');
            const fd = new FormData(form);

            // basic required checks (additional rules are implemented below)
            const payload = {};

            // ofertaUuids: allow user to paste comma separated list in hidden prompt? For simplicity we take a text input if exists - not present.
            // If needed, one can add a dedicated input for ofertaUuids. We'll check a dedicated field (not present) and default to [].
            payload.ofertaUuids = []; // user should adapt if they have offers

            payload.direction = fd.get('direction') ? Number(fd.get('direction')) : null;
            payload.reinsurantForeignInsuranceOrgId = fd.get('reinsurantForeignInsuranceOrgId') || null;
            payload.reinsurerIsForeign = fd.get('reinsurerIsForeign') ? Number(fd.get('reinsurerIsForeign')) : null;
            payload.reinsurerOrgId = fd.get('reinsurerOrgId') || null;
            payload.reinsurerForeignOrgId = fd.get('reinsurerForeignOrgId') || null;
            payload.contractNumber = fd.get('contractNumber') || null;
            payload.contractIssueDate = fd.get('contractIssueDate') || null;
            payload.reinsuranceStartDate = fd.get('reinsuranceStartDate') || null;
            payload.reinsuranceEndDate = fd.get('reinsuranceEndDate') || null;
            payload.reinsuranceFormId = fd.get('reinsuranceFormId') ? Number(fd.get('reinsuranceFormId')) : null;
            payload.reinsuranceTypeId = fd.get('reinsuranceTypeId') ? Number(fd.get('reinsuranceTypeId')) : null;

            // numeric / amounts
            ['reinsurantShare', 'reinsurantShareInPercents', 'reinsurerLimit', 'reinsurerLimitInPercents',
                'bruttoInsurancePremium', 'bruttoInsurancePremiumInPercents', 'commission', 'commissionInPercents',
                'nettoInsurancePremium', 'nettoInsurancePremiumInPercents', 'exchangeRate', 'nettoAccrualPremium',
                'nettoAccrualCommission'
            ].forEach(k => {
                let v = fd.get(k);
                if (v !== null && v !== '') payload[k] = isNaN(v) ? v : Number(v);
            });

            // rest simple fields
            ['obligatorCondition', 'obligatorOtherCondition', 'slipNumber', 'slipDate',
                'bruttoInsurancePremiumInForeignCurrency',
                'commissionInForeignCurrency', 'brokerCommission', 'brokerCommissionInForeignCurrency', 'brokerId',
                'covernoteNumber', 'covernoteDate',
                'nettoInsurancePremiumInForeignCurrency', 'nettoAccrualDate', 'nettoAccrualCommission',
                'bruttoAccrualPremium', 'deadlineForFullPremiumPayment',
                'paidPremium', 'premiumPaidDate', 'paymentTypeId', 'firstPaymentDeadline', 'firstPaymentSum',
                'firstPaymentDate', 'firstPaymentPaidSum',
                'isInvest', 'investJustification'
            ].forEach(k => {
                const v = fd.get(k);
                if (v !== null && v !== '') payload[k] = v;
            });

            // contracts
            payload.contracts = collectContracts();

            return payload;
        }

        // ---------- Validation rules (basic) ----------
        function validatePayload(p) {
            const errors = [];

            if (![1, 2].includes(Number(p.direction))) errors.push('Направление (direction) должно быть 1 или 2.');
            if (!p.contractNumber) errors.push('contractNumber обязателен.');
            if (!p.contractIssueDate) errors.push('contractIssueDate обязателен.');
            if (!p.reinsuranceStartDate) errors.push('reinsuranceStartDate обязателен.');
            if (!p.reinsuranceEndDate) errors.push('reinsuranceEndDate обязателен.');
            if (!p.reinsuranceFormId) errors.push('reinsuranceFormId обязателен.');
            if (!p.reinsuranceTypeId) errors.push('reinsuranceTypeId обязателен.');
            if (p.reinsurerIsForeign === null) errors.push('reinsurerIsForeign обязателен.');

            // conditional
            if (Number(p.direction) === 2 && !p.reinsurantForeignInsuranceOrgId) errors.push(
                'reinsurantForeignInsuranceOrgId обязателен для direction=2.');
            if (Number(p.direction) === 1) {
                if (Number(p.reinsurerIsForeign) === 0 && !p.reinsurerOrgId) errors.push(
                    'reinsurerOrgId обязателен для direction=1 и reinsurerIsForeign=0.');
                if (Number(p.reinsurerIsForeign) === 1 && !p.reinsurerForeignOrgId) errors.push(
                    'reinsurerForeignOrgId обязателен для direction=1 и reinsurerIsForeign=1.');
            }

            // reinsuranceFormId specifics
            if (Number(p.reinsuranceFormId) === 2 || Number(p.reinsuranceFormId) === 4) {
                if (!p.obligatorCondition) errors.push('obligatorCondition обязателен для использования формы 2/4.');
                if (!p.obligatorOtherCondition) errors.push(
                    'obligatorOtherCondition обязателен для использования формы 2/4.');
            } else {
                if (!p.slipNumber) errors.push('slipNumber обязателен для формы 1/3.');
                if (!p.slipDate) errors.push('slipDate обязателен для формы 1/3.');
            }

            // minimal financial required fields
            if (p.reinsurantShare === undefined) errors.push('reinsurantShare обязателен.');
            if (p.reinsurantShareInPercents === undefined) errors.push('reinsurantShareInPercents обязателен.');
            if (p.reinsurerLimit === undefined) errors.push('reinsurerLimit обязателен.');
            if (p.bruttoInsurancePremium === undefined) errors.push('bruttoInsurancePremium обязателен.');
            if (p.commission === undefined) errors.push('commission обязателен.');
            if (p.nettoInsurancePremium === undefined) errors.push('nettoInsurancePremium обязателен.');
            if (!p.paymentTypeId) errors.push('paymentTypeId обязателен.');
            if (!p.deadlineForFullPremiumPayment) errors.push('deadlineForFullPremiumPayment обязателен.');

            // contracts array: at least one
            if (!Array.isArray(p.contracts) || p.contracts.length === 0) errors.push(
                'Добавьте хотя бы один item в contracts.');

            return errors;
        }

        // ---------- Submit / preview ----------
        const form = document.getElementById('contractForm');
        const formMessage = document.getElementById('formMessage');
        const jsonModal = document.getElementById('jsonModal');
        const jsonOutput = document.getElementById('jsonOutput');
        const previewBtn = document.getElementById('previewBtn');
        const closeJson = document.getElementById('closeJson');

        function showJsonModal(payload) {
            jsonOutput.textContent = JSON.stringify(payload, null, 2);
            jsonModal.classList.remove('hidden');
            jsonModal.classList.add('flex');
        }
        closeJson.addEventListener('click', () => {
            jsonModal.classList.add('hidden');
            jsonModal.classList.remove('flex');
        });

        previewBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const payload = collectForm();
            const errors = validatePayload(payload);
            if (errors.length) {
                formMessage.textContent = errors.join(' ');
                formMessage.classList.remove('hidden');
                setTimeout(() => formMessage.classList.add('hidden'), 6000);
                return;
            }
            showJsonModal(payload);
        });

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            formMessage.classList.add('hidden');

            const payload = collectForm();
            const errors = validatePayload(payload);
            if (errors.length) {
                formMessage.textContent = errors.join(' ');
                formMessage.classList.remove('hidden');
                return;
            }

            // show JSON preview
            showJsonModal(payload);

            // Example: отправка на API (раскомментируйте и замените URL)
            /*
            fetch('/api/reinsurance/contracts', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify(payload)
            }).then(r => r.json()).then(res => {
              console.log('server response', res);
            }).catch(err => {
              console.error(err);
            });
            */
        });

        // ---------- Init UI ----------
        // hide optional blocks initially
        updateConditionalFields();
        updateFormIdDepends();
        investJustificationWrap.classList.toggle('hidden', isInvestEl.value !== '1');
    </script>

</body>

</html>
