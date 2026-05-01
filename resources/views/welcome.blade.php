<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NdarMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --sen-navy: #0b2240;
            --sen-gold: #bea173;
        }
        body {
            margin: 0;
            background: 
                radial-gradient(circle at 15% 85%, rgba(190, 161, 115, 0.25) 0%, transparent 40%),
                radial-gradient(circle at 85% 15%, rgba(11, 34, 64, 0.2) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(190, 161, 115, 0.08) 0%, transparent 60%),
                linear-gradient(135deg, #ffffff 0%, #fffaf4 30%, #fef8f0 70%, #f5f0e8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 25% 25%, rgba(190, 161, 115, 0.1) 0%, transparent 30%),
                radial-gradient(circle at 75% 75%, rgba(11, 34, 64, 0.08) 0%, transparent 35%);
            animation: float 20s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.1); }
        }
        .main-container {
            text-align: center;
            padding: 2rem;
            animation: fadeInUp 0.8s ease-out;
            position: relative;
            z-index: 10;
        }
        .floating-element {
            position: absolute;
            border-radius: 50%;
            opacity: 0.6;
            animation: float-around 15s ease-in-out infinite;
        }
        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(190, 161, 115, 0.3), transparent);
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, rgba(11, 34, 64, 0.25), transparent);
            top: 20%;
            right: 15%;
            animation-delay: 3s;
        }
        .floating-element:nth-child(3) {
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(190, 161, 115, 0.2), transparent);
            bottom: 15%;
            left: 20%;
            animation-delay: 6s;
        }
        .floating-element:nth-child(4) {
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, rgba(11, 34, 64, 0.3), transparent);
            bottom: 25%;
            right: 10%;
            animation-delay: 9s;
        }
        @keyframes float-around {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, -30px) rotate(90deg); }
            50% { transform: translate(-20px, 20px) rotate(180deg); }
            75% { transform: translate(-30px, -10px) rotate(270deg); }
        }
        .logo-container {
            margin-bottom: 2rem;
            position: relative;
        }
        .logo-only {
            text-align: center;
        }
        .logo-image {
            width: 200px !important;
            height: 200px !important;
            object-fit: contain;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(11, 34, 64, 0.15);
            transition: transform 0.3s ease;
        }
        .logo-image:hover {
            transform: scale(1.05);
        }
        .slogan-container {
            margin: 3rem 0;
        }
        .slogan-text {
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .slogan-sen {
            color: var(--sen-navy);
        }
        .slogan-market {
            color: var(--sen-gold);
        }
        .next-container {
            margin-top: 4rem;
        }
        .next-link {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--sen-navy);
            font-weight: 700;
            font-size: 1.2rem;
            padding: 16px 32px;
            border: 2px solid var(--sen-navy);
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(11, 34, 64, 0.15);
        }
        .next-link:hover {
            background: var(--sen-navy);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(11, 34, 64, 0.25);
        }
        .arrow {
            width: 0;
            height: 0;
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent;
            border-left: 12px solid currentColor;
            transition: transform 0.3s ease;
        }
        .next-link:hover .arrow {
            transform: translateX(4px);
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            .logo-image {
                width: 120px !important;
                height: 120px !important;
            }
            .slogan-text {
                font-size: 1.2rem;
                line-height: 1.4;
            }
            .next-link {
                font-size: 1rem;
                padding: 12px 24px;
            }
            .floating-element {
                opacity: 0.3;
            }
        }
        @media (max-width: 480px) {
            .main-container {
                padding: 0.5rem;
            }
            .logo-image {
                width: 100px !important;
                height: 100px !important;
            }
            .slogan-text {
                font-size: 1rem;
                line-height: 1.3;
            }
            .next-link {
                font-size: 0.9rem;
                padding: 10px 20px;
            }
            .slogan-container {
                margin: 2rem 0;
            }
            .next-container {
                margin-top: 2rem;
            }
            .floating-element {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    
    <div class="main-container">
        <div class="logo-container logo-large">
            <div class="logo-only">
                <img src="{{ asset('images/ndarmarket-logo.png') }}" alt="Logo NdarMarket" class="logo-image">
            </div>
        </div>
        
        <div class="slogan-container">
            <div class="slogan-text">
                <span class="slogan-sen">Votre marché,</span>
                <span class="slogan-market"> toujours plus proche</span>
            </div>
        </div>
        
        <div class="next-container">
            <a href="{{ route('accueil') }}" class="next-link">
                <span>Next</span>
                <div class="arrow"></div>
            </a>
        </div>
    </div>
</body>
</html>
