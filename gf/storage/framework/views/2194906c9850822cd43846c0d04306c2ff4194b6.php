<div <?php echo e($attributes->merge(['class' => 'qr-code-container'])); ?>>
    <?php if($qrBase64): ?>
        <img src="<?php echo e($qrBase64); ?>" alt="QR Code" class="qr-code-image" width="<?php echo e($size); ?>" height="<?php echo e($size); ?>">
    <?php else: ?>
        <div class="qr-code-placeholder" style="width: <?php echo e($size); ?>px; height: <?php echo e($size); ?>px; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; color: #666;">
            QR Code<br>Unavailable
        </div>
    <?php endif; ?>
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
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/qr-code.blade.php ENDPATH**/ ?>