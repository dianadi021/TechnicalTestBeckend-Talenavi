const base_url = window.location.host;
const [host, port] = base_url.split(':');
const $base_url = (IsValidVal(port) ? `http://${host}:${port}` : `https://${host}`);

$(document).ready(function () {
    $.getScript(`${$base_url}/assets/scripts/js/functions.js`, async function () {
        DisableRightClickOnMouse();
        // JQueryOnLoad();
        InitAutocomplete();
        ClearLocalStorage();
        await HiddenAddressDropdown();

        // Function ReImplement START
        function AllNotify($msg, $section) {
            AllNotify($msg, $section)
        }

        function LoadingNotify($msg, $section, $isElmentShow) {
            LoadingNotify($msg, $section, $isElmentShow)
        }

        function AutoInitListJSSearch($get) {
            AutoInitListJSSearch($get);
        };
        // Function ReImplement END

        // Class for DOM elements START
        ClassDOMInputStrict();
        // Class for DOM elements END
    });

    $("#loadingAjax").hide();
    $("#loadingContetLoader").hide();
});

(async function () {
    setTimeout(() => {
        AutoInitListJSSearch("provinsi");
    }, 1000);
})();

function ConvertToIDR($val) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 2 }).format($val);
}

function ContentLoader($url, $id_content) {
    LoadingNotify("Sedang diproses, mohon tunggu!", "info", true);

    $.ajax({
        url: `${$base_url}${$url}`,
        type: 'GET',
        success: function ($response) {
            const $html = IsValidVal($response.data) ? $response.data : $response;
            $(`${$id_content}`).html($html);
        },
        complete: function () {
            LoadingNotify("Berhasil mengambil data!", "success", false);
        },
        error: function () {
            LoadingNotify("Gagal mengambil data!", "error", false);
        },
    });
}

async function ContentLoaderDataTable($url, $id_content, $table_coloumn) {
    // if ($.fn.DataTable.isDataTable($id_content)) {
    //     $(`${$id_content}`).DataTable().destroy();
    // }

    if (!$.fn.DataTable.isDataTable($id_content)) {
        await $(`${$id_content}`).DataTable({
            dom: '<"top flex justify-between"Bfr>t<"bottom"lp><"clear">', // Custom DOM layout
            buttons: [
                {
                    extend: 'excelHtml5', // Excel export button
                    text: '<span class="text-sm"><i class="fa-regular fa-file-excel"></i> Excel</span>',
                    className: 'm-0 p-0', // Customize button style
                    exportOptions: {
                        modifier: {
                            page: 'all' // Export all pages of the table, not just the current page
                        },
                        columns: ':visible' // Only export the visible columns
                    }
                },
                {
                    extend: 'colvis', // Excel export button
                    text: '<span class="text-sm"><i class="fa-solid fa-eye"></i> Show</span>',
                    className: 'm-0 p-0 w-fit', // Customize button style
                },
            ],
            pageLength: 5, // Set initial page length (entries per page)
            lengthMenu: [5, 10, 25, 50, 75, 100], // Provide options for entries per page
            columnDefs: [
                {
                    targets: -1, // Last column (Actions column)
                    visible: true // Ensure 'Actions' column is visible
                }
            ],
            // processing: true, // Aktifkan indikator processing bawaan DataTables
            // serverSide: true,
            ajax: {
                url: `${$url}`,
                dataSrc: "data",
                type: "GET",
                beforeSend: function () {
                    LoadingNotify("Sedang diproses, mohon tunggu!", "info", true);
                },
                complete: function () {
                    LoadingNotify("Berhasil mengambil data!", "success", false);
                },
                error: function (xhr) {
                    LoadingNotify("Gagal mengambil data!", "error", false);
                }
            },
            columns: $table_coloumn
        })
    }
}

