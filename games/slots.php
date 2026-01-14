<?php
/**
 * SLOTS GAME - AYACHI Casino
 * Using Global Header & Footer
 */
$page_title = "Slots";
include '../includes/header.php';
?>

    <!-- PROFESSIONAL GAME PAGE LAYOUT -->
    <div class="game-page-wrapper">
        
        <!-- GAME HERO SECTION -->
        <div class="game-hero-section">
            <div class="game-hero-content">
                <h1 class="game-title-main">🎰 SLOT MACHINES</h1>
                <p class="game-tagline">Spin to Win Big Credits</p>
                <div class="game-rating">
                    <span class="stars">★★★★★</span>
                    <span class="rating-text">4.9/5 (3,521 plays)</span>
                </div>
                <p class="game-description">
                    Experience the classic excitement of slot machines. Match symbols on the reels to earn credits. 
                    Simple gameplay with exciting payouts makes this a favorite among casino enthusiasts.
                </p>
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
                        <span class="stat-label">Bet</span>
                        <span class="stat-value" id="bet">10</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Payout</span>
                        <span class="stat-value payout-value" id="winAmount">0</span>
                    </div>
                </div>

                <!-- SLOTS REELS DISPLAY -->
                <div class="slots-display-section">
                    <div class="slots-container">
                        <div class="reel" id="reel1">🍒</div>
                        <div class="reel" id="reel2">🍋</div>
                        <div class="reel" id="reel3">🍊</div>
                    </div>
                    <div class="game-message" id="message">Place your bet and spin!</div>
                </div>

                <!-- BET ADJUSTMENT -->
                <div class="bet-adjustment-buttons">
                    <button class="btn btn-secondary" onclick="decreaseBet()">- BET</button>
                    <button class="btn btn-secondary" onclick="increaseBet()">+ BET</button>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="game-action-buttons">
                    <button class="btn btn-primary btn-lg" id="spinBtn" onclick="spin()">SPIN</button>
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
                    <h3>Game Information</h3>
                </div>

                <!-- PAYOUT TABLE -->
                <div class="payout-table-card">
                    <h4 class="card-title">Symbol Payouts</h4>
                    <div class="payout-table">
                        <div class="payout-row">
                            <span class="payout-symbol">7️⃣</span>
                            <span class="payout-amount">100x</span>
                        </div>
                        <div class="payout-row">
                            <span class="payout-symbol">👑</span>
                            <span class="payout-amount">75x</span>
                        </div>
                        <div class="payout-row">
                            <span class="payout-symbol">💎</span>
                            <span class="payout-amount">50x</span>
                        </div>
                        <div class="payout-row">
                            <span class="payout-symbol">🍊</span>
                            <span class="payout-amount">25x</span>
                        </div>
                        <div class="payout-row">
                            <span class="payout-symbol">🍋</span>
                            <span class="payout-amount">20x</span>
                        </div>
                        <div class="payout-row">
                            <span class="payout-symbol">🍒</span>
                            <span class="payout-amount">15x</span>
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
                                <strong>Set Your Bet</strong>
                                <p>Use the +/- buttons to adjust your bet amount (10-100 credits)</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">2</span>
                            <div class="info-text">
                                <strong>Spin the Reels</strong>
                                <p>Click SPIN to start the game and watch the reels spin</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">3</span>
                            <div class="info-text">
                                <strong>Match Symbols</strong>
                                <p>Get matching symbols to earn credits based on payout table</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-column">
                    <h3 class="info-title">Game Features</h3>
                    <div class="info-content">
                        <div class="feature-item">
                            <strong>✓ Easy to Play</strong>
                            <p>Simple mechanics perfect for all skill levels</p>
                        </div>
                        <div class="feature-item">
                            <strong>✓ High Payouts</strong>
                            <p>Generous rewards for matching symbols</p>
                        </div>
                        <div class="feature-item">
                            <strong>✓ Reset Anytime</strong>
                            <p>Restore your credits and play again</p>
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

    <script src="../public/js/slots.js"></script>

<?php include '../includes/footer.php'; ?>
