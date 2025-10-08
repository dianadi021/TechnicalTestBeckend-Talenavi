@if (isset($get) && !empty($get))
    @props([
        'field' => '',
        'label' => '',
        'id' => null, // optional override
        'idHidden' => null,
        'placeholder' => null,
        'onclick' => null,
    ])

    @php
        $inputId = $id ?? $field;
        $hiddenId = $idHidden ?? "id_$field";
        $listNoAComplete = [
                'provinsi'
            ];
    @endphp

    @if ($get == 'provinsi')
        <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
            <div id="{{ $inputId }}_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input @click="open = !open" id="{{ $inputId }}" name="{{ $field }}" type="text" class="border rounded-lg w-full px-3 py-2 focus:outline-none text-sm cursor-pointer" placeholder="{{ $placeholder }}" readonly />
                    <x-text-input id="{{ $hiddenId }}" name="id_{{ $field }}" type="hidden" />
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
                        <x-autocomplete-layout type="button" class="search" type="text" placeholder="{{ $placeholder }}" />

                        <ul id="list_provinsi" class="abosolute list z-50 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-56 overflow-auto w-full position_can_fixed">
                            @if (isset($listProvinsi) && !empty($listProvinsi))
                                @foreach ($listProvinsi as $key => $list)
                                    <li @click="open = !open" class="text-nowrap text-sm px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="DropdownSelectAlpine(['{{ $list->name }}', {{ $list->id }}], '{{ $field }}')">
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

    @if (isset($get) && !empty($get) && !in_array($get, $listNoAComplete))
        <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
            <div id="{{ $inputId }}_autocomplete_container" class="relative">
                <div class="flex items-center">
                    <x-text-input @click="open = !open" id="{{ $inputId }}" name="{{ $field }}" type="text" class="border rounded-lg w-full px-3 py-2 focus:outline-none text-sm cursor-pointer" placeholder="{{ $placeholder }}" onclick="{{ $onclick }}" readonly />
                    <x-text-input id="{{ $hiddenId }}" name="id_{{ $field }}" type="hidden" />
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
                    <div id="list_{{ $field }}_wrapper">
                        <x-autocomplete-layout type="button" class="search" type="text" placeholder="{{ $placeholder }}" />

                        <ul id="list_{{ $field }}" class="abosolute list z-50 mt-1 bg-white border border-gray-300 rounded-md shadow-lg max-h-56 overflow-auto w-full position_can_fixed">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
