<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Maintenance - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #059669 0%, #0d9488 50%, #0e7490 100%);
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
        .bg-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image:
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,0.1) 35px, rgba(255,255,255,0.1) 70px);
        }
        .container {
            max-width: 700px;
            text-align: center;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2.5rem;
            padding: 5rem 3rem;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3), 0 10px 40px rgba(5, 150, 105, 0.2);
            position: relative;
            z-index: 10;
            backdrop-filter: blur(20px);
            transform: perspective(1000px) rotateX(0deg);
        }
        .icon-wrapper {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 3rem;
        }
        .icon-bg {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #059669 0%, #0d9488 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(5, 150, 105, 0.4);
            position: relative;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 20px 60px rgba(5, 150, 105, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 25px 80px rgba(5, 150, 105, 0.6); }
        }
        .icon-bg::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: conic-gradient(from 0deg, #059669, #0d9488, #0891b2, #059669);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .icon-bg svg {
            width: 100px;
            height: 100px;
            color: white;
            animation: wrench 2s ease-in-out infinite;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }
        @keyframes wrench {
            0%, 100% { transform: rotate(0deg) translateY(0); }
            25% { transform: rotate(-15deg) translateY(-5px); }
            75% { transform: rotate(15deg) translateY(5px); }
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
        .message-box {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 2px solid rgba(5, 150, 105, 0.3);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-top: 2rem;
            color: #065f46;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        .message-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            animation: shine 3s infinite;
        }
        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        .page-name {
            font-size: 1.125rem;
            font-weight: 700;
            color: #047857;
            margin-bottom: 0.5rem;
        }
        .status-info {
            font-size: 0.95rem;
            color: #065f46;
        }
        .progress-bar {
            margin-top: 1.5rem;
            height: 8px;
            background: rgba(5, 150, 105, 0.2);
            border-radius: 999px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #059669, #0891b2);
            border-radius: 999px;
            animation: loading 2s ease-in-out infinite;
        }
        @keyframes loading {
            0% { width: 0%; }
            50% { width: 70%; }
            100% { width: 0%; }
        }
        .gear {
            position: absolute;
            color: rgba(255,255,255,0.1);
            font-size: 4rem;
            animation: spin 4s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @media (max-width: 768px) {
            h1 { font-size: 2.5rem; }
            .subtitle { font-size: 1.125rem; }
            .container { padding: 3rem 2rem; }
            .icon-wrapper { width: 150px; height: 150px; }
            .icon-bg svg { width: 70px; height: 70px; }
        }
    </style>
</head>
<body>
    <div class="bg-pattern"></div>
    <div class="gear" style="top: 10%; left: 10%;">⚙️</div>
    <div class="gear" style="top: 80%; right: 10%; animation-delay: -2s;">🔧</div>
    <div class="gear" style="bottom: 10%; left: 50%; animation-delay: -1s;">⚙️</div>

    <div class="container">
        <div class="icon-wrapper">
            <div class="icon-bg">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
        <h1>Under Maintenance</h1>
        <p class="subtitle">{{ $customMessage ?? 'We\'re currently performing scheduled maintenance to improve your experience. We\'ll be back shortly!' }}</p>
        <div class="message-box">
            <div class="page-name">{{ $pageName ?? 'Page' }}</div>
            <div class="status-info">⚠️ This page is temporarily unavailable while we make improvements</div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
    </div>
</body>
</html>