function ContentLoaderDataTableV2($datas, $id_content, $table_coloumn) {
    LoadingNotify("Sedang diproses, mohon tunggu!", "info", true);

    $(`${$id_content}`).DataTable({
        dom: '<"top flex justify-between"Bfr>t<"bottom"lp><"clear">', // Custom DOM layout
        buttons: [
            {
                extend: 'excelHtml5', // Excel export button
                text: '<span class="text-sm"><i class="fa-regular fa-file-excel"></i> Excel</span>',
                className: 'm-0 p-0', // Customize button style
                exportOptions: {
                    modifier: {
                        page: 'all' // Export all pages of the table, not just the current page
                    },
                    columns: ':visible' // Only export the visible columns
                }
            },
            {
                extend: 'colvis', // Excel export button
                text: '<span class="text-sm"><i class="fa-solid fa-eye"></i> Show</span>',
                className: 'm-0 p-0 w-fit', // Customize button style
            },
        ],
        pageLength: 5, // Set initial page length (entries per page)
        lengthMenu: [5, 10, 25, 50, 75, 100], // Provide options for entries per page
        columnDefs: [
            {
                targets: -1, // Last column (Actions column)
                visible: true // Ensure 'Actions' column is visible
            }
        ],
        data: $datas,
        columns: $table_coloumn
    });

    setTimeout(function () {
        LoadingNotify("Berhasil mengambil data!", "success", false);
    }, 1500);
}

async function ContentLoaderDataTableV3($url, $id_content, $table_coloumn) {
    if (!$.fn.DataTable.isDataTable(`${$id_content}`)) {
        await $(`${$id_content}`).DataTable({
            dom: '<"top flex justify-between"Bfr>t<"bottom"lp><"clear">', // Custom DOM layout
            buttons: [
                {
                    extend: 'excelHtml5', // Excel export button
                    text: '<span class="text-sm"><i class="fa-regular fa-file-excel"></i> Excel</span>',
                    className: 'm-0 p-0', // Customize button style
                    exportOptions: {
                        modifier: {
                            page: 'all' // Export all pages of the table, not just the current page
                        },
                        columns: ':visible' // Only export the visible columns
                    }
                },
                {
                    extend: 'colvis', // Excel export button
                    text: '<span class="text-sm"><i class="fa-solid fa-eye"></i> Show</span>',
                    className: 'm-0 p-0 w-fit', // Customize button style
                },
            ],
            pageLength: 5, // Set initial page length (entries per page)
            lengthMenu: [5, 10, 25, 50, 75, 100], // Provide options for entries per page
            columnDefs: [
                {
                    targets: -1, // Last column (Actions column)
                    visible: true // Ensure 'Actions' column is visible
                }
            ],
            // processing: true, // Aktifkan indikator processing bawaan DataTables
            // serverSide: true,
            ajax: {
                url: `${$url}`,
                dataSrc: "data",
                type: "GET",
                beforeSend: function () {
                    LoadingNotify("Sedang diproses, mohon tunggu!", "info", true);
                },
                complete: function () {
                    LoadingNotify("Berhasil mengambil data!", "success", false);
                },
                error: function (xhr) {
                    LoadingNotify("Gagal mengambil data!", "error", false);
                }
            },
            columns: $table_coloumn
        })
    } else {
        $(`${$id_content}`).DataTable().ajax.reload();
    }
}

