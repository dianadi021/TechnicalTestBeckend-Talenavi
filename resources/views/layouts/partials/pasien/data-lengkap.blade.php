{{-- Pendaftaran Pasien --}}
<div class="w-full pt-5">
    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Data Pasien</h3>
    <div class="w-full flex gap-5 justify-between py-5">
        <div class="w-1/3">
            <table class="w-full table-no-border">
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="norm_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            No. Rekam Medis<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-text-input id="norm_pasien" class="border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="norm_pasien" required readonly />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="nik_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            NIK<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-text-input id="nik_pasien" class="input_number_only border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="nik_pasien" required />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="nama_lengkap_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-text-input id="nama_lengkap_pasien" class="text-capitalize-input border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="nama_lengkap_pasien" required />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="tempat_lahir_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Tempat Lahir<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-text-input id="tempat_lahir_pasien" class="border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="tempat_lahir_pasien" required />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="tanggal_lahir_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Lahir<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-date-time-picker-layout id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" section="datepicker"></x-date-time-picker-layout>
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="agama_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Agama<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="agama_pasien" name="agama_pasien" section="ssr-dropdown" get="list_agama" placeholder="Pilih Agama" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="suku_ras_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Suku/Ras<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="suku_ras_pasien" name="suku_ras_pasien" section="ssr-dropdown" get="list_suku_ras" placeholder="Pilih Suku/Ras" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="goldar_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Golongan Darah<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="goldar_pasien" name="goldar_pasien" section="ssr-dropdown" get="goldar" placeholder="Pilih Golongan Darah" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="pendidikan_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Pendidikan<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="pendidikan_pasien" name="pendidikan_pasien" section="ssr-dropdown" get="pendidikan" placeholder="Pilih Pendidikan" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="pekerjaan_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Pekerjaan<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="pekerjaan_pasien" name="pekerjaan_pasien" section="ssr-dropdown" get="pekerjaan" placeholder="Pilih Pekerjaan" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="status_pernikahan_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Status Pernikahan<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="status_pernikahan_pasien" name="status_pernikahan_pasien" section="ssr-dropdown" get="status_pernikahan" placeholder="Pilih Status Pernikahan" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="gender_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Kelamin<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-autocomplete-layout id="gender_pasien" name="gender_pasien" section="ssr-dropdown" get="gender" placeholder="Pilih Jenis Kelamin" />
                    </td>
                </tr>
            </table>
        </div>
        <div class="w-1/3">
            <table class="w-full table-no-border">
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="alamat_domisili_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat Domisili<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <div>
                            <div>
                                <x-text-input id="alamat_domisili_pasien" class="border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="alamat_domisili_pasien" required placeholder="Desa RT000/RW000 No. 000" />
                            </div>

                            <div>
                                <label for="provinsi_domisili_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                                    Provinsi<span class="text-red-500">*</span>
                                </label>
                                <x-input-address-layout field="provinsi_domisili_pasien" class="check_form_client_register" section="ssr-dropdown" get="provinsi" placeholder="Pilih Provinsi" />
                            </div>

                            <div id="container_kabupaten_domisili_pasien" class="address_hidden">
                                <label for="kabupaten_domisili_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kabupaten<span class="text-red-500">*</span>
                                </label>
                                <x-input-address-layout field="kabupaten_domisili_pasien" class="check_form_client_register" section="ssr-dropdown" get="kabupaten" placeholder="Pilih Kabupaten" onclick="DropdownGetLoad('kabupaten', 'provinsi_domisili_pasien', 'wilayah', '#biodata_pendaftaran_pasien_form', 'kabupaten_domisili_pasien')" />
                            </div>

                            <div id="container_kecamatan_domisili_pasien" class="address_hidden">
                                <label for="kecamatan_domisili_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kecamatan<span class="text-red-500">*</span>
                                </label>
                                <x-input-address-layout field="kecamatan_domisili_pasien" class="check_form_client_register" section="ssr-dropdown" get="kecamatan" placeholder="Pilih Kecamatan" onclick="DropdownGetLoad('kecamatan', 'kabupaten_domisili_pasien', 'wilayah', '#biodata_pendaftaran_pasien_form', 'kecamatan_domisili_pasien')" />
                            </div>

                            <div id="container_kelurahan_domisili_pasien" class="address_hidden">
                                <label for="kelurahan_domisili_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kelurahan<span class="text-red-500">*</span>
                                </label>
                                <x-input-address-layout field="kelurahan_domisili_pasien" class="check_form_client_register" section="ssr-dropdown" get="kelurahan" placeholder="Pilih Kelurahan" onclick="DropdownGetLoad('kelurahan', 'kecamatan_domisili_pasien', 'wilayah', '#biodata_pendaftaran_pasien_form', 'kelurahan_domisili_pasien')" />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="nomor_ponsel_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Ponsel<span class="text-red-500">*</span>
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <div>
                            <select id="nomor_ponsel_pasien" onchange="execFormSection('nomor_ponsel_pasien', this)" class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                                <option value="" selected disabled>Pilih Opsi</option>
                                <option value="handphone" class="optn_list_nomor_pasien">Handphone</option>
                                <option value="whatsapp" class="optn_list_nomor_pasien">Whatsapp</option>
                                <option value="telegram" class="optn_list_nomor_pasien">Telegram</option>
                            </select>
                            <div id="container_nomor_ponsel_pasien">
                                <table class="w-full table-no-border"></table>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="nik_ibu_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            NIK Ibu
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-text-input id="nik_ibu_pasien" class="input_number_only border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="nik_ibu_pasien" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="nama_ibu_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Ibu
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <x-text-input id="nama_ibu_pasien" class="text-capitalize-input border rounded-lg w-full px-3 py-2 focus:outline-none text-sm" type="text" name="nama_ibu_pasien" />
                    </td>
                </tr>
                <tr class="align-baseline text-nowrap">
                    <td>
                        <label for="nomor_identitas_lain_pasien" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Identitas Lain
                        </label>
                    </td>
                    <td>:</td>
                    <td>
                        <div>
                            <select id="nomor_identitas_lain_pasien" onchange="execFormSection('nomor_identitas_lain_pasien', this)" class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                                <option value="" selected disabled>Pilih Opsi</option>
                                <option value="passpor" class="optn_list_nomor_identitas_lain_pasien">Paspor</option>
                                <option value="sim_mobil" class="optn_list_nomor_identitas_lain_pasien">SIM Mobil</option>
                                <option value="sim_motor" class="optn_list_nomor_identitas_lain_pasien">SIIM Motor</option>
                            </select>
                            <div id="container_nomor_identitas_lain_pasien">
                                <table class="w-full table-no-border"></table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="w-1/3">
            <table class="w-full table-no-border">
            </table>
        </div>
    </div>
</div>
