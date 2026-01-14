<?php
/**
 * JACKPOO CASINO - Homepage
 * Luxury Casino Theme with Professional Design
 * HTML, CSS, PHP with Vanilla JavaScript
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AYACHI - Premium Casino Games | Play for Free</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Montserrat:wght@400;500;600;700&family=Cinzel:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <div class="logo-icon">AY</div>
                <span class="logo-text">AYACHI</span>
            </div>
            <nav class="nav">
                <a href="#home" class="nav-link">HOME</a>
                <a href="#games" class="nav-link">GAMES</a>
                <a href="#features" class="nav-link">FEATURES</a>
                <a href="#contact" class="nav-link">CONTACT</a>
            </nav>
            <button class="btn btn-primary btn-header">PLAY NOW</button>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="hero-background">
            <img src="public/images/hero-banner.webp" alt="Luxury Casino" class="hero-image">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">WELCOME TO AYACHI</h1>
                <p class="hero-subtitle">Experience the Thrill of Professional Casino Gaming</p>
                <p class="hero-description">Play for fun. No real money. No registration. Just pure entertainment with realistic casino games.</p>
                <div class="hero-features">
                    <span class="feature-badge">✓ Free to Play</span>
                    <span class="feature-badge">✓ No Real Money</span>
                    <span class="feature-badge">✓ No Prizes</span>
                    <span class="feature-badge">✓ Pure Entertainment</span>
                </div>
                <div class="hero-buttons">
                    <a href="#games" class="btn btn-primary btn-lg">PLAY FOR FREE</a>
                    <a href="#features" class="btn btn-secondary btn-lg">LEARN MORE</a>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE SECTION -->
    <section class="why-choose">
        <div class="container">
            <h2 class="section-title">Why Choose AYACHI?</h2>
            <p class="section-subtitle">Experience the best in free-to-play casino entertainment</p>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Instant Play</h3>
                    <p>No downloads, no registration. Play instantly in your browser.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎮</div>
                    <h3>Free to Play</h3>
                    <p>Enjoy all games without spending real money. Pure entertainment.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3>Realistic Games</h3>
                    <p>Professional casino-quality games with authentic gameplay mechanics.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Fair & Transparent</h3>
                    <p>All games use fair algorithms. No hidden mechanics or surprises.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Responsive Design</h3>
                    <p>Play on any device - desktop, tablet, or mobile. Same great experience.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔊</div>
                    <h3>Immersive Audio</h3>
                    <p>Realistic sound effects and audio feedback for authentic casino feel.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- GAMES SECTION -->
    <section class="games-section" id="games">
        <div class="container">
            <h2 class="section-title">Our Premium Games</h2>
            <p class="section-subtitle">Choose from our collection of professional casino games</p>
            
            <div class="games-grid">
                <!-- SLOTS -->
                <div class="game-card">
                    <div class="game-image">
                        <img src="public/images/slots-game.webp" alt="Slots Machine">
                        <div class="game-overlay">
                            <a href="games/slots.php" class="btn btn-primary">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-info">
                        <h3>🎰 SLOTS</h3>
                        <p>Classic slot machines with realistic spinning reels and authentic payouts.</p>
                        <div class="game-features">
                            <span>6 Symbols</span>
                            <span>Adjustable Bets</span>
                            <span>High Payouts</span>
                        </div>
                    </div>
                </div>

                <!-- ROULETTE -->
                <div class="game-card">
                    <div class="game-image">
                        <img src="public/images/game-left(1).png" alt="Roulette Wheel">
                        <div class="game-overlay">
                            <a href="games/roulette.php" class="btn btn-primary">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-info">
                        <h3>🎡 ROULETTE</h3>
                        <p>European roulette with multiple betting options and animated wheel spins.</p>
                        <div class="game-features">
                            <span>37 Numbers</span>
                            <span>Color Betting</span>
                            <span>36:1 Payouts</span>
                        </div>
                    </div>
                </div>

                <!-- BLACKJACK -->
                <div class="game-card">
                    <div class="game-image">
                        <img src="public/images/blackjack-game.webp" alt="Blackjack Table">
                        <div class="game-overlay">
                            <a href="games/blackjack.php" class="btn btn-primary">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-info">
                        <h3>🎴 BLACKJACK</h3>
                        <p>Classic card game with dealer AI and professional gameplay mechanics.</p>
                        <div class="game-features">
                            <span>Hit/Stand</span>
                            <span>Dealer AI</span>
                            <span>2:1 Payouts</span>
                        </div>
                    </div>
                </div>

                <!-- POKER -->
                <div class="game-card">
                    <div class="game-image">
                        <img src="public/images/game-right.png" alt="Poker Game">
                        <div class="game-overlay">
                            <a href="games/poker.php" class="btn btn-primary">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-info">
                        <h3>♠️ POKER</h3>
                        <p>5-card draw poker with hand rankings and strategic gameplay.</p>
                        <div class="game-features">
                            <span>Hand Rankings</span>
                            <span>Card Drawing</span>
                            <span>Dealer Comparison</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="section-title">Game Features</h2>
            <p class="section-subtitle">What makes our games special</p>
            
            <div class="features-list">
                <div class="feature-item">
                    <div class="feature-number">01</div>
                    <div class="feature-details">
                        <h3>Realistic Mechanics</h3>
                        <p>All games feature authentic casino mechanics and fair algorithms for a genuine gaming experience.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-number">02</div>
                    <div class="feature-details">
                        <h3>Credit System</h3>
                        <p>Start with 1000 free credits. Adjust bets, play multiple games, and reset anytime.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-number">03</div>
                    <div class="feature-details">
                        <h3>Sound Effects</h3>
                        <p>Immersive audio feedback with toggle-able sound. Experience authentic casino atmosphere.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-number">04</div>
                    <div class="feature-details">
                        <h3>No Registration</h3>
                        <p>Play instantly without any signup or login. No personal information required.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-number">05</div>
                    <div class="feature-details">
                        <h3>Free Entertainment</h3>
                        <p>Completely free to play. No real money involved. No prizes or winnings given.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-number">06</div>
                    <div class="feature-details">
                        <h3>Mobile Friendly</h3>
                        <p>Responsive design works perfectly on all devices - mobile, tablet, and desktop.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Play?</h2>
                <p>Start playing now with 1000 free credits. No registration required.</p>
                <a href="#games" class="btn btn-primary btn-lg">LAUNCH GAMES</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="games/slots.php">Slots</a></li>
                        <li><a href="games/roulette.php">Roulette</a></li>
                        <li><a href="games/blackjack.php">Blackjack</a></li>
                        <li><a href="games/poker.php">Poker</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#blog">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#privacy">Privacy Policy</a></li>
                        <li><a href="#terms">Terms & Conditions</a></li>
                        <li><a href="#disclaimer">Disclaimer</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Jackpoo</h4>
                    <p>Premium free-to-play casino games for entertainment only.</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 AYACHI Healthcare Pvt. Ltd. All rights reserved.</p>
                <p><strong>FREE TO PLAY</strong> • No Real Money • No Prizes • Entertainment Only</p>
            </div>
        </div>
    </footer>

    <script src="public/js/main.js"></script>
</body>
</html>
