<?php
/**
 * POKER GAME - AYACHI Casino
 * Using Global Header & Footer
 */
$page_title = "Poker";
include '../includes/header.php';
?>

    <!-- PROFESSIONAL GAME PAGE LAYOUT -->
    <div class="game-page-wrapper">
        
        <!-- GAME HERO SECTION -->
        <div class="game-hero-section">
            <div class="game-hero-content">
                <h1 class="game-title-main">♠️ POKER</h1>
                <p class="game-tagline">5-Card Draw Poker Challenge</p>
                <div class="game-rating">
                    <span class="stars">★★★★★</span>
                    <span class="rating-text">4.6/5 (1,923 plays)</span>
                </div>
                <p class="game-description">
                    Master the classic 5-card draw poker game. Build the best hand possible by selecting which cards to keep and which to discard. 
                    Test your poker knowledge and earn credits with winning hands.
                </p>
            </div>
        </div>

        <!-- GAME IMAGE AND HISTORY SECTION -->
        <div class="game-image-history-section">
            <div class="game-image-container">
                <img src="/public/images/game_poker.webp" alt="Poker Game" class="game-featured-image">
            </div>
            <div class="game-history-container">
                <h3 class="history-title">History of Poker</h3>
                <div class="history-content">
                    <p>Poker has a fascinating and somewhat mysterious history. While its exact origins are debated, most historians believe poker evolved from various European card games, particularly the French game "Poque" and the German game "Pochspiel." The game was brought to America by French settlers in New Orleans in the early 19th century.</p>
                    <p>Poker became wildly popular during the American Civil War and the Gold Rush era. It was played on riverboats, in saloons, and in mining camps across the frontier. The game evolved from simple 5-card draw to include variants like stud poker and draw poker with wild cards.</p>
                    <p>In the 20th century, poker became a staple of casinos and eventually spread to online platforms. The game gained mainstream popularity through televised poker tournaments, particularly the World Series of Poker (WSOP) and celebrity poker shows. Modern poker combines mathematical strategy, psychology, and luck in ways that continue to captivate millions of players worldwide.</p>
                    <p>Today, poker is recognized as a game of skill and strategy, with professional players competing for millions of dollars in tournaments. The game's enduring appeal lies in its perfect blend of chance, strategy, and human psychology.</p>
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

                <!-- POKER TABLE -->
                <div class="poker-table-display">
                    <!-- DEALER HAND -->
                    <div class="dealer-section">
                        <div class="hand-label">DEALER</div>
                        <div class="cards-display" id="dealerCards"></div>
                        <div class="hand-ranking" id="dealerRanking"></div>
                    </div>

                    <!-- GAME MESSAGE -->
                    <div class="game-message" id="message">Place your bet to start</div>

                    <!-- PLAYER HAND -->
                    <div class="player-section">
                        <div class="hand-label">YOUR HAND (Click to discard)</div>
                        <div class="cards-display" id="playerCards"></div>
                        <div class="hand-ranking" id="playerRanking"></div>
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
                    <button class="btn btn-primary" id="drawBtn" onclick="drawCards()">DRAW (0)</button>
                    <button class="btn btn-secondary" onclick="keepAll()">KEEP ALL</button>
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
                    <h3>Hand Rankings</h3>
                </div>

                <!-- HAND RANKINGS TABLE -->
                <div class="rankings-card">
                    <div class="ranking-row">
                        <span class="ranking-number">1</span>
                        <div class="ranking-info">
                            <strong>Royal Flush</strong>
                            <p>Straight flush (highest)</p>
                        </div>
                    </div>
                    <div class="ranking-row">
                        <span class="ranking-number">2</span>
                        <div class="ranking-info">
                            <strong>Four of a Kind</strong>
                            <p>Four cards of same rank</p>
                        </div>
                    </div>
                    <div class="ranking-row">
                        <span class="ranking-number">3</span>
                        <div class="ranking-info">
                            <strong>Full House</strong>
                            <p>Three of a kind + pair</p>
                        </div>
                    </div>
                    <div class="ranking-row">
                        <span class="ranking-number">4</span>
                        <div class="ranking-info">
                            <strong>Flush</strong>
                            <p>Five cards of same suit</p>
                        </div>
                    </div>
                    <div class="ranking-row">
                        <span class="ranking-number">5</span>
                        <div class="ranking-info">
                            <strong>Straight</strong>
                            <p>Five consecutive cards</p>
                        </div>
                    </div>
                    <div class="ranking-row">
                        <span class="ranking-number">6</span>
                        <div class="ranking-info">
                            <strong>Three of a Kind</strong>
                            <p>Three cards of same rank</p>
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
                                <strong>Select Cards to Discard</strong>
                                <p>Click cards to mark them for discard, then click DRAW</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">3</span>
                            <div class="info-text">
                                <strong>Compare Hands</strong>
                                <p>Your hand is compared to dealer's hand for payout</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-column">
                    <h3 class="info-title">Game Strategy</h3>
                    <div class="info-content">
                        <div class="feature-item">
                            <strong>✓ Know Hand Rankings</strong>
                            <p>Understand poker hand values and combinations</p>
                        </div>
                        <div class="feature-item">
                            <strong>✓ Strategic Discards</strong>
                            <p>Choose which cards to replace wisely</p>
                        </div>
                        <div class="feature-item">
                            <strong>✓ Beat the Dealer</strong>
                            <p>Your hand must rank higher than dealer's</p>
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

    <script src="../public/js/poker.js"></script>

    <?php include '../includes/footer.php'; ?>
