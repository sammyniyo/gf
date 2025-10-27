<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
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
            max-width: 700px;
            text-align: center;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2.5rem;
            padding: 5rem 3rem;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3), 0 10px 40px rgba(102, 126, 234, 0.2);
            position: relative;
            z-index: 10;
            backdrop-filter: blur(20px);
        }
        .icon-wrapper {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 3rem;
        }
        .icon-bg {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 4s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
            position: relative;
        }
        .icon-bg::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-top: 2rem;
            color: #475569;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: shine 3s infinite;
        }
        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        .page-name {
            font-size: 1.125rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 0.5rem;
            display: inline-block;
        }
        .check-back {
            font-size: 0.95rem;
            color: #64748b;
        }
        .sparkle {
            position: absolute;
            color: #667eea;
            font-size: 2rem;
            animation: sparkle 2s ease-in-out infinite;
        }
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }
        .rocket-trail {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            animation: expand 3s ease-out infinite;
        }
        @keyframes expand {
            0% { transform: translate(-50%, -50%) scale(0); opacity: 1; }
            100% { transform: translate(-50%, -50%) scale(2); opacity: 0; }
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
        <h1>Coming Soon!</h1>
        <p class="subtitle">{{ $customMessage ?? 'We are working hard to bring you something amazing. Stay tuned for an incredible experience!' }}</p>
        <div class="message-box">
            <div class="page-name">{{ $pageName }}</div>
            <div class="check-back">This page will launch soon. We're putting the finishing touches!</div>
        </div>
    </div>
    <script>
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
    </script>
</body>
</html>

