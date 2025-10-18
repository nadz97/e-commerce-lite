@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'bg-inputbg rounded-md border-0 focus:ring-2 focus:ring-brand',
    ]) }}>
