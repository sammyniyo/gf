<div {{ $attributes->merge(['class' => 'qr-code-container']) }}>
    @if($qrBase64)
        <img src="{{ $qrBase64 }}" alt="QR Code" class="qr-code-image" width="{{ $size }}" height="{{ $size }}">
    @else
        <div class="qr-code-placeholder" style="width: {{ $size }}px; height: {{ $size }}px; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; color: #666;">
            QR Code<br>Unavailable
        </div>
    @endif
</div>

<style>
.qr-code-container {
    display: inline-block;
}

.qr-code-image {
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.qr-code-placeholder {
    border-radius: 8px;
    font-size: 12px;
    text-align: center;
    background-color: #f9f9f9;
}
</style>
