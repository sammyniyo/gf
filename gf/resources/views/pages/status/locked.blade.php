<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Locked - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 50%, #b91c1c 100%);
            background-size: 400% 400%;
            animation: gradient 12s ease infinite;
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
        .shimmer {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        .container {
            max-width: 700px;
            text-align: center;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2.5rem;
            padding: 5rem 3rem;
            box-shadow: 0 30px 80px rgba(0,0,0,0.4), 0 10px 40px rgba(239, 68, 68, 0.3);
            position: relative;
            z-index: 10;
            backdrop-filter: blur(20px);
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
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: lock 2s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(239, 68, 68, 0.5);
            position: relative;
        }
        .icon-bg::after {
            content: '';
            position: absolute;
            inset: -5px;
            border-radius: 50%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: spin 3s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes lock {
            0%, 100% { transform: scale(1) rotate(0deg); }
            25% { transform: scale(0.95) rotate(-5deg); }
            75% { transform: scale(0.95) rotate(5deg); }
        }
        .icon svg {
            width: 100px;
            height: 100px;
            color: white;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
            animation: shake 0.5s ease-in-out infinite;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(-3px); }
        }
        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
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
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 2px solid rgba(239, 68, 68, 0.3);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-top: 2rem;
            color: #991b1b;
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
            color: #dc2626;
            margin-bottom: 0.5rem;
        }
        .status-info {
            font-size: 0.95rem;
            color: #991b1b;
        }
        .security-note {
            margin-top: 1.5rem;
            padding: 1rem;
            background: rgba(239, 68, 68, 0.1);
            border-radius: 1rem;
            font-size: 0.875rem;
            color: #b91c1c;
        }
        .lock-rings {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .ring {
            position: absolute;
            border: 2px solid rgba(239, 68, 68, 0.3);
            border-radius: 50%;
            animation: expand-ring 2s ease-out infinite;
        }
        @keyframes expand-ring {
            0% { width: 200px; height: 200px; opacity: 0.8; transform: translate(-50%, -50%) scale(0.5); }
            100% { width: 400px; height: 400px; opacity: 0; transform: translate(-50%, -50%) scale(1); }
        }
        @media (max-width: 768px) {
            h1 { font-size: 2.5rem; }
            .subtitle { font-size: 1.125rem; }
            .container { padding: 3rem 2rem; }
            .icon-wrapper { width: 150px; height: 150px; }
            .icon svg { width: 70px; height: 70px; }
        }
    </style>
</head>
<body>
    <div class="shimmer"></div>
    <div class="lock-rings">
        <div class="ring" style="animation-delay: 0s;"></div>
        <div class="ring" style="animation-delay: 0.5s;"></div>
        <div class="ring" style="animation-delay: 1s;"></div>
    </div>
    <div class="container">
        <div class="icon-wrapper">
            <div class="icon-bg">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
        </div>
        <h1>Page Locked</h1>
        <p class="subtitle">{{ $customMessage ?? 'This page is currently locked and unavailable. Access has been restricted for the time being.' }}</p>
        <div class="message-box">
            <div class="page-name">🔒 {{ $pageName }}</div>
            <div class="status-info">Access to this page is currently restricted</div>
            <div class="security-note">
                ℹ️ This page is locked for your protection. Please check back later or contact support if you need immediate assistance.
            </div>
        </div>
    </div>
</body>
</html>