async function ContentLoaderDataTableV4($url, $target, $colomn) {
    LoadingNotify("Sedang mengambil data! Mohon Ditunguu.", "info", true);

    await $.ajax({
        url: `${$url}`,
        type: "GET",
        xhrFields: {
            withCredentials: true
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(callback) {
            const { data } = callback;
            // const { errors, message, messages, data } = getVarValue(responseJSON);
            console.dir(callback);

            const myTheme = agGrid.themeQuartz.withParams({
                browserColorScheme: "inherit",
                headerFontSize: 14
            });

            const gridOptions = {
                theme: myTheme,
                pagination: true,
                rowData: callback,
                columnDefs: $colomn,
                localeText: {
                    // Umum
                    page: 'Halaman',
                    more: 'Lainnya',
                    to: 'sampai',
                    of: 'dari',
                    next: 'Berikutnya',
                    last: 'Terakhir',
                    first: 'Pertama',
                    previous: 'Sebelumnya',

                    // Filter
                    searchOoo: 'Cari...',
                    equals: 'Sama dengan',
                    notEqual: 'Tidak sama dengan',
                    contains: 'Mengandung',
                    notContains: 'Tidak mengandung',
                    startsWith: 'Diawali dengan',
                    endsWith: 'Diakhiri dengan',

                    // Panel filter
                    applyFilter: 'Terapkan Filter',
                    resetFilter: 'Atur Ulang Filter',
                    clearFilter: 'Hapus Filter',

                    // Menu kolom
                    columns: 'Kolom',
                    filters: 'Filter',
                    pivotMode: 'Mode Pivot',
                    groups: 'Grup',
                    values: 'Nilai',
                    pivots: 'Pivot',

                    // Lainnya (sesuai kebutuhan)
                    noRowsToShow: 'Tidak ada data untuk ditampilkan',
                    loadingOoo: 'Memuat...',
                }
            }

            gridOptions.onRowClicked = function(event) {
                 const menu = document.querySelector('.ag-filter-menu');

                if (menu) {
                    // AG Grid simulates outside click with internal event manager
                    // Force remove the popup safely
                    const closeButton = menu.querySelector('.ag-tab-header .ag-tab ag-tab-selected'); // Try any child
                    if (document.activeElement && document.activeElement.blur) {
                    document.activeElement.blur(); // Remove focus from filter input
                    }

                    // Dispatch mousedown outside to force close
                    const mouseDownEvent = new MouseEvent('mousedown', {
                    bubbles: true,
                    cancelable: true,
                    view: window
                    });
                    document.body.dispatchEvent(mouseDownEvent);
                }
            };

            const myGridElement = document.querySelector(`${$target}`);
            agGrid.createGrid(myGridElement, gridOptions);

            LoadingNotify(null, "success");
        },
        error: function(callback) {
            const { responseJSON } = callback;
            const { message, messages, data } = getVarValue(responseJSON);
            let errorInfo, validator;
            if (data) {
                const { errorInfo: errInfo, validator: validCallback } = data
                errorInfo = errInfo;
                validator = validCallback;
            }
            console.dir(callback);

            if (message || messages || errorInfo || validator) {
                const $txtMsgAlert = (validator ? "input data tidak sesuai atau tidak boleh kosong" : ( errorInfo ? errorInfo[2] : (messages ? messages : message)));
                LoadingNotify($txtMsgAlert, "error");
            }

            LoadingNotify();
        },
    });

    LoadingNotify();
}

async function GetFromAPI($url) {
    return new Promise(async function (resolve, reject) {
        try {
            LoadingNotify("Sedang diproses, mohon tunggu!", "info", true);
            await fetch(`${$base_url}${$url}`).then(async function ($list) {
                LoadingNotify("Berhasil mengambil data!", "success", false);
                console.dir($list);
                resolve(await $list.json());
            }).catch(function ($err) {
                LoadingNotify("Gagal mengambil data!", "error", false);
                console.dir($err);
                throw new Error($err);
            });
        } catch (err) {
            reject(err);
        }
    })
}

function IDRToDecimal($val) {
    return parseFloat($val.replace(/[^0-9.-]/g, ''))
}

function getVarValue(val, key = null, defaultVal = null) {
    let tmpVal = key !== null && val && typeof val === 'object' && val[key] != null && val[key] !== '' ? val[key] : defaultVal;
    tmpVal = (key === null && val !== '' ? val : tmpVal);

    return typeof tmpVal === 'string' ? tmpVal.trim() : tmpVal;
}

function IsValidVal(val, key = null, mode = 'bool', other = null) {
    const tmp = getVarValue(val, key, other);
    return {
        value: tmp,
        equal: tmp == other,
        bool: tmp != null && tmp !== ''
    }[mode];
}

function isValEqual(val, key = null, value) {
    return getVarValue(val, key) == value;
}

function valNotEmpty(val, key = null) {
    const tmp = getVarValue(val, key);
    return tmp != null && tmp !== '';
}

function ajaxJSONReturn(code, status, msg, data = {}) {
    return { code, status, message: msg, data };
}

function LoadingInput($section, $elemnt) {
    if ($section == 'loading') {
        $(`#${$elemnt}_autocomplete_container div #search-icon`).hide();
        $(`#${$elemnt}_autocomplete_container div #loading-icon`).show();
    }

    if ($section == 'idle') {
        $(`#${$elemnt}_autocomplete_container div #search-icon`).show();
        $(`#${$elemnt}_autocomplete_container div #loading-icon`).hide();
    }
}

function LoginAjaxSection($postFormData) {
    localStorage.clear();
    $(".csrf-token").val($('meta[name="csrf-token"]').attr('content'));

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    });

    $.ajax({
        url: `${$base_url}/login`,
        type: "POST",
        data: $postFormData,
        xhrFields: {
            withCredentials: true
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (callback) {
            console.dir(callback);
            LoadingNotify("Berhasil Login! Selamat datang.", "success");

            setTimeout(() => {
                window.location.href = `${$base_url}/dashboard`;
            }, 1500);
        },
        error: function (callback) {
            const { responseJSON } = callback;
            const { errors, message, messages, data } = getVarValue(responseJSON);
            let errorInfo, validator;
            if (data) {
                const { errorInfo: errInfo, validator: validCallback } = data
                errorInfo = errInfo;
                validator = validCallback;
            }
            console.dir(callback);
            $(".hideBtnProcess").show();

            if (errors) {
                for (let key in errors) {
                    toastr.error(errors[key][0], "Kesalahan!");
                    $(`#err_${key}`).show();
                    $(`#err_${key} li`).html(errors[key][0]);
                }
            } else if (message || messages || errorInfo || validator) {
                const tmpMsg = (validator ? "input data tidak sesuai atau tidak boleh kosong" : (errorInfo ? errorInfo[2] : (messages ? messages : message)));
                AllNotify(tmpMsg, "error");
            }

            LoadingNotify(null, null, false);
        },
    });
}

