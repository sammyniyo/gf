<?php $__env->startComponent('mail::message'); ?>
    # Your Ticket: <?php echo e($registration->event->title); ?>


    Hi <?php echo e($registration->name); ?>,

    You're registered for **<?php echo e($registration->event->title); ?>**.

    **Date:** <?php echo e($registration->event->start_at->format('D, M j, Y g:i A')); ?>

    <?php if($registration->event->location): ?>
        **Location:** <?php echo e($registration->event->location); ?>

    <?php endif; ?>

    <?php if($registration->event->isConcert()): ?>
        **Your support amount:** <?php echo e(number_format($registration->total_amount)); ?> RWF
    <?php endif; ?>

    Scan this QR code at the entrance:

    <img src="<?php echo e($qrBase64); ?>" alt="QR Code" style="max-width:180px; display:block; margin:16px 0;">

    <?php $__env->startComponent('mail::button', ['url' => $verifyUrl]); ?>
        View / Verify Ticket
    <?php echo $__env->renderComponent(); ?>

    We also attached a **PDF ticket** and a **calendar invite (ICS)**.

    Thanks,
    **God's Family Choir**
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/mail/events/ticket.blade.php ENDPATH**/ ?>