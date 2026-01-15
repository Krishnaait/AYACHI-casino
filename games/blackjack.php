<?php
/**
 * BLACKJACK GAME - AYACHI-CASINO
 * Using Global Header & Footer
 */
$page_title = "Blackjack";
include '../includes/header.php';
?>

    <!-- PROFESSIONAL GAME PAGE LAYOUT -->
    <div class="game-page-wrapper">
        
        <!-- GAME HERO SECTION -->
        <div class="game-hero-section">
            <div class="game-hero-content">
                <h1 class="game-title-main">🎴 BLACKJACK</h1>
                <p class="game-tagline">Beat the Dealer to 21</p>
                <p class="game-description">
                    The classic card game of strategy and skill. Get closer to 21 than the dealer without going over. 
                    Hit or stand strategically to earn credits and test your card sense.
                </p>
            </div>
        </div>

        <!-- GAME IMAGE AND HISTORY SECTION -->
        <div class="game-image-history-section">
            <div class="game-image-container">
                <img src="/public/images/game_blackjack.webp" alt="Blackjack Game" class="game-featured-image">
            </div>
            <div class="game-history-container">
                <h3 class="history-title">History of Blackjack</h3>
                <div class="history-content">
                    <p>Blackjack, also known as "21," has a rich history dating back to the 17th century. The game is believed to have originated in France, where it was called "Vingt-et-Un" (French for "twenty-one"). It was first mentioned in a book by Spanish author Miguel de Cervantes in 1601.</p>
                    <p>The game became popular in the United States during the Gold Rush era, when miners and settlers played it in saloons and gambling halls. American casinos adopted the game and added the "blackjack" bonus payout to attract players, which gave the game its modern name.</p>
                    <p>In the 1960s, mathematician Edward Thorp published "Beat the Dealer," which introduced card counting strategies. This revolutionized the game and made it one of the most strategically complex casino games. Modern blackjack combines luck with mathematical strategy, making it appealing to both casual players and serious strategists.</p>
                    <p>Today, blackjack remains one of the most popular casino games worldwide, known for its perfect balance of chance and skill. The game's enduring appeal lies in its simple rules but deep strategic possibilities.</p>
                </div>
            </div>
        </div>

        <!-- MAIN GAME CONTAINER -->
        <div class="game-container-professional">
            
            <!-- LEFT SIDE - GAME BOARD -->
            <div class="game-board-section">
                
                <!-- PLAYER STATS BAR -->
                <div class="game-stats-bar">
                    <div class="stat-item">
                        <span class="stat-label">Credits</span>
                        <span class="stat-value" id="credits">1000</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Current Bet</span>
                        <span class="stat-value" id="bet">0</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Payout</span>
                        <span class="stat-value payout-value" id="winAmount">0</span>
                    </div>
                </div>

                <!-- BLACKJACK TABLE -->
                <div class="blackjack-table-display">
                    <!-- DEALER HAND -->
                    <div class="dealer-section">
                        <div class="hand-label">DEALER</div>
                        <div class="cards-display" id="dealerCards"></div>
                        <div class="hand-total" id="dealerTotal"></div>
                    </div>

                    <!-- GAME MESSAGE -->
                    <div class="game-message" id="message">Place your bet to start</div>

                    <!-- PLAYER HAND -->
                    <div class="player-section">
                        <div class="hand-label">YOUR HAND</div>
                        <div class="cards-display" id="playerCards"></div>
                        <div class="hand-total" id="playerTotal"></div>
                    </div>
                </div>

                <!-- BETTING OPTIONS -->
                <div id="bettingOptions" class="betting-options">
                    <button class="btn btn-primary" onclick="placeBet(10)">Bet 10</button>
                    <button class="btn btn-primary" onclick="placeBet(25)">Bet 25</button>
                    <button class="btn btn-primary" onclick="placeBet(50)">Bet 50</button>
                    <button class="btn btn-primary" onclick="placeBet(100)">Bet 100</button>
                </div>

                <!-- ACTION BUTTONS -->
                <div id="actionButtons" class="action-buttons" style="display: none;">
                    <button class="btn btn-primary" onclick="hit()">HIT</button>
                    <button class="btn btn-secondary" onclick="stand()">STAND</button>
                </div>

                <!-- NEW GAME BUTTON -->
                <div id="newGameBtn" style="display: none;">
                    <button class="btn btn-primary btn-lg" onclick="newGame()" style="width: 100%;">NEW GAME</button>
                </div>

                <!-- CONTROL BUTTONS -->
                <div class="game-control-buttons">
                    <button class="btn btn-secondary" onclick="resetCredits()">🔄 Reset</button>
                    <button class="btn btn-secondary" onclick="toggleSound()" id="soundBtn">🔊 Sound</button>
                </div>
            </div>

            <!-- RIGHT SIDE - INFORMATION PANEL -->
            <div class="info-panel-section">
                <div class="info-panel-header">
                    <h3>Game Rules</h3>
                </div>

                <!-- CARD VALUES -->
                <div class="rules-card">
                    <h4 class="card-title">Card Values</h4>
                    <div class="rules-list">
                        <div class="rule-item">
                            <span class="rule-label">Number Cards</span>
                            <span class="rule-value">Face Value</span>
                        </div>
                        <div class="rule-item">
                            <span class="rule-label">Face Cards (J, Q, K)</span>
                            <span class="rule-value">10 Points</span>
                        </div>
                        <div class="rule-item">
                            <span class="rule-label">Ace</span>
                            <span class="rule-value">1 or 11</span>
                        </div>
                    </div>
                </div>

                <!-- WINNING CONDITIONS -->
                <div class="rules-card">
                    <h4 class="card-title">Win Conditions</h4>
                    <div class="rules-list">
                        <div class="rule-item">
                            <strong>Get to 21</strong>
                            <p>Closest to 21 without going over wins</p>
                        </div>
                        <div class="rule-item">
                            <strong>Dealer Busts</strong>
                            <p>If dealer goes over 21, you win</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GAME INFORMATION SECTION -->
        <div class="game-info-section">
            <div class="info-container">
                <div class="info-column">
                    <h3 class="info-title">How to Play</h3>
                    <div class="info-content">
                        <div class="info-item">
                            <span class="info-number">1</span>
                            <div class="info-text">
                                <strong>Place Your Bet</strong>
                                <p>Choose a bet amount: 10, 25, 50, or 100 credits</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">2</span>
                            <div class="info-text">
                                <strong>Hit or Stand</strong>
                                <p>Hit to get another card or Stand to keep your total</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">3</span>
                            <div class="info-text">
                                <strong>Earn Credits</strong>
                                <p>Beat the dealer to earn 2x your bet as payout</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-column">
                    <h3 class="info-title">Strategy Tips</h3>
                    <div class="info-content">
                        <div class="feature-item">
                            <strong>✓ Know Card Values</strong>
                            <p>Understand when Ace counts as 1 or 11</p>
                        </div>
                        <div class="feature-item">
                            <strong>✓ Manage Risk</strong>
                            <p>Stand when you're close to 21 to avoid busting</p>
                        </div>
                        <div class="feature-item">
                            <strong>✓ Watch the Dealer</strong>
                            <p>Make decisions based on dealer's visible card</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DISCLAIMER SECTION -->
        <div class="game-disclaimer-section">
            <div class="disclaimer-content">
                <strong>⚠ Disclaimer:</strong> This is a free-to-play game for entertainment only. No real money is involved. No prizes or winnings are given to players. Players must be 18 years or older.
            </div>
        </div>
    </div>

    <script src="../public/js/blackjack.js"></script>

    <?php include '../includes/footer.php'; ?>