function OpenLink($link, $options = ["self", "new", "popup"]) {
    setTimeout(() => {
        if ($options == "self") {
            window.location.href = `${$base_url}${$link}`;
        }

        if ($options == "new") {
            window.open(`${$base_url}${$link}`, "_blank");
        }

        if ($options == "popup") {
            window.open(`${$base_url}${$link}`, "_blank", "width=800,height=600,top=100,left=100,resizable=yes,scrollbars=yes");
        }
    }, 100);
}

function CreatePopUpModal($idContainer, $valModal, $formID, $btnFormFunc = [], $slot, $btnTxt = ["Open Modal", "Simpan", "Reset", "Tutup"], $headContent = [], $footerContent = [], $ifSectionShow = { btn: true, funcBtnOpen: null }) {
    const { btn: $isBtnSection, funcBtnOpen } = $ifSectionShow;
    const $txtFuncBtnOpen = (IsValidVal(funcBtnOpen) ? `onclick="${funcBtnOpen}"` : "");
    const $htmlBtnOpen = `<span class="cursor-pointer inline-flex items-center px-4 py-2 bg-info border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-info focus:bg-info active:bg-info focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" ${$txtFuncBtnOpen}>${$btnTxt[0]}</span>`;
    let $htmlBtnSubmit = "";
    let $htmlBtnReset = "";
    let $htmlBtnClose = "";

    if ($isBtnSection) {
        $htmlBtnSubmit = `<span type="submit" class="hideBtnProcess inline-flex items-center px-4 py-2 bg-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-success focus:bg-success active:bg-success focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer" onclick="${$btnFormFunc[0]}">${$btnTxt[1]}</span>`;
        $htmlBtnReset = `<span type="reset" class="hideBtnProcess inline-flex items-center px-4 py-2 bg-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-danger focus:bg-danger active:bg-danger focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer ms-3" onclick="${$btnFormFunc[1]}">${$btnTxt[2]}</span>`;
        $htmlBtnClose = `<span type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer" @click="${$valModal} = false">${$btnTxt[3]}</span>`;
    }

    const $htmlTxtHead = (IsValidVal($headContent, 0) ? `<h2 class="text-lg font-bold">${$headContent[0]}</h2>` : "");
    const $htmlTxtDescription = (IsValidVal($headContent, 1) ? `<div class="flex text-lg text-gray-800/50"><h3 class="mt-4">${$headContent[1]}</h3></div>` : "");
    const $htmlTxtFoot = (IsValidVal($footerContent, 0) ? `<div class="mt-6 flex justify-center"><p class="mt-4">${$footerContent[0]}</p></div>` : "");
    const $htmlSlot = (IsValidVal($slot) ? $slot : "");

    const $htmlForm = (IsValidVal($formID) ? `
    <div>
        <div class="mt-4">
            ${$htmlSlot}
        </div>

        <div class="mt-6 flex justify-end space-x-2">
            ${$htmlTxtFoot}

            ${$htmlBtnClose}

            ${$htmlBtnReset}

            ${$htmlBtnSubmit}
        </div>
    </div>
    ` : "");

    const htmlBtn = `${$htmlBtnOpen}`;

    const htmlModal = `
    <button class="hidden" @click="${$valModal} = true"></button>

    <div class="modal_section">
        <div
            x-show="${$valModal}"
            class="fixed inset-0 z-40 flex items-center justify-center bg-black bg-opacity-50 p-4"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="bg-white w-full max-w-7xl mx-auto rounded-lg shadow-lg p-6 max-h-[100vh] overflow-y-auto" @click.away="${$valModal} = false" @keydown.escape.window="${$valModal} = false">
                <div class="flex justify-between items-center border-b pb-3">
                    ${$htmlTxtHead}
                    <span class="modal_section_close_btn" @click="${$valModal} = false" class="text-gray-500 hover:text-gray-700 text-xl cursor-pointer">
                        &times;
                    </span>
                </div>

                <!-- Konten Modal -->
                <div class="mt-4">
                    ${$htmlTxtDescription}
                    ${$htmlForm}
                </div>
            </div>
        </div>
    </div>
    `;

    $(`${$idContainer[0]}`).html(htmlBtn);
    $(`${$idContainer[1]}`).html(htmlModal);
}
async function DropdownSelectAlpine($val = ["name", "id's"], $target) {
    $(`#${$target}`).val($val[0]);

    if (IsValidVal($val, 1)) {
        $(`#id_${$target}`).val($val[1]);
    }
}

