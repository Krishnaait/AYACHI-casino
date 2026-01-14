<?php
/**
 * AYACHI CASINO - Homepage
 * Green Casino Theme with Professional Design
 * Free-to-Play Casino Games
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYACHI - Premium Casino Games | Play for Free</title>
    <meta name="description" content="Experience premium casino games for free. Play Slots, Roulette, Blackjack, and Poker with no real money involved. Pure entertainment with realistic casino mechanics.">
    <meta name="keywords" content="casino games, free to play, slots, roulette, blackjack, poker, online casino">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Montserrat:wght@400;600;700&family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/home.css">
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <div class="logo">
                <div class="logo-icon">AY</div>
                <span>AYACHI</span>
            </div>
            <nav>
                <a href="/">HOME</a>
                <a href="#games">GAMES</a>
                <a href="#features">FEATURES</a>
                <a href="/pages/contact-us.php">CONTACT</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>WELCOME TO AYACHI</h1>
            <p>Experience the Thrill of Professional Casino Gaming</p>
            
            <p style="font-size: 1.1rem; margin-bottom: var(--spacing-lg);">
                Play for fun. No real money. No registration. Just pure entertainment with realistic casino games.
            </p>
            
            <div class="hero-badges">
                <div class="badge">✓ Free to Play</div>
                <div class="badge">✓ No Real Money</div>
                <div class="badge">✓ No Prizes</div>
                <div class="badge">✓ Pure Entertainment</div>
            </div>
            
            <div class="hero-buttons">
                <a href="#games" class="btn btn-primary btn-lg">PLAY FOR FREE</a>
                <a href="#features" class="btn btn-secondary btn-lg">LEARN MORE</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: var(--spacing-xl);">Why Choose AYACHI?</h2>
            <p style="text-align: center; color: var(--text-muted); margin-bottom: var(--spacing-2xl);">
                Experience the best in free-to-play casino entertainment
            </p>
            
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🎰</div>
                    <h3>Realistic Mechanics</h3>
                    <p>All games feature authentic casino mechanics and fair algorithms for a genuine gaming experience.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h3>Credit System</h3>
                    <p>Start with 1000 free credits. Adjust bets, play multiple games, and reset anytime.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🔊</div>
                    <h3>Sound Effects</h3>
                    <p>Immersive audio feedback with toggle-able sound. Experience authentic casino atmosphere.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <h3>No Registration</h3>
                    <p>Play instantly without any signup or login. No personal information required.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">🎁</div>
                    <h3>Free Entertainment</h3>
                    <p>Completely free to play. No real money involved. No prizes or winnings given.</p>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">📱</div>
                    <h3>Mobile Friendly</h3>
                    <p>Responsive design works perfectly on all devices - mobile, tablet, and desktop.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Games Section -->
    <section id="games" class="games">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: var(--spacing-xl);">Our Premium Games</h2>
            <p style="text-align: center; color: var(--text-muted); margin-bottom: var(--spacing-2xl);">
                Choose from our collection of professional casino games
            </p>
            
            <div class="games-grid">
                <!-- Slots Game -->
                <div class="game-card">
                    <img src="/public/images/slots-game.webp" alt="Slots Game" class="game-card-image">
                    <div class="game-card-overlay">
                        <a href="/games/slots.php" class="btn btn-primary">PLAY NOW</a>
                    </div>
                    <div class="game-card-content">
                        <h3>🎰 SLOTS</h3>
                        <p>Classic spinning reels with authentic casino mechanics</p>
                        <div class="game-badges">
                            <span class="game-badge">6 Symbols</span>
                            <span class="game-badge">Adjustable Bets</span>
                        </div>
                        <a href="/games/slots.php" class="btn btn-primary" style="width: 100%; justify-content: center;">PLAY NOW</a>
                    </div>
                </div>
                
                <!-- Roulette Game -->
                <div class="game-card">
                    <img src="/public/images/game-left(1).png" alt="Roulette Game" class="game-card-image">
                    <div class="game-card-overlay">
                        <a href="/games/roulette.php" class="btn btn-primary">PLAY NOW</a>
                    </div>
                    <div class="game-card-content">
                        <h3>🎡 ROULETTE</h3>
                        <p>European roulette with realistic wheel mechanics</p>
                        <div class="game-badges">
                            <span class="game-badge">37 Numbers</span>
                            <span class="game-badge">Multiple Bets</span>
                        </div>
                        <a href="/games/roulette.php" class="btn btn-primary" style="width: 100%; justify-content: center;">PLAY NOW</a>
                    </div>
                </div>
                
                <!-- Blackjack Game -->
                <div class="game-card">
                    <img src="/public/images/blackjack-game.webp" alt="Blackjack Game" class="game-card-image">
                    <div class="game-card-overlay">
                        <a href="/games/blackjack.php" class="btn btn-primary">PLAY NOW</a>
                    </div>
                    <div class="game-card-content">
                        <h3>🎴 BLACKJACK</h3>
                        <p>Classic card game with dealer AI</p>
                        <div class="game-badges">
                            <span class="game-badge">Hit/Stand</span>
                            <span class="game-badge">Dealer AI</span>
                        </div>
                        <a href="/games/blackjack.php" class="btn btn-primary" style="width: 100%; justify-content: center;">PLAY NOW</a>
                    </div>
                </div>
                
                <!-- Poker Game -->
                <div class="game-card">
                    <img src="/public/images/game-right.png" alt="Poker Game" class="game-card-image">
                    <div class="game-card-overlay">
                        <a href="/games/poker.php" class="btn btn-primary">PLAY NOW</a>
                    </div>
                    <div class="game-card-content">
                        <h3>♠️ POKER</h3>
                        <p>5-card draw poker with hand rankings</p>
                        <div class="game-badges">
                            <span class="game-badge">5-Card Draw</span>
                            <span class="game-badge">Hand Rankings</span>
                        </div>
                        <a href="/games/poker.php" class="btn btn-primary" style="width: 100%; justify-content: center;">PLAY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section style="background: linear-gradient(135deg, var(--primary-green), var(--deep-black)); text-align: center; padding: var(--spacing-2xl) var(--spacing-lg);">
        <div class="container">
            <h2 style="margin-bottom: var(--spacing-lg);">Ready to Play?</h2>
            <p style="margin-bottom: var(--spacing-xl); font-size: 1.1rem;">
                Start playing now with 1000 free credits. No registration required.
            </p>
            <a href="#games" class="btn btn-primary btn-lg">LAUNCH GAMES</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>AYACHI CASINO</h4>
                <p style="color: var(--text-muted); font-size: 0.9rem;">
                    Premium free-to-play casino games. Experience authentic casino entertainment without real money.
                </p>
            </div>
            
            <div class="footer-section">
                <h4>GAMES</h4>
                <ul>
                    <li><a href="/games/slots.php">Slots</a></li>
                    <li><a href="/games/roulette.php">Roulette</a></li>
                    <li><a href="/games/blackjack.php">Blackjack</a></li>
                    <li><a href="/games/poker.php">Poker</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>INFORMATION</h4>
                <ul>
                    <li><a href="/pages/about-us.php">About Us</a></li>
                    <li><a href="/pages/contact-us.php">Contact</a></li>
                    <li><a href="/pages/blog.php">Blog</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>LEGAL</h4>
                <ul>
                    <li><a href="/pages/privacy-policy.php">Privacy Policy</a></li>
                    <li><a href="/pages/terms-conditions.php">Terms & Conditions</a></li>
                    <li><a href="/pages/disclaimer.php">Disclaimer</a></li>
                    <li><a href="/pages/responsible-gaming.php">Responsible Gaming</a></li>
                    <li><a href="/pages/community-rules.php">Community Rules</a></li>
                    <li><a href="/pages/fair-policy.php">Fair Policy</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© 2026 AYACHI Healthcare Pvt. Ltd. All rights reserved.</p>
            <p>FREE TO PLAY • No Real Money • No Prizes • Entertainment Only</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/public/js/main.js"></script>
</body>
</html>
