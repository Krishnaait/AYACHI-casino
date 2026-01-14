<?php
$page_title = "AYACHI - Premium Casino Games | Play for Free";
include 'includes/header.php';
?>

<style>
    .hero-banner {
        background-image: url('/public/images/casino-banner.webp');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 80px 20px;
        min-height: 700px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-banner::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(11, 83, 69, 0.4);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        text-align: center;
        color: white;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 900;
        color: #d4af37;
        margin-bottom: 15px;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
        letter-spacing: 2px;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: #ffffff;
        margin-bottom: 20px;
        font-weight: 300;
        letter-spacing: 1px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .hero-description {
        font-size: 1.05rem;
        color: #e0e0e0;
        margin-bottom: 30px;
        line-height: 1.8;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
    }

    .hero-features {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 35px;
        justify-content: center;
    }

    .feature-badge {
        background: rgba(212, 175, 55, 0.25);
        border: 1px solid #d4af37;
        color: #d4af37;
        padding: 10px 18px;
        border-radius: 25px;
        font-size: 0.95rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
    }

    .hero-cta {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 16px 40px;
        font-size: 1.05rem;
        font-weight: 700;
        letter-spacing: 1px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #d4af37, #f4d03f);
        color: #000;
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(212, 175, 55, 0.7);
    }

    .btn-secondary {
        background: transparent;
        color: #d4af37;
        border: 2px solid #d4af37;
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
    }

    .btn-secondary:hover {
        background: rgba(212, 175, 55, 0.15);
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.5);
    }

    /* Features Section */
    .features-section {
        padding: 80px 20px;
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 900;
        color: #d4af37;
        text-align: center;
        margin-bottom: 50px;
        letter-spacing: 1px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    .feature-card {
        background: rgba(212, 175, 55, 0.08);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 8px;
        padding: 35px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        background: rgba(212, 175, 55, 0.12);
        border-color: #d4af37;
        box-shadow: 0 0 25px rgba(212, 175, 55, 0.3);
        transform: translateY(-5px);
    }

    .feature-image {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .feature-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .feature-card h3 {
        color: #d4af37;
        font-size: 1.4rem;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .feature-card p {
        color: #b0b0b0;
        font-size: 0.95rem;
        line-height: 1.7;
    }

    /* Games Section */
    .games-section {
        padding: 80px 20px;
        background: linear-gradient(135deg, #0B5345 0%, #063D33 100%);
    }

    .section-subtitle {
        text-align: center;
        color: #b0b0b0;
        font-size: 1.1rem;
        margin-bottom: 50px;
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .game-card {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .game-card:hover {
        background: rgba(0, 0, 0, 0.5);
        border-color: #d4af37;
        box-shadow: 0 0 25px rgba(212, 175, 55, 0.3);
        transform: translateY(-5px);
    }

    .game-image {
        position: relative;
        width: 100%;
        height: 250px;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.5);
    }

    .game-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .game-card:hover .game-image img {
        transform: scale(1.05);
    }

    .game-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .game-card:hover .game-overlay {
        opacity: 1;
    }

    .play-button {
        background: linear-gradient(135deg, #d4af37, #f4d03f);
        color: #000;
        padding: 14px 35px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1rem;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 0 20px rgba(212, 175, 55, 0.5);
    }

    .play-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.8);
    }

    .game-info {
        padding: 25px;
    }

    .game-info h3 {
        color: #d4af37;
        font-size: 1.3rem;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .game-info p {
        color: #b0b0b0;
        font-size: 0.9rem;
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .game-specs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .game-specs span {
        background: rgba(212, 175, 55, 0.15);
        border: 1px solid rgba(212, 175, 55, 0.4);
        color: #d4af37;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* CTA Section */
    .cta-section {
        padding: 80px 20px;
        background: linear-gradient(135deg, #0B5345, #063D33);
        text-align: center;
    }

    .cta-section h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #d4af37;
        margin-bottom: 15px;
    }

    .cta-section p {
        font-size: 1.1rem;
        color: #b0b0b0;
        margin-bottom: 35px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-banner {
            min-height: 500px;
            padding: 50px 15px;
        }

        .hero-title {
            font-size: 2.2rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
        }

        .hero-description {
            font-size: 0.95rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .features-grid,
        .games-grid {
            grid-template-columns: 1fr;
        }

        .hero-cta {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }

        .game-image {
            height: 200px;
        }
    }
</style>

<!-- Hero Banner with Professional Casino Image -->
<section class="hero-banner">
    <div class="hero-content">
        <h1 class="hero-title">AYACHI</h1>
        <p class="hero-subtitle">Experience Premium Casino Gaming</p>
        <p class="hero-description">
            Play for fun. No real money. No registration. Just pure entertainment with realistic casino games. 
            Start with 1000 free credits and enjoy the thrill of professional casino gameplay.
        </p>
        
        <div class="hero-features">
            <span class="feature-badge">✓ Free to Play</span>
            <span class="feature-badge">✓ No Real Money</span>
            <span class="feature-badge">✓ No Prizes</span>
            <span class="feature-badge">✓ Pure Entertainment</span>
        </div>

        <div class="hero-cta">
            <a href="#games" class="btn btn-primary">PLAY FOR FREE</a>
            <a href="#features" class="btn btn-secondary">LEARN MORE</a>
        </div>
    </div>
</section>

<!-- Features Section with Professional Images -->
<section class="features-section" id="features">
    <div class="container">
        <h2 class="section-title">Why Choose AYACHI?</h2>
        
        <div class="features-grid">
            <!-- Feature 1: Mobile -->
            <div class="feature-card">
                <div class="feature-image">
                    <img src="/public/images/feature_mobile.webp" alt="Mobile Responsive">
                </div>
                <h3>Mobile Responsive</h3>
                <p>Play on any device - desktop, tablet, or mobile. Seamless gaming experience everywhere.</p>
            </div>

            <!-- Feature 2: Entertainment -->
            <div class="feature-card">
                <div class="feature-image">
                    <img src="/public/images/feature_entertainment.webp" alt="Pure Entertainment">
                </div>
                <h3>Pure Entertainment</h3>
                <p>Enjoy authentic casino games designed for fun and excitement. No real money involved.</p>
            </div>

            <!-- Feature 3: Sound -->
            <div class="feature-card">
                <div class="feature-image">
                    <img src="/public/images/feature_sound.webp" alt="Immersive Sound">
                </div>
                <h3>Immersive Sound</h3>
                <p>Experience realistic casino sounds and effects. Toggle audio on or off anytime.</p>
            </div>

            <!-- Feature 4: No Registration -->
            <div class="feature-card">
                <div class="feature-image">
                    <img src="/public/images/feature_registration.webp" alt="No Registration">
                </div>
                <h3>No Registration</h3>
                <p>Start playing instantly without any signup or personal information required.</p>
            </div>

            <!-- Feature 5: Fair Mechanics -->
            <div class="feature-card">
                <div class="feature-image">
                    <img src="/public/images/feature_mechanics.webp" alt="Fair Mechanics">
                </div>
                <h3>Fair Game Mechanics</h3>
                <p>Professional casino algorithms ensure fair and transparent gameplay for all players.</p>
            </div>

            <!-- Feature 6: Free Credits -->
            <div class="feature-card">
                <div class="feature-image">
                    <img src="/public/images/feature_credit.webp" alt="Free Credits">
                </div>
                <h3>1000 Free Credits</h3>
                <p>Start with 1000 free credits. Reset anytime to enjoy unlimited gaming sessions.</p>
            </div>
        </div>
    </div>
</section>

<!-- Games Section with Professional Images -->
<section class="games-section" id="games">
    <div class="container">
        <h2 class="section-title">Our Premium Games</h2>
        <p class="section-subtitle">Choose from our professional collection of casino games</p>
        
        <div class="games-grid">
            <!-- Slots Game -->
            <div class="game-card">
                <div class="game-image">
                    <img src="/public/images/game_slots.webp" alt="Slots Game">
                    <div class="game-overlay">
                        <a href="/games/slots.php" class="play-button">PLAY NOW</a>
                    </div>
                </div>
                <div class="game-info">
                    <h3>🎰 SLOTS</h3>
                    <p>Classic spinning reels with exciting symbols and winning combinations.</p>
                    <div class="game-specs">
                        <span>6 Symbols</span>
                        <span>Auto Spin</span>
                        <span>Max Win</span>
                    </div>
                </div>
            </div>

            <!-- Roulette Game -->
            <div class="game-card">
                <div class="game-image">
                    <img src="/public/images/game_roulette.webp" alt="Roulette Game">
                    <div class="game-overlay">
                        <a href="/games/roulette.php" class="play-button">PLAY NOW</a>
                    </div>
                </div>
                <div class="game-info">
                    <h3>🎡 ROULETTE</h3>
                    <p>European roulette with realistic wheel spin and multiple betting options.</p>
                    <div class="game-specs">
                        <span>37 Numbers</span>
                        <span>Color Betting</span>
                        <span>Straight Bets</span>
                    </div>
                </div>
            </div>

            <!-- Blackjack Game -->
            <div class="game-card">
                <div class="game-image">
                    <img src="/public/images/game_blackjack.webp" alt="Blackjack Game">
                    <div class="game-overlay">
                        <a href="/games/blackjack.php" class="play-button">PLAY NOW</a>
                    </div>
                </div>
                <div class="game-info">
                    <h3>🎴 BLACKJACK</h3>
                    <p>Classic card game with dealer AI and professional game mechanics.</p>
                    <div class="game-specs">
                        <span>Hit/Stand</span>
                        <span>Dealer AI</span>
                        <span>Card Values</span>
                    </div>
                </div>
            </div>

            <!-- Poker Game -->
            <div class="game-card">
                <div class="game-image">
                    <img src="/public/images/game_poker.webp" alt="Poker Game">
                    <div class="game-overlay">
                        <a href="/games/poker.php" class="play-button">PLAY NOW</a>
                    </div>
                </div>
                <div class="game-info">
                    <h3>♠️ POKER</h3>
                    <p>5-card draw poker with hand rankings and strategic gameplay.</p>
                    <div class="game-specs">
                        <span>Hand Rankings</span>
                        <span>Card Draw</span>
                        <span>Dealer Compare</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Play?</h2>
        <p>Start your casino gaming experience today with AYACHI Casino</p>
        <a href="#games" class="btn btn-primary" style="padding: 18px 50px; font-size: 1.1rem;">START PLAYING NOW</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<!-- Professional images integrated -->
