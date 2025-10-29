<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($settings->coming_soon_title ?? 'Coming Soon'); ?> - <?php echo e(config('app.name')); ?></title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #059669 0%, #0d9488 50%, #0891b2 100%);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            overflow: hidden;
            position: relative;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 2s infinite;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 1; }
        }
        .container {
            max-width: 800px;
            text-align: center;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2.5rem;
            padding: 4rem 3rem;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3), 0 10px 40px rgba(5, 150, 105, 0.2);
            position: relative;
            z-index: 10;
            backdrop-filter: blur(20px);
        }
        .icon-wrapper {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 2rem;
        }
        .icon-bg {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #059669 0%, #0891b2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 4s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(5, 150, 105, 0.4);
            position: relative;
        }
        .icon-bg::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(135deg, #059669, #0891b2, #0d9488);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 4s linear infinite;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }
        .icon svg {
            width: 90px;
            height: 90px;
            color: white;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }
        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #059669 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
        }
        .subtitle {
            font-size: 1.25rem;
            color: #64748b;
            margin-bottom: 2rem;
            font-weight: 500;
            line-height: 1.6;
        }
        .countdown {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 3rem 0;
            flex-wrap: wrap;
        }
        .countdown-item {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 2px solid rgba(5, 150, 105, 0.3);
            border-radius: 1.5rem;
            padding: 1.5rem 1rem;
            min-width: 100px;
        }
        .countdown-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #059669 0%, #0891b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .countdown-label {
            font-size: 0.875rem;
            color: #047857;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 0.5rem;
        }
        .message-box {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 2px solid rgba(5, 150, 105, 0.3);
            border-radius: 1.5rem;
            padding: 2rem;
            color: #065f46;
            margin-top: 2rem;
        }
        .rocket-trail {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            border: 2px solid rgba(5, 150, 105, 0.3);
            border-radius: 50%;
            animation: expand 3s ease-out infinite;
        }
        @keyframes expand {
            0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(2); opacity: 0; }
        }
        @media (max-width: 768px) {
            h1 { font-size: 2.5rem; }
            .subtitle { font-size: 1.125rem; }
            .container { padding: 3rem 2rem; }
            .icon-wrapper { width: 150px; height: 150px; }
            .icon-bg svg { width: 70px; height: 70px; }
            .countdown { gap: 1rem; }
            .countdown-item { min-width: 80px; padding: 1rem 0.5rem; }
            .countdown-number { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <div class="stars"></div>
    <div class="container">
        <div class="icon-wrapper">
            <div class="rocket-trail"></div>
            <div class="icon-bg">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>
        </div>
        <h1><?php echo e($settings->coming_soon_title ?? 'Coming Soon!'); ?></h1>
        <p class="subtitle"><?php echo e($settings->coming_soon_message ?? 'We are working hard to bring you something amazing. Stay tuned for an incredible experience!'); ?></p>

        <!-- Countdown Timer -->
        <div class="countdown" id="countdown">
            <div class="countdown-item">
                <div class="countdown-number" id="days">0</div>
                <div class="countdown-label">Days</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="hours">0</div>
                <div class="countdown-label">Hours</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="minutes">0</div>
                <div class="countdown-label">Minutes</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-number" id="seconds">0</div>
                <div class="countdown-label">Seconds</div>
            </div>
        </div>

        <?php if($settings->contact_email): ?>
        <div class="message-box">
            <p>Questions? Contact us at <a href="mailto:<?php echo e($settings->contact_email); ?>" class="font-semibold text-emerald-600 hover:text-emerald-700"><?php echo e($settings->contact_email); ?></a></p>
        </div>
        <?php endif; ?>
    </div>
    <script>
        // Target date - Next Thursday
        function getNextThursday() {
            const now = new Date();
            const dayOfWeek = now.getDay(); // 0 = Sunday, 4 = Thursday
            const daysUntilThursday = (4 - dayOfWeek + 7) % 7 || 7;
            const nextThursday = new Date(now);
            nextThursday.setDate(now.getDate() + daysUntilThursday);
            nextThursday.setHours(0, 0, 0, 0);
            return nextThursday;
        }

        // Use target_date if set, otherwise use next Thursday
        const targetDate = <?php echo json_encode($settings->target_date ? $settings->target_date->format('Y-m-d') : null, 15, 512) ?>;
        let launchDate;

        if (targetDate) {
            launchDate = new Date(targetDate + 'T23:59:59');
        } else {
            launchDate = getNextThursday();
        }

        // Debug: log the launch date
        console.log('Launch date:', launchDate);
        console.log('Target date:', targetDate);

        function updateCountdown() {
            const now = new Date();
            const diff = launchDate - now;

            // Check if launchDate is valid
            if (isNaN(launchDate.getTime())) {
                console.error('Invalid launch date:', launchDate);
                document.getElementById('days').textContent = '0';
                document.getElementById('hours').textContent = '0';
                document.getElementById('minutes').textContent = '0';
                document.getElementById('seconds').textContent = '0';
                return;
            }

            if (diff <= 0) {
                document.getElementById('days').textContent = '0';
                document.getElementById('hours').textContent = '0';
                document.getElementById('minutes').textContent = '0';
                document.getElementById('seconds').textContent = '0';
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
        }

        // Create stars
        for (let i = 0; i < 50; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.width = star.style.height = Math.random() * 3 + 1 + 'px';
            star.style.animationDelay = Math.random() * 2 + 's';
            star.style.animationDuration = (Math.random() * 2 + 1) + 's';
            document.querySelector('.stars').appendChild(star);
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>

<?php /**PATH /Users/user/Documents/gf-1/resources/views/pages/site-coming-soon.blade.php ENDPATH**/ ?>