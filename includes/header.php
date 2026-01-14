<?php
/**
 * Global Header Component
 * Used across all pages in AYACHI Casino
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - AYACHI Casino' : 'AYACHI - Premium Casino Games | Play for Free'; ?></title>
    <link rel="stylesheet" href="/public/css/global.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/banner.css">
    <link rel="stylesheet" href="/public/css/games.css">
    <link rel="stylesheet" href="/public/css/game-layout.css">
    <link rel="stylesheet" href="/public/css/pages.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Montserrat:wght@400;500;600;700&family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- 18+ Age Badge -->
    <div class="age-badge">18+</div>

    <!-- Global Header -->
    <header class="global-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="/" class="logo">
                    <span class="logo-icon">AY</span>
                    <span class="logo-text">AYACHI</span>
                </a>
            </div>
            
            <nav class="global-nav">
                <a href="/" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">HOME</a>
                <a href="/#games" class="nav-link">GAMES</a>
                <a href="/#features" class="nav-link">FEATURES</a>
                <a href="/pages/contact-us.php" class="nav-link">CONTACT</a>
            </nav>

            <div class="header-cta">
                <a href="/#games" class="play-btn">PLAY NOW</a>
            </div>
        </div>
    </header>
