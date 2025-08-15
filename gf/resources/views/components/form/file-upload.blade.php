@props(['label', 'name'])
<div class="relative">
    <label class="block mb-2 text-sm text-emerald-600">{{ $label }}</label>
    <input type="file" name="{{ $name }}" accept="image/*"
        class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-emerald-100 file:text-emerald-700
        hover:file:bg-emerald-200">
    <img id="preview_{{ $name }}" class="mt-4 hidden max-w-xs rounded-lg shadow" />
</div>
<script>
    document.querySelector('input[name={{ $name }}]').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview_{{ $name }}');
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
