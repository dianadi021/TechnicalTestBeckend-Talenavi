<x-card-box-shadow-layout>
    <form id="registerForm" onsubmit="submitForm('registerForm')" class="max-h-screen overflow-auto">
        @csrf
        <input type="hidden" name="token" class="csrf-token" />

        <div id="clientRegist">
            <div>
                <label for="klinik_name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Klinik<span class="text-red-500">*</span>
                </label>
                <x-text-input id="klinik_name" class="block mt-1 w-full check_form_client_register" type="text" name="klinik_name" />
                <ul class="hide_notif text-sm text-red-600 space-y-1 mt-2" id="err_klinik_name">
                    <li></li>
                </ul>
            </div>

            <div>
                <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Provinsi<span class="text-red-500">*</span>
                </label>
                <x-autocomplete-layout class="check_form_client_register" section="ssr-dropdown" get="provinsi" placeholder="Pilih Provinsi" />
            </div>

            <div id="container_kabupaten" class="address_hidden">
                <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-2">
                    Kabupaten<span class="text-red-500">*</span>
                </label>
                <x-autocomplete-layout class="check_form_client_register" section="ssr-dropdown" get="kabupaten" placeholder="Pilih Kabupaten" onclick="DropdownGetLoad('kabupaten', 'provinsi', 'wilayah', '#registerForm')" />
            </div>

            <div id="container_kecamatan" class="address_hidden">
                <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                    Kecamatan<span class="text-red-500">*</span>
                </label>
                <x-autocomplete-layout class="check_form_client_register" section="ssr-dropdown" get="kecamatan" placeholder="Pilih Kecamatan" onclick="DropdownGetLoad('kecamatan', 'kabupaten', 'wilayah', '#registerForm')" />
            </div>

            <div id="container_kelurahan" class="address_hidden">
                <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">
                    Kelurahan<span class="text-red-500">*</span>
                </label>
                <x-autocomplete-layout class="check_form_client_register" section="ssr-dropdown" get="kelurahan" placeholder="Pilih Kelurahan" onclick="DropdownGetLoad('kelurahan', 'kecamatan', 'wilayah', '#registerForm')" />
            </div>
        </div>

        <div id="userRegist">
            <div>
                <label for="nik_user" class="block text-sm font-medium text-gray-700 mb-2">
                    NIK<span class="text-red-500">*</span>
                </label>
                <x-text-input type="text" id="nik_user" name="nik_user" class="block mt-1 w-full text-number-input" inputmode="numeric" pattern="[0-9]*" :value="old('nik_user')" required />
                <x-input-error :messages="$errors->get('nik_user')" class="mt-2" />
            </div>

            <div>
                <label for="fullname_user" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap<span class="text-red-500">*</span>
                </label>
                <x-text-input id="fullname_user" class="block mt-1 w-full text-capitalize-input" type="text" name="fullname_user" :value="old('fullname_user')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('fullname_user')" class="mt-2" />
            </div>

            <div>
                <label for="gender_user" class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Kelamin<span class="text-red-500">*</span>
                </label>
                <x-autocomplete-layout id="gender_user" name="gender_user" section="ssr-dropdown" get="gender" placeholder="Pilih Jenis Kelamin" />
                <x-input-error :messages="$errors->get('gender_user')" class="mt-2" />
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                    Username<span class="text-red-500">*</span>
                </label>
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email<span class="text-red-500">*</span>
                </label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password<span class="text-red-500">*</span>
                </label>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm Password<span class="text-red-500">*</span>
                </label>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <p class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer" onclick="openSection('loginSection')">
                {{ __('Sudah terdaftar?') }}
            </p>

            <x-btn-customize-layout id="nextRegist" section="success" class="ms-4" onclick="registSection('userRegist')">
                {{ __('Lanjutkan') }}
            </x-btn-customize-layout>

            <x-secondary-button class="submitRegistSection ms-4" onclick="registSection('clientRegist')">
                {{ __('Kembali') }}
            </x-secondary-button>

            <x-btn-customize-layout class="submitRegistSection ms-4" section="success">
                {{ __('Simpan') }}
            </x-btn-customize-layout>
        </div>
    </form>

    <script>
        $(document).ready(async function() {
            $("#userRegist").hide();
            $(".submitRegistSection").hide();
        });

        // FUNCTION ON CLICK ON CLICK START
        function registSection($sections) {
            if ($sections == 'clientRegist') {
                $(".submitRegistSection").hide();
                $("#userRegist").hide();
                $("#nextRegist").show();
                $("#clientRegist").show();
            }

            if ($sections == 'userRegist') {
                let isFilled = false;
                $(".check_form_client_register").each(function () {
                    if ($(this).css('display') == 'block') {
                        if (!IsValidVal($(this).val())) {
                            $(this).focus();
                            const $txtLabel = $(this).siblings("label").first().text().replace("*", "").trim();
                            AllNotify(`Inputan ${$txtLabel} harus diisi!`, "error");


                            isFilled = false;
                            return false;
                        }
                    } else {
                        isFilled = true;
                        return true;
                    }
                })

                if (isFilled) {
                    $("#nextRegist").hide();
                    $("#clientRegist").hide();
                    $("#userRegist").show();
                    $(".submitRegistSection").show();
                }
            }
        }
        // FUNCTION ON CLICK ON CLICK END
    </script>

    <style>
        .position_can_fixed {
            position: fixed !important;
        }
    </style>
</x-card-box-shadow-layout>
