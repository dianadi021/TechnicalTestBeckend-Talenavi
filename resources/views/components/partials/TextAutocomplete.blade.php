@if (isset($get) && !empty($get))
    @if ($section == 'jquery')
        @if ($get == 'provinsi')
            <div id="provinsi_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input
                        {{ $attributes->merge(['id' => 'provinsi', 'name' => 'provinsi', 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm']) }} />
                    <x-text-input {{ $attributes->merge(['id' => 'id_provinsi', 'name' => 'id_provinsi', 'type' => 'hidden']) }} />
                    <span id="search-icon" class="absolute right-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <span id="loading-icon" class="absolute right-3 hidden">
                        <i class="fas fa-spinner fa-spin text-gray-500"></i>
                    </span>
                </div>
            </div>
        @endif
        @if ($get == 'kabupaten')
            <div id="kabupaten_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input
                        {{ $attributes->merge(['id' => 'kabupaten', 'name' => 'kabupaten', 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm']) }} />
                    <x-text-input {{ $attributes->merge(['id' => 'id_kabupaten', 'name' => 'id_kabupaten', 'type' => 'hidden']) }} />
                    <span id="search-icon" class="absolute right-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <span id="loading-icon" class="absolute right-3 hidden">
                        <i class="fas fa-spinner fa-spin text-gray-500"></i>
                    </span>
                </div>
            </div>
        @endif
        @if ($get == 'kecamatan')
            <div id="kecamatan_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input
                        {{ $attributes->merge(['id' => 'kecamatan', 'name' => 'kecamatan', 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm']) }} />
                    <x-text-input {{ $attributes->merge(['id' => 'id_kecamatan', 'name' => 'id_kecamatan', 'type' => 'hidden']) }} />
                    <span id="search-icon" class="absolute right-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <span id="loading-icon" class="absolute right-3 hidden">
                        <i class="fas fa-spinner fa-spin text-gray-500"></i>
                    </span>
                </div>
            </div>
        @endif
        @if ($get == 'kelurahan')
            <div id="kelurahan_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input
                        {{ $attributes->merge(['id' => 'kelurahan', 'name' => 'kelurahan', 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm']) }} />
                    <x-text-input {{ $attributes->merge(['id' => 'id_kelurahan', 'name' => 'id_kelurahan', 'type' => 'hidden']) }} />
                    <span id="search-icon" class="absolute right-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <span id="loading-icon" class="absolute right-3 hidden">
                        <i class="fas fa-spinner fa-spin text-gray-500"></i>
                    </span>
                </div>
            </div>
        @endif
        @if ($get == 'goldar')
            <div id="goldar_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input
                        {{ $attributes->merge(['id' => 'goldar', 'name' => 'goldar', 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm']) }} />
                    <x-text-input {{ $attributes->merge(['id' => 'id_goldar', 'name' => 'id_goldar', 'type' => 'hidden']) }} />
                    <span id="search-icon" class="absolute right-3">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <span id="loading-icon" class="absolute right-3 hidden">
                        <i class="fas fa-spinner fa-spin text-gray-500"></i>
                    </span>
                </div>
            </div>
        @endif
    @endif

    @if ($section == 'ssr-dropdown')
        @php
            $listNoAComplete = [
                'provinsi', 'goldar', 'gender', 'unit', 'status_pendaftaran', 'jenis_kunjungan', 'perkiraan_umur', 'pendidikan', 'pekerjaan', 'status_pernikahan'
            ];
        @endphp

        @if ($get == 'provinsi')
            <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                <div id="provinsi_autocomplete_container" class="relative">
                    <div class="flex items-center">
                        <x-text-input @click="open = !open"
                            {{ $attributes->merge(['id' => 'provinsi', 'name' => 'provinsi', 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm cursor-pointer']) }} readonly />
                        <x-text-input {{ $attributes->merge(['id' => 'id_provinsi', 'name' => 'id_provinsi', 'type' => 'hidden']) }} />
                        <button type="button" @click="open = !open" class="absolute inset-y-0 right-0 flex items-center px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    style="display: none;" class="relative z-10">
                    <div class="absolute z-50 mt-1 bg-white border border-gray-300 rounded-md shadow-lg w-full">
                        <div id="list_provinsi_wrapper">
                            <x-autocomplete-layout type="button" class="search" type="text" placeholder="Cari Provinsi" />

                            <ul id="list_provinsi" class="abosolute list z-50 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-56 overflow-auto w-full position_can_fixed">
                                @if (isset($listProvinsi) && !empty($listProvinsi))
                                    @foreach ($listProvinsi as $key => $list)
                                        <li @click="open = !open" class="text-nowrap text-sm px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="DropdownSelectAlpine(['{{ $list->name }}', {{ $list->id }}], 'provinsi')">
                                            <p class="nama_provinsi">{{ $list->name }}</p>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($get == 'goldar')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listGoldar) && !empty($listGoldar))
                    @foreach ($listGoldar as $key => $list)
                        <option value="{{ $list->name }}">{{ $list->name }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'gender')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listGender) && !empty($listGender))
                    @foreach ($listGender as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'perkiraan_umur')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listPerkiraanUmur) && !empty($listPerkiraanUmur))
                    @foreach ($listPerkiraanUmur as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'unit')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listUnit) && !empty($listUnit))
                    @foreach ($listUnit as $key => $list)
                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'status_pendaftaran')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listStatusPendaftaran) && !empty($listStatusPendaftaran))
                    @foreach ($listStatusPendaftaran as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'jenis_kunjungan')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($jenisKunjungan) && !empty($jenisKunjungan))
                    @foreach ($jenisKunjungan as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'perkiraan_umur')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listPerkiraanUmur) && !empty($listPerkiraanUmur))
                    @foreach ($listPerkiraanUmur as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'pendidikan')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listPendidikan) && !empty($listPendidikan))
                    @foreach ($listPendidikan as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'pekerjaan')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listPekerjaan) && !empty($listPekerjaan))
                    @foreach ($listPekerjaan as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if ($get == 'status_pernikahan')
            <select {{ $attributes->merge([]) }} class="w-full px-4 py-2 border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 rounded-md shadow-sm bg-white text-gray-700 hover:bg-gray-100 transition-all duration-200">
                <option value="" selected disabled>Pilih Opsi</option>
                @if (isset($listStatusPernikahan) && !empty($listStatusPernikahan))
                    @foreach ($listStatusPernikahan as $key => $list)
                        <option value="{{ $list }}">{{ $list }}</option>
                    @endforeach
                @endif
            </select>
        @endif

        @if (isset($get) && !empty($get) && !in_array($get, $listNoAComplete))
            @php
                $idGet = "id_$get";
            @endphp

            <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                <div id="{{ $get }}_autocomplete_container" class="relative">
                    <div class="flex items-center">
                        <x-text-input @click="open = !open"
                            {{ $attributes->merge(['id' => $get, 'name' => $get, 'type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm cursor-pointer']) }} readonly />
                        <x-text-input {{ $attributes->merge(['id' => $idGet, 'name' => $idGet, 'type' => 'hidden']) }} />
                        <button type="button" @click="open = !open" class="absolute inset-y-0 right-0 flex items-center px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    style="display: none;" class="relative z-10">
                    <div class="absolute z-50 mt-1 bg-white border border-gray-300 rounded-md shadow-lg w-full">
                        <div id="list_{{ $get }}_wrapper">
                            <x-autocomplete-layout type="button" class="search" type="text" placeholder="Cari {{ $get }}" />

                            <ul id="list_{{ $get }}" class="abosolute list z-50 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-56 overflow-auto w-full position_can_fixed">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endif

@if (empty($section) && empty($get))
    <div id="autocomplete_search_container" class="relative">
        <div class="flex items-center">
            <x-text-input
                {{ $attributes->merge(['type' => 'text', 'class' => 'border rounded-lg w-full px-3 py-2 focus:outline-none text-sm']) }} />
            <span id="search-icon" class="absolute right-3">
                <i class="fas fa-search text-gray-500"></i>
            </span>
            <span id="loading-icon" class="absolute right-3 hidden">
                <i class="fas fa-spinner fa-spin text-gray-500"></i>
            </span>
        </div>
    </div>
@endif
