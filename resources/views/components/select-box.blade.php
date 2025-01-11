@props(['disabled' => false, 'options' => [], 'placeholder' => null, 'selected' => null])

<div>
    <select 
        @disabled($disabled) 
        {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block w-full']) }}
    >
        @if($placeholder)
            <!-- Display placeholder when no value is selected -->
            <option value="" {{ empty($selected) ? 'selected' : '' }}>{{ $placeholder }}</option>
        @endif

        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>
