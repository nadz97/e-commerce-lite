<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center justify-center px-6 py-2
                        bg-gradient-to-r from-greenStart to-greenEnd
                        text-white font-semibold text-sm uppercase tracking-widest
                        rounded shadow-popout border border-white/20
                        transition ease-in-out duration-150
                        hover:shadow-md focus:outline-none focus:ring-2 focus:ring-brand focus:ring-offset-2',
    ]) }}>
    {{ $slot }}
</button>
