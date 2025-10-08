@if ($section == 'datepicker')
    <x-text-input {{ $attributes->merge(['type'=> 'text', 'class' => 'block mt-1 w-full datepicker cursor-pointer']) }} readonly />
    <script>
        $(".datepicker").datetimepicker({
            timepicker: false, // Nonaktifkan pilihan waktu
            format: 'd-m-Y', // Format tanggal: Tahun-Bulan-Hari
            scrollMonth: false,
            scrollInput: false
        });
    </script>
@endif

@if ($section == 'datetimepicker')
    <x-text-input {{ $attributes->merge(['type'=> 'text', 'class' => 'block mt-1 w-full datetimepicker cursor-pointer']) }} readonly />
    <script>
        $(".datetimepicker").datetimepicker({
            format: 'd-m-Y H:i', // Format: Tahun-Bulan-Hari Jam:Menit
            step: 5, // Langkah waktu (menit)
            scrollMonth: false,
            scrollInput: false
        });
    </script>
@endif

@if ($section == 'timepicker')
    <x-text-input {{ $attributes->merge(['type'=> 'text', 'class' => 'block mt-1 w-full timepicker cursor-pointer']) }} readonly />
    <script>
        $(".timepicker").datetimepicker({
            datepicker: false, // Nonaktifkan pilihan tanggal
            format: 'H:i', // Format waktu: Jam:Menit
            step: 5, // Langkah waktu (menit)
            scrollInput: false
        });
    </script>
@endif
