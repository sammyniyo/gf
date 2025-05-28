@props(['label', 'name', 'rows' => 5])
<div class="relative">
    <textarea name="{{ $name }}" rows="{{ $rows }}" required
        class="peer w-full border border-gray-300 rounded-lg px-4 pt-6 pb-2 text-gray-800 placeholder-transparent focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-all duration-300 focus:scale-[1.01]"
        placeholder="{{ $label }}"></textarea>
    <label
        class="absolute left-4 top-2 text-sm text-emerald-600 peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 transition-all">{{ $label }}</label>
</div>
