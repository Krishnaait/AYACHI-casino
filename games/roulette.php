<?php
/**
 * ROULETTE GAME - AYACHI Casino
 * Using Global Header & Footer
 */
$page_title = "Roulette";
include '../includes/header.php';
?>

    <!-- PROFESSIONAL GAME PAGE LAYOUT -->
    <div class="game-page-wrapper">
        
        <!-- GAME HERO SECTION -->
        <div class="game-hero-section">
            <div class="game-hero-content">
                <h1 class="game-title-main">🎡 ROULETTE</h1>
                <p class="game-tagline">Experience the Thrill of Classic Roulette</p>
                <div class="game-rating">
                    <span class="stars">★★★★★</span>
                    <span class="rating-text">4.8/5 (2,847 plays)</span>
                </div>
                <p class="game-description">
                    Roulette is the most famous of the casino games. Predict where the ball will land on the spinning wheel and earn credits. 
                    Experience the elegance and excitement of this classic casino game with multiple betting options.
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
                        <span class="stat-label">Total Bet</span>
                        <span class="stat-value" id="totalBet">0</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Payout</span>
                        <span class="stat-value payout-value" id="winAmount">0</span>
                    </div>
                </div>

                <!-- ROULETTE WHEEL DISPLAY -->
                <div class="wheel-section">
                    <div class="wheel-container">
                        <div class="wheel" id="wheel">?</div>
                    </div>
                    <div class="game-message" id="message">Select your bets and spin!</div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="game-action-buttons">
                    <button class="btn btn-primary btn-lg" id="spinBtn" onclick="spinWheel()">SPIN WHEEL</button>
                </div>

                <!-- CONTROL BUTTONS -->
                <div class="game-control-buttons">
                    <button class="btn btn-secondary" onclick="clearBets()">Clear Bets</button>
                    <button class="btn btn-secondary" onclick="resetCredits()">🔄 Reset</button>
                </div>
            </div>

            <!-- RIGHT SIDE - BETTING PANEL -->
            <div class="betting-panel-section">
                <div class="betting-panel-header">
                    <h3>Place Your Bets</h3>
                    <p class="betting-subtitle">Select betting options and spin</p>
                </div>

                <!-- COLOR BETS -->
                <div class="bet-group-card">
                    <div class="bet-group-title">Color Bets</div>
                    <div class="bet-buttons-grid">
                        <button class="btn btn-secondary" onclick="addBet('red', 0, 2)" style="border-color: var(--accent-red); color: var(--accent-red);">🔴 RED</button>
                        <button class="btn btn-secondary" onclick="addBet('black', 0, 2)">⚫ BLACK</button>
                    </div>
                </div>

                <!-- EVEN/ODD BETS -->
                <div class="bet-group-card">
                    <div class="bet-group-title">Even/Odd</div>
                    <div class="bet-buttons-grid">
                        <button class="btn btn-secondary" onclick="addBet('even', 0, 2)">EVEN</button>
                        <button class="btn btn-secondary" onclick="addBet('odd', 0, 2)">ODD</button>
                    </div>
                </div>

                <!-- RANGE BETS -->
                <div class="bet-group-card">
                    <div class="bet-group-title">Ranges</div>
                    <div class="bet-buttons-grid">
                        <button class="btn btn-secondary" onclick="addBet('1to18', 0, 2)">1-18</button>
                        <button class="btn btn-secondary" onclick="addBet('19to36', 0, 2)">19-36</button>
                    </div>
                </div>

                <!-- NUMBER BETS -->
                <div class="bet-group-card">
                    <div class="bet-group-title">Straight Numbers</div>
                    <div class="number-grid" id="numberGrid"></div>
                </div>

                <!-- SELECTED BETS -->
                <div id="selectedBets" style="margin-top: 1.5rem; display: none;">
                    <p class="selected-bets-label">Your Bets:</p>
                    <div id="betsList" class="bets-list"></div>
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
                                <strong>Place Bets</strong>
                                <p>Select your betting options: Red/Black, Even/Odd, Ranges, or Straight Numbers</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">2</span>
                            <div class="info-text">
                                <strong>Spin the Wheel</strong>
                                <p>Click SPIN WHEEL to start the game and watch the ball land</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <span class="info-number">3</span>
                            <div class="info-text">
                                <strong>Win Credits</strong>
                                <p>Winning bets are paid automatically. Payouts vary by bet type</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-column">
                    <h3 class="info-title">Payout Guide</h3>
                    <div class="info-content">
                        <div class="payout-item">
                            <span class="payout-odds">2:1</span>
                            <div class="payout-text">
                                <strong>Red/Black, Even/Odd, 1-18/19-36</strong>
                                <p>Balanced bets with standard payouts</p>
                            </div>
                        </div>
                        <div class="payout-item">
                            <span class="payout-odds">36:1</span>
                            <div class="payout-text">
                                <strong>Straight Number</strong>
                                <p>High risk, high reward single number bet</p>
                            </div>
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

    <script src="../public/js/roulette.js"></script>

<?php include '../includes/footer.php'; ?>
