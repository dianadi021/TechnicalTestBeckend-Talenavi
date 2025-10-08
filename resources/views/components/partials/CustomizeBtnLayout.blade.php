@if ($section == 'primary')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
@if ($section == 'success')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-success border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-success focus:bg-success active:bg-success focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
@if ($section == 'info')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-info border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-info focus:bg-info active:bg-info focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
@if ($section == 'warning')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-warning border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-warning focus:bg-warning active:bg-warning focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
@if ($section == 'danger')
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-danger border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-danger focus:bg-danger active:bg-danger focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
