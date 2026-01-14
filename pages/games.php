<?php
/**
 * GAMES PAGE - AYACHI Casino
 * Displays all available games
 */
$page_title = "Games";
include '../includes/header.php';
?>

    <!-- GAMES PAGE WRAPPER -->
    <div class="games-page-wrapper">
        
        <!-- PAGE HERO SECTION -->
        <div class="page-hero-section">
            <div class="page-hero-content">
                <h1 class="page-title">🎮 OUR GAMES</h1>
                <p class="page-tagline">Premium Free-to-Play Casino Games</p>
                <p class="page-description">
                    Explore our collection of professional casino games. Each game features authentic mechanics, 
                    fair gameplay, and exciting rewards. Play for fun with virtual credits - no real money involved.
                </p>
            </div>
        </div>

        <!-- GAMES GRID SECTION -->
        <div class="games-grid-container">
            <div class="games-grid">
                
                <!-- SLOTS GAME CARD -->
                <div class="game-card-large">
                    <div class="game-card-image">
                        <img src="/public/images/game_slots.webp" alt="Slot Machines">
                        <div class="game-card-overlay">
                            <a href="/games/slots.php" class="play-game-btn">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-card-content">
                        <h3 class="game-card-title">🎰 SLOT MACHINES</h3>
                        <p class="game-card-tagline">Spin to Win Big Credits</p>
                        <p class="game-card-description">
                            Experience the classic excitement of slot machines. Match symbols on the reels to earn credits. 
                            Simple gameplay with exciting payouts.
                        </p>
                        <div class="game-card-features">
                            <span class="feature-tag">Easy to Play</span>
                            <span class="feature-tag">High Payouts</span>
                            <span class="feature-tag">Auto Spin</span>
                        </div>
                    </div>
                </div>

                <!-- ROULETTE GAME CARD -->
                <div class="game-card-large">
                    <div class="game-card-image">
                        <img src="/public/images/game_roulette.webp" alt="Roulette">
                        <div class="game-card-overlay">
                            <a href="/games/roulette.php" class="play-game-btn">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-card-content">
                        <h3 class="game-card-title">🎡 ROULETTE</h3>
                        <p class="game-card-tagline">Experience the Thrill of Classic Roulette</p>
                        <p class="game-card-description">
                            Roulette is the most famous of the casino games. Predict where the ball will land on the spinning wheel 
                            and earn credits. Experience the elegance and excitement of this classic casino game.
                        </p>
                        <div class="game-card-features">
                            <span class="feature-tag">Multiple Bets</span>
                            <span class="feature-tag">Real Wheel</span>
                            <span class="feature-tag">Fast Paced</span>
                        </div>
                    </div>
                </div>

                <!-- BLACKJACK GAME CARD -->
                <div class="game-card-large">
                    <div class="game-card-image">
                        <img src="/public/images/game_blackjack.webp" alt="Blackjack">
                        <div class="game-card-overlay">
                            <a href="/games/blackjack.php" class="play-game-btn">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-card-content">
                        <h3 class="game-card-title">🎴 BLACKJACK</h3>
                        <p class="game-card-tagline">Beat the Dealer to 21</p>
                        <p class="game-card-description">
                            The classic card game of strategy and skill. Get closer to 21 than the dealer without going over. 
                            Hit or stand strategically to earn credits and test your card sense.
                        </p>
                        <div class="game-card-features">
                            <span class="feature-tag">Strategy Game</span>
                            <span class="feature-tag">Dealer AI</span>
                            <span class="feature-tag">Card Counting</span>
                        </div>
                    </div>
                </div>

                <!-- POKER GAME CARD -->
                <div class="game-card-large">
                    <div class="game-card-image">
                        <img src="/public/images/game_poker.webp" alt="Poker">
                        <div class="game-card-overlay">
                            <a href="/games/poker.php" class="play-game-btn">PLAY NOW</a>
                        </div>
                    </div>
                    <div class="game-card-content">
                        <h3 class="game-card-title">♠️ POKER</h3>
                        <p class="game-card-tagline">5-Card Draw Poker Challenge</p>
                        <p class="game-card-description">
                            Master the classic 5-card draw poker game. Build the best hand possible by selecting which cards to keep 
                            and which to discard. Test your poker knowledge and earn credits with winning hands.
                        </p>
                        <div class="game-card-features">
                            <span class="feature-tag">Hand Rankings</span>
                            <span class="feature-tag">Card Strategy</span>
                            <span class="feature-tag">Skill Based</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- DISCLAIMER SECTION -->
        <div class="page-disclaimer-section">
            <div class="disclaimer-content">
                <strong>⚠ Disclaimer:</strong> All games are free-to-play for entertainment only. No real money is involved. 
                No prizes or winnings are given to players. Players must be 18 years or older.
            </div>
        </div>

    </div>

    <style>
        .games-page-wrapper {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a4d3e 0%, #0d2a22 100%);
            padding-bottom: 2rem;
        }

        .page-hero-section {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
            padding: 4rem 2rem;
            text-align: center;
        }

        .page-hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 900;
            color: #d4af37;
            margin: 0 0 1rem 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .page-tagline {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            margin: 0 0 1.5rem 0;
            font-weight: 300;
        }

        .page-description {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .games-grid-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .game-card-large {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.05), rgba(212, 175, 55, 0.02));
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .game-card-large:hover {
            transform: translateY(-8px);
            border-color: #d4af37;
            box-shadow: 0 12px 24px rgba(212, 175, 55, 0.2);
        }

        .game-card-image {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #0d2a22;
        }

        .game-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .game-card-large:hover .game-card-image img {
            transform: scale(1.05);
        }

        .game-card-overlay {
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

        .game-card-large:hover .game-card-overlay {
            opacity: 1;
        }

        .play-game-btn {
            background: linear-gradient(135deg, #d4af37, #f0d570);
            color: #0d2a22;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
        }

        .play-game-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(212, 175, 55, 0.6);
        }

        .game-card-content {
            padding: 1.5rem;
        }

        .game-card-title {
            font-family: 'Cinzel', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #d4af37;
            margin: 0 0 0.5rem 0;
        }

        .game-card-tagline {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0 0 0.8rem 0;
            font-style: italic;
        }

        .game-card-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .game-card-rating .stars {
            color: #d4af37;
            font-size: 1rem;
        }

        .game-card-rating .rating-text {
            color: rgba(255, 255, 255, 0.7);
        }

        .game-card-description {
            color: rgba(255, 255, 255, 0.75);
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 0 0 1rem 0;
        }

        .game-card-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .feature-tag {
            background: rgba(212, 175, 55, 0.2);
            border: 1px solid rgba(212, 175, 55, 0.4);
            color: #d4af37;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .page-disclaimer-section {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            margin-left: 2rem;
            margin-right: 2rem;
        }

        .disclaimer-content {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.95rem;
            line-height: 1.6;
            text-align: center;
        }

        .disclaimer-content strong {
            color: #d4af37;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }

            .page-tagline {
                font-size: 1.2rem;
            }

            .games-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .page-hero-section {
                padding: 2rem 1rem;
            }

            .games-grid-container {
                padding: 1.5rem 1rem;
            }
        }
    </style>

<?php include '../includes/footer.php'; ?>