async function DropdownContentLoader($url, $target, $section = null) {
    LoadingNotify(null, null, true);
    await $.ajax({
        url: `${$base_url}${$url}`,
        type: 'GET',
        success: async function ($response) {
            const $datas = IsValidVal($response.data) ? $response.data : $response;
            if (IsValidVal($datas) && $datas.length > 0) {
                let $html = ``;
                $datas.forEach(function ($list) {
                    const { type, postal_code } = $list;
                    const $tmpType = IsValidVal(type) && $section === "wilayah" ? `${type} ` : "";
                    const $tmpPostalCode = IsValidVal(postal_code) && $section === "wilayah" ? `<p><strong>Kode Pos: </strong>${postal_code}</p> ` : "";
                    const $txtDisplay = IsValidVal($section) && $section === "wilayah" ? `<p class="nama_${$target}">${$tmpType}${$list.name}${$tmpPostalCode}</p>` : `${$list.name}`;

                    $html += `
                    <li @click="open = !open" class="list_${$target} text-nowrap text-sm px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="DropdownSelectAlpine(['${$list.name}', ${$list.id}], '${$target}')">
                        ${$txtDisplay}
                    </li>
                    `;
                });

                $(`#list_${$target}`).html($html);
            } else {
                $html = `<li id="404_${$target}" class="text-sm px-4 py-2 text-gray-500 hidden cursor-default">Data tidak ditemukan.</li>`;
                $(`#list_${$target}`).html($html);
            }

            setTimeout(() => {
                AutoInitListJSSearch($target);
            }, 1000);
            LoadingNotify(null, null, false);
        },
        error: function ($xhr) {
            LoadingNotify(null, null, false);
        }
    });
}

async function DropdownGetLoad($get, $from, $section = null, $searchForm = null, $listContainer = null) {
    const $localStorage = localStorage.getItem($section);
    let $localStorageData = (IsValidVal($localStorage) ? JSON.parse($localStorage) : []);

    let $statusResult = $localStorageData.length > 0;
    const $formArray = $(`${$searchForm}`).serializeArray();
    const $target = (valNotEmpty($listContainer) ? $listContainer : $get);

    const $newLocalDatas = [];
    $formArray.forEach(function ($list) {
        const { name } = $list;
        if (IsValidVal($(`#id_${name}`).val())) {
            $newLocalDatas.push({ name: `id_${name}`, value: $(`#id_${name}`).val() });
        }
    });

    if ($statusResult) {
        $localStorageData.forEach(function ($list, $index) {
            const { name, value } = $list;

            if (isValEqual(name, null, `id_${$from}`)) {
                $statusResult = isValEqual(name, null, `id_${$from}`) && isValEqual(value, null, $(`#id_${$from}`).val());
            }
        })
    }

    $statusResult = JSON.stringify($newLocalDatas) == JSON.stringify($localStorageData) && ($(`.list_${$target}`)).length > 0;

    if (!$statusResult) {
        localStorage.setItem($section, JSON.stringify($newLocalDatas));

        const $listID = [];
        $newLocalDatas.forEach(function ($list) {
            const { name } = $list;

            if (name == `id_${$from}`) {
                $listID.push(`${name}=${$(`#id_${$from}`).val()}`);
            }
        });

        const $params = $listID.length > 0 ? $listID.join("&") : $listID;
        const $fxdParams = IsValidVal($params) ? `&${$params}` : "";
        await DropdownContentLoader(`/api/search?get_data=${$get}${$fxdParams}`, $target, $section);
    }
}
