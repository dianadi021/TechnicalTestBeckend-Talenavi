function DisableRightClickOnMouse() {
    function disabledSelection(e) {
        return false;
    }

    function reEnable() {
        return true;
    }

    document.onselectstart = new Function("return false");

    if (window.sidebar) {
        document.onmousedown = disabledSelection;
        document.onclick = reEnable;
    }
}

function JQueryOnLoad() {
    // AJAX SECTION START
    // Tampilkan loading overlay saat form dikirim
    // $(document).on("submit", "form", function () {
    //     $("#loadingAjax").removeClass("hidden");
    // });

    // Tampilkan loading overlay untuk Ajax request
    // $(document).ajaxStart(function () {
    //     $("#loadingAjax").removeClass("hidden");
    // });

    // Sembunyikan loading overlay setelah Ajax selesai
    // $(document).ajaxStop(function () {
    //     $("#loadingAjax").addClass("hidden");
    // });
    // AJAX SECTION END
}

function InitAutocomplete() {
    $(document).ready(function () {
        if ($("#provinsi").length) {
            $("#provinsi").autocomplete({
                source: async function (request, response) {
                    if (request.term.length < 1) return;

                    LoadingInput('loading', 'provinsi');

                    try {
                        const { data } = await $.ajax({
                            url: `/api/search?get_data=provinsi`,
                            data: { q: request.term },
                        });

                        LoadingInput('idle', 'provinsi');

                        response(data.length ? data : [{ name: 'Data tidak ditemukan', id: '' }]);
                    } catch (error) {
                        console.dir(error);
                        LoadingInput('idle', 'provinsi');
                        response([{ name: 'Data tidak ditemukan', id: '' }]);
                    }
                },
                minLength: 1,
                focus: function (_, ui) {
                    if (ui.item.id) {
                        $("#provinsi").val(ui.item.name);
                        $("#id_provinsi").val(ui.item.id);
                    }
                    return false;
                },
                select: function (_, ui) {
                    if (ui.item.id) {
                        $("#provinsi").val(ui.item.name);
                        $("#id_provinsi").val(ui.item.id);
                    }
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>").append(`<div>Provinsi: <strong>${item.name}</strong></div>`).appendTo(ul);
            };
        }

        if ($("#kabupaten").length) {
            $("#kabupaten").autocomplete({
                source: async function (request, response) {
                    if (request.term.length < 1) return;

                    LoadingInput('loading', 'kabupaten');

                    try {
                        const { data } = await $.ajax({
                            url: `/api/search?get_data=kabupaten`,
                            data: { q: request.term, id_provinsi: (IsValidVal($("#provinsi").val()) ? $("#id_provinsi").val() : null) },
                        });

                        LoadingInput('idle', 'kabupaten');
                        response(data.length ? data : [{ name: 'Data tidak ditemukan', id: '' }]);
                    } catch (error) {
                        console.dir(error);
                        LoadingInput('idle', 'kabupaten');
                        response([{ name: 'Data tidak ditemukan', id: '' }]);
                    }
                },
                minLength: 1,
                focus: function (_, ui) {
                    if (ui.item.id) {
                        $("#kabupaten").val(ui.item.name);
                        $("#id_kabupaten").val(ui.item.id);
                    }
                    return false;
                },
                select: function (_, ui) {
                    if (ui.item.id) {
                        $("#kabupaten").val(ui.item.name);
                        $("#id_kabupaten").val(ui.item.id);
                    }
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>").append(`<div><strong>${item.name}</strong></div>`).appendTo(ul);
            };
        }

        if ($("#kecamatan").length) {
            $("#kecamatan").autocomplete({
                source: async function (request, response) {
                    if (request.term.length < 1) return;

                    LoadingInput('loading', 'kecamatan');

                    try {
                        const { data } = await $.ajax({
                            url: `/api/search?get_data=kecamatan`,
                            data: { q: request.term, id_kabupaten: IsValidVal($("#kabupaten").val()) ? $("#id_kabupaten").val() : null },
                        });

                        LoadingInput('idle', 'kecamatan');
                        response(data.length ? data : [{ name: 'Data tidak ditemukan', id: '' }]);
                    } catch (error) {
                        console.dir(error);
                        LoadingInput('idle', 'kecamatan');
                        response([{ name: 'Data tidak ditemukan', id: '' }]);
                    }
                },
                minLength: 1,
                focus: function (_, ui) {
                    if (ui.item.id) {
                        $("#kecamatan").val(ui.item.name);
                        $("#id_kecamatan").val(ui.item.id);
                    }
                    return false;
                },
                select: function (_, ui) {
                    if (ui.item.id) {
                        $("#kecamatan").val(ui.item.name);
                        $("#id_kecamatan").val(ui.item.id);
                    }
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>").append(`<div>Kecamatan: <strong>${item.name}</strong></div>`).appendTo(ul);
            };
        }

        if ($("#kelurahan").length) {
            $("#kelurahan").autocomplete({
                source: async function (request, response) {
                    if (request.term.length < 1) return;

                    LoadingInput('loading', 'kelurahan');

                    try {
                        const { data } = await $.ajax({
                            url: `/api/search?get_data=kelurahan`,
                            data: { q: request.term, id_kecamatan: (IsValidVal($("#kecamatan").val()) ? $("#id_kecamatan").val() : null) },
                        });

                        LoadingInput('idle', 'kelurahan');
                        response(data.length ? data : [{ name: 'Data tidak ditemukan', id: '' }]);
                    } catch (error) {
                        console.dir(error);
                        LoadingInput('idle', 'kelurahan');
                        response([{ name: 'Data tidak ditemukan', id: '' }]);
                    }
                },
                minLength: 1,
                focus: function (_, ui) {
                    if (ui.item.id) {
                        $("#kelurahan").val(ui.item.name);
                        $("#id_kelurahan").val(ui.item.id);
                    }
                    return false;
                },
                select: function (_, ui) {
                    if (ui.item.id) {
                        $("#kelurahan").val(ui.item.name);
                        $("#id_kelurahan").val(ui.item.id);
                    }
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>").append(`<div>Kelurahan: <strong>${item.name}</strong></div>`).appendTo(ul);
            };
        }

        if ($("#goldar").length) {
            $("#goldar").autocomplete({
                source: async function (request, response) {
                    if (request.term.length < 1) return;

                    LoadingInput('loading', 'goldar');

                    try {
                        const { data } = await $.ajax({
                            url: `/api/search?get_data=goldar`,
                            data: { q: request.term },
                        });

                        LoadingInput('idle', 'goldar');
                        response(data.length ? data : [{ name: 'Data tidak ditemukan', id: '' }]);
                    } catch (error) {
                        console.dir(error);
                        LoadingInput('idle', 'goldar');
                        response([{ name: 'Data tidak ditemukan', id: '' }]);
                    }
                },
                minLength: 1,
                focus: function (_, ui) {
                    if (ui.item.id) {
                        $("#goldar").val(ui.item.name);
                        $("#id_goldar").val(ui.item.id);
                    }
                    return false;
                },
                select: function (_, ui) {
                    if (ui.item.id) {
                        $("#goldar").val(ui.item.name);
                        $("#id_goldar").val(ui.item.id);
                    }
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>").append(`<div>Golongan Darah: <strong>${item.name}</strong></div>`).appendTo(ul);
            };
        }
    });
}

function TxtCheckInputSymbol($this) {
    const $invalidChars = /[<>\/'";`\\!@#$%^&*~]/g;
    let $newVal = $($this).val();

    if ($invalidChars.test($newVal)) {
        AllNotify(`Terdapat Simbol <i><strong>${$newVal}</strong></i></br> Tidak diperbolehkan!`, "error");
        $($this).val($newVal.replace($invalidChars, ""));
    }
}

function HiddenAddressDropdown() {
    $(".address_hidden").hide();

    const $fields = [];
    const addressElements = [];
    const $checkForm = $("form");
    if ($checkForm.length) {
        $checkForm.each(function () {
            const $form = $(this);

            $form.find('label').each(function () {
                const $for = $(this).attr('for');

                if ($for.includes("provinsi") || $for.includes("kabupaten") || $for.includes("kecamatan") || $for.includes("kelurahan")) {
                    $fields.push($for);
                }
            });
        })

        $fields.forEach((list, index) => {
            if (!list.includes("provinsi")) {
                addressElements.push({ id: `id_${$fields[--index]}`, container: `#container_${list}` });
            }
        })
    }

    addressElements.forEach(({ id, container }) => {
        const element = document.getElementById(id);
        if (element) {
            new MutationObserver(() => {
                if (element.value) {
                    $(container).show();
                }
            }).observe(element, { attributes: true, attributeFilter: ["value"] });
        }
    });
}

function AllNotify($msg, $section) {
    if ($section == "success") {
        Swal.fire({
            title: "Berhasil!",
            html: $msg,
            icon: "success",
            confirmButtonColor: "#3085d6",
        })
        toastr.success($msg, "Berhasil!");
    }

    if ($section == "error") {
        Swal.fire({
            title: "Kesalahan!",
            html: $msg,
            icon: "error",
            confirmButtonColor: "#3085d6",
        })
        toastr.error($msg, "Kesalahan!");
    }

    if ($section == "warning") {
        Swal.fire({
            title: "Peringatan!",
            html: $msg,
            icon: "warning",
            confirmButtonColor: "#3085d6",
        })
        toastr.warning($msg, "Peringatan!");
    }

    if ($section == "info") {
        Swal.fire({
            title: "Sekilas Info!",
            html: $msg,
            icon: "info",
            confirmButtonColor: "#3085d6",
        })
        toastr.info($msg, "Sekilas Info!");
    }
}

function LoadingNotify($msg, $section, $isElmentShow, $isContentLoader) {
    if ($section == "success") {
        toastr.success($msg, "Berhasil!");
    }

    if ($section == "error") {
        toastr.error($msg, "Kesalahan!");
    }

    if ($section == "warning") {
        toastr.warning($msg, "Peringatan!");
    }

    if ($section == "info") {
        toastr.info($msg, "Informasi!");
    }

    if ($isContentLoader) {
        if ($isElmentShow) {
            $('#loadingContetLoader').show();
        } else {
            $('#loadingContetLoader').hide();
        }
    } else {
        if ($isElmentShow) {
            $('#loadingAjax').show();
        } else {
            $('#loadingAjax').hide();
        }
    }
}

function ClassDOMInputStrict() {
    const $inputs = $(".convert_to_idr, .input_number_only, .capitalize, .text-capitalize-input, .text-check-input-symbol, .text-number-input");

    $inputs.on("input", function(e) {
        const $this = $(this);
        const value = $this.val();

        if ($this.hasClass("convert_to_idr")) {
            $this.val(new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 2}).format(value.replace(/[^0-9]/g, "")));
        }

        if ($this.hasClass("input_number_only")) {
            $this.val(value.replace(/[^0-9]/g, ""));
        }

        if ($this.hasClass("capitalize")) {
            $this.val(value.toLowerCase().replace(/\b\w/g, char => char.toUpperCase()));
        }

        if ($this.hasClass("text-capitalize-input")) {
            $this.val(value.toLowerCase().replace(/\b\w/g, char => char.toUpperCase()));
            TxtCheckInputSymbol(this);
        }

        if ($this.hasClass("text-check-input-symbol")) {
            TxtCheckInputSymbol(this);
        }

        if ($this.hasClass("text-number-input")) {
            $this.val(value.replace(/\D/g, ""));
            TxtCheckInputSymbol(this);
        }
    });
}

function ClearLocalStorage() {
    localStorage.removeItem("search_params");
}

function AutoInitListJSSearch($get = null) {
    if ($(`#list_${$get} li`).length) {
        const options = {
            valueNames: [`nama_${$get}`]
        }

        new List(`list_${$get}_wrapper`, options);
    }
}
