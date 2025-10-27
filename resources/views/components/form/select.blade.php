@props(['label', 'name', 'options' => []])
<div class="relative">
    <select name="{{ $name }}" required
        class="peer w-full border border-gray-300 rounded-lg px-4 pt-6 pb-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300 focus:scale-[1.01]">
        <option value="" disabled selected hidden>{{ $label }}</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>
    <label class="absolute left-4 top-2 text-sm text-emerald-600 transition-all">{{ $label }}</label>
</div>
