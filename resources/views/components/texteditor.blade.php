@props(['disabled' => false, 'value' => ''])
<div class="z-0 w-full mb-2 group ">
<div id="quill-editor-{{ $attributes->get('name') }}" class="quill-editor"></div>

<textarea 
    id="{{ $attributes->get('id') }}" 
    name="{{ $attributes->get('name') }}" 
    {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge(['class' => 'hidden']) !!} {{-- Hide the textarea --}}
>
    {{ old($attributes->get('name'), $value) }}
</textarea>
</div>