<?php
/**
 * AYACHI CASINO - Homepage
 * Professional Casino Banner with Roulette, Cards, Chips, Slots
 * Free-to-Play Casino Games
 */
$page_title = "AYACHI - Premium Casino Games";
include 'includes/header.php';
?>

    <!-- Professional Casino Banner -->
    <section class="hero-banner">
        <div class="banner-container">
            <!-- Left Side - Casino Elements -->
            <div class="banner-left">
                <!-- Roulette Wheel -->
                <div class="roulette-wheel">
                    <svg viewBox="0 0 200 200" class="wheel-svg">
                        <defs>
                            <style>
                                .wheel-segment-red { fill: #ff0000; }
                                .wheel-segment-black { fill: #000000; }
                            </style>
                        </defs>
                        <circle cx="100" cy="100" r="95" fill="none" stroke="#d4af37" stroke-width="8"/>
                        <circle cx="100" cy="100" r="85" fill="#1a1a1a"/>
                        
                        <!-- Roulette segments (simplified) -->
                        <g class="wheel-segments">
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-red"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-black" transform="rotate(45 100 100)"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-red" transform="rotate(90 100 100)"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-black" transform="rotate(135 100 100)"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-red" transform="rotate(180 100 100)"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-black" transform="rotate(225 100 100)"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-red" transform="rotate(270 100 100)"/>
                            <polygon points="100,20 110,85 100,100 90,85" class="wheel-segment-black" transform="rotate(315 100 100)"/>
                        </g>
                        
                        <!-- Center circle -->
                        <circle cx="100" cy="100" r="15" fill="#d4af37"/>
                        <circle cx="100" cy="100" r="10" fill="#1a1a1a"/>
                        
                        <!-- Pointer -->
                        <polygon points="100,15 95,30 105,30" fill="#d4af37"/>
                    </svg>
                </div>
                
                <!-- Playing Cards -->
                <div class="cards-container">
                    <div class="card spades">
                        <span class="card-suit">♠</span>
                        <span class="card-rank">A</span>
                    </div>
                    <div class="card hearts">
                        <span class="card-suit">♥</span>
                        <span class="card-rank">A</span>
                    </div>
                    <div class="card diamonds">
                        <span class="card-suit">♦</span>
                        <span class="card-rank">A</span>
                    </div>
                    <div class="card clubs">
                        <span class="card-suit">♣</span>
                        <span class="card-rank">A</span>
                    </div>
                </div>
                
                <!-- Slot Machine -->
                <div class="slot-machine">
                    <div class="slot-frame">
                        <div class="slot-reel">7</div>
                        <div class="slot-reel">7</div>
                        <div class="slot-reel">7</div>
                    </div>
                </div>
                
                <!-- Poker Chips -->
                <div class="chips-stack">
                    <div class="chip chip-red"></div>
                    <div class="chip chip-blue"></div>
                    <div class="chip chip-yellow"></div>
                    <div class="chip chip-black"></div>
                </div>
            </div>
            
            <!-- Right Side - Text Content -->
            <div class="banner-right">
                <h1 class="banner-title">AYACHI</h1>
                <p class="banner-subtitle">Experience Premium Casino Gaming</p>
                <p class="banner-description">
                    Play for fun. No real money. No registration. Just pure entertainment with realistic casino games. 
                    Start with 1000 free credits and enjoy the thrill of professional casino gameplay.
                </p>
                <div class="banner-features">
                    <span class="feature-badge">✓ Free to Play</span>
                    <span class="feature-badge">✓ No Real Money</span>
                    <span class="feature-badge">✓ No Prizes</span>
                    <span class="feature-badge">✓ Pure Entertainment</span>
                </div>
                <div class="banner-cta">
                    <a href="#games" class="btn btn-primary">PLAY FOR FREE</a>
                    <a href="#features" class="btn btn-secondary">LEARN MORE</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="section-title">Why Choose AYACHI?</h2>
            <p class="section-subtitle">Experience the best in free-to-play casino entertainment</p>
            
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
    <section id="games" class="games-section">
        <div class="container">
            <h2 class="section-title">Our Premium Games</h2>
            <p class="section-subtitle">Choose from our collection of professional casino games</p>
            
            <div class="games-grid">
                <div class="game-card">
                    <div class="game-image">🎰</div>
                    <h3>SLOTS</h3>
                    <p>Classic spinning reels with authentic casino mechanics</p>
                    <a href="/games/slots.php" class="game-btn">PLAY NOW</a>
                </div>
                
                <div class="game-card">
                    <div class="game-image">🎡</div>
                    <h3>ROULETTE</h3>
                    <p>European roulette with realistic wheel mechanics</p>
                    <a href="/games/roulette.php" class="game-btn">PLAY NOW</a>
                </div>
                
                <div class="game-card">
                    <div class="game-image">🎴</div>
                    <h3>BLACKJACK</h3>
                    <p>Classic card game with dealer AI</p>
                    <a href="/games/blackjack.php" class="game-btn">PLAY NOW</a>
                </div>
                
                <div class="game-card">
                    <div class="game-image">♠️</div>
                    <h3>POKER</h3>
                    <p>5-card draw poker with hand rankings</p>
                    <a href="/games/poker.php" class="game-btn">PLAY NOW</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Play?</h2>
            <p>Start playing now with 1000 free credits. No registration required.</p>
            <a href="#games" class="btn btn-primary btn-large">LAUNCH GAMES</a>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
