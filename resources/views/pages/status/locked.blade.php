<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Restricted - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 50%, #7f1d1d 100%);
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
        .container {
            max-width: 700px;
            text-align: center;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2.5rem;
            padding: 5rem 3rem;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3), 0 10px 40px rgba(220, 38, 38, 0.2);
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
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(220, 38, 38, 0.4);
            position: relative;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 20px 60px rgba(220, 38, 38, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 25px 80px rgba(220, 38, 38, 0.6); }
        }
        .icon-bg::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: conic-gradient(from 0deg, #dc2626, #991b1b, #7f1d1d, #dc2626);
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
            animation: shake 1s ease-in-out infinite;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        h1 {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
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
            border: 2px solid rgba(220, 38, 38, 0.3);
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
    <div class="container">
        <div class="icon-wrapper">
            <div class="icon-bg">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
        </div>
        <h1>Access Restricted</h1>
        <p class="subtitle">{{ $customMessage ?? 'This page is currently locked and not available for public access.' }}</p>
        <div class="message-box">
            <div class="page-name">{{ $pageName ?? 'This Page' }}</div>
            <div class="status-info">🔒 This content is restricted at this time</div>
        </div>
    </div>
</body>
</html>
