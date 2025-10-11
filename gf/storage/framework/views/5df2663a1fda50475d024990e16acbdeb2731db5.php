<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket - <?php echo e($registration->registration_code); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
            color: #1a202c;
            line-height: 1.6;
            padding: 20px;
        }

        .ticket-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .ticket-content {
            padding: 40px;
        }

        .ticket-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 30px;
        }

        .ticket-details h2 {
            color: #059669;
            font-size: 1.5rem;
            margin-bottom: 20px;
            border-bottom: 2px solid #d1fae5;
            padding-bottom: 10px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 12px;
            background: #f0fdf4;
            border-radius: 8px;
            border-left: 4px solid #10b981;
        }

        .detail-icon {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            color: #059669;
        }

        .detail-content {
            flex: 1;
        }

        .detail-label {
            font-size: 0.9rem;
            color: #6b7280;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-size: 1.1rem;
            color: #1f2937;
            font-weight: 600;
            margin-top: 2px;
        }

        .qr-section {
            text-align: center;
            background: #f9fafb;
            padding: 30px;
            border-radius: 12px;
            border: 2px dashed #d1d5db;
        }

        .qr-section h3 {
            color: #374151;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .qr-code {
            max-width: 200px;
            margin: 0 auto 20px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .qr-code img {
            width: 100%;
            height: auto;
        }

        .qr-instructions {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .verification-info {
            background: #fef3c7;
            border: 1px solid #f59e0b;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
        }

        .verification-info p {
            color: #92400e;
            font-size: 0.9rem;
            margin: 0;
        }

        .print-instructions {
            background: #dbeafe;
            border: 1px solid #3b82f6;
            border-radius: 8px;
            padding: 20px;
            margin-top: 30px;
            text-align: center;
        }

        .print-instructions h3 {
            color: #1e40af;
            margin-bottom: 10px;
        }

        .print-instructions p {
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .print-button {
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.2s;
        }

        .print-button:hover {
            background: #2563eb;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .ticket-container {
                box-shadow: none;
                border-radius: 0;
            }

            .print-instructions {
                display: none;
            }

            .print-button {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .ticket-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .ticket-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <!-- Header -->
        <div class="header">
            <h1>🎵 God's Family Choir</h1>
            <p>Official Event Ticket - Registration confirmed and verified</p>
        </div>

        <!-- Ticket Content -->
        <div class="ticket-content">
            <!-- God's Family Choir Details -->
            <div style="background: #eff6ff; padding: 20px; border-radius: 12px; border-left: 4px solid #3b82f6; margin-bottom: 30px;">
                <h3 style="color: #1e40af; margin: 0 0 10px 0; font-size: 1.2rem;">🏛️ About God's Family Choir</h3>
                <p style="margin: 0 0 10px 0;"><strong>ASA UR Nyarugenge SDA</strong> - Spreading God's message through music and worship</p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; font-size: 0.9rem;">
                    <div><strong>📧 Email:</strong> asa.godsfamilychoir2017@gmail.com</div>
                    <div><strong>📱 Phone:</strong> +250 783 871 782</div>
                    <div><strong>📍 Location:</strong> Kigali, Rwanda</div>
                    <div><strong>🌐 Website:</strong> godsfamilychoir.org</div>
                </div>
            </div>

            <div class="ticket-grid">
                <!-- Event Details -->
                <div class="ticket-details">
                    <h2>Event Details</h2>

                    <div class="detail-item">
                        <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <div class="detail-content">
                            <div class="detail-label">Event Name</div>
                            <div class="detail-value"><?php echo e($registration->event->title); ?> (<?php echo e(ucfirst($registration->event->type)); ?>)</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <div class="detail-content">
                            <div class="detail-label">Date & Time</div>
                            <div class="detail-value"><?php echo e($registration->event->start_at->format('l, F j, Y \a\t g:i A')); ?></div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <div class="detail-content">
                            <div class="detail-label">Location</div>
                            <div class="detail-value"><?php echo e($registration->event->location ?? 'TBA'); ?></div>
                        </div>
                    </div>

                    <h2 style="margin-top: 30px;">Registration Details</h2>

                    <div class="detail-item">
                        <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <div class="detail-content">
                            <div class="detail-label">Registered by</div>
                            <div class="detail-value"><?php echo e($registration->name); ?></div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <div class="detail-content">
                            <div class="detail-label">Ticket Code</div>
                            <div class="detail-value"><?php echo e($registration->registration_code); ?></div>
                        </div>
                    </div>

                    <?php if($registration->event->isConcert() && $registration->total_amount > 0): ?>
                    <div class="detail-item">
                        <svg class="detail-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <div class="detail-content">
                            <div class="detail-label">Support Amount</div>
                            <div class="detail-value"><?php echo e(number_format($registration->total_amount)); ?> RWF</div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- QR Code -->
                <div class="qr-section">
                    <h3>Ticket QR Code</h3>
                    <div class="qr-instructions">Scan this code at the entrance</div>

                    <div class="qr-code">
                        <?php if(!empty($qrBase64)): ?>
                            <img src="<?php echo e($qrBase64); ?>" alt="QR Code" />
                        <?php else: ?>
                            <div style="padding: 20px; color: #6b7280;">
                                <svg width="100" height="100" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 11h8V3H3v8zm2-6h4v4H5V5zm8-2v8h8V3h-8zm6 6h-4V5h4v4zM3 21h8v-8H3v8zm2-6h4v4H5v-4zm8 4h2v2h-2zm2-2h2v2h-2zm-2-2h2v2h-2zm4-2h2v2h-2zm-4 0h2v2h-2zm2-2h2v2h-2zm-2-2h2v2h-2zm4-2h2v2h-2z"/>
                                </svg>
                                <p>QR Code unavailable</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="verification-info">
                        <p><strong>Registration verified on</strong><br>
                        <?php echo e($registration->created_at->format('M j, Y g:i A')); ?></p>
                    </div>
                </div>
            </div>

            <!-- Print Instructions -->
            <div class="print-instructions">
                <h3>📄 Print Your Ticket</h3>
                <p>Click the button below to print this ticket, or use Ctrl+P (Cmd+P on Mac)</p>
                <p>Make sure to print in color for the best quality</p>
                <button class="print-button" onclick="window.print()">🖨️ Download PDF Ticket</button>
            </div>

            <!-- Footer -->
            <div style="background: #f8fafc; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb; margin-top: 30px; border-radius: 12px;">
                <p style="margin: 5px 0; color: #374151; font-weight: bold;">Thank you for supporting God's Family Choir!</p>
                <p style="margin: 5px 0; color: #6b7280; font-size: 0.9rem;">"Sing to the Lord a new song; sing to the Lord, all the earth." - Psalm 96:1</p>
                <p style="margin: 15px 0 5px 0; color: #6b7280; font-size: 0.8rem;">
                    For support, contact: asa.godsfamilychoir2017@gmail.com | +250 783 871 782
                </p>
            </div>
        </div>
    </div>

    <script>
        // Auto-print when loaded (optional)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/tickets/print.blade.php ENDPATH**/ ?>