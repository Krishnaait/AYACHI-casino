<?php
/**
 * ROULETTE GAME - AYACHI Casino
 * Using Global Header & Footer
 */
$page_title = "Roulette";
include '../includes/header.php';
?>

    <!-- GAME CONTAINER -->
    <div class="game-container">
        <!-- GAME HEADER -->
        <div class="game-header">
            <div class="game-title">
                <h1>🎡 ROULETTE</h1>
            </div>
            <a href="/" class="btn btn-secondary btn-sm">← Home</a>
        </div>

        <!-- GAME STATS -->
        <div class="game-stats">
            <div class="stat-box">
                <div class="stat-label">Credits</div>
                <div class="stat-value" id="credits">1000</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Total Bet</div>
                <div class="stat-value text-primary" id="totalBet">0</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Payout</div>
                <div class="stat-value" id="winAmount" style="color: var(--accent-green);">0</div>
            </div>
        </div>

        <!-- ROULETTE GAME AREA -->
        <div class="roulette-container">
            <!-- WHEEL -->
            <div class="game-board">
                <div class="wheel-display">
                    <div class="wheel" id="wheel">?</div>
                </div>

                <!-- MESSAGE -->
                <div class="game-message" id="message">
                    Select your bets and spin!
                </div>

                <!-- SPIN BUTTON -->
                <button class="btn btn-primary btn-lg" id="spinBtn" onclick="spinWheel()" style="width: 100%; margin-bottom: var(--spacing-md);">
                    SPIN WHEEL
                </button>

                <!-- CONTROL BUTTONS -->
                <div class="control-buttons">
                    <button class="btn btn-secondary" onclick="clearBets()">Clear Bets</button>
                    <button class="btn btn-secondary" onclick="resetCredits()">🔄 Reset</button>
                </div>
            </div>

            <!-- BETTING PANEL -->
            <div class="betting-panel">
                <h3>Place Your Bets</h3>

                <!-- COLOR BETS -->
                <div class="bet-group">
                    <div class="bet-group-label">Color Bets</div>
                    <div class="bet-buttons">
                        <button class="btn btn-secondary" onclick="addBet('red', 0, 2)" style="border-color: var(--accent-red); color: var(--accent-red);">RED</button>
                        <button class="btn btn-secondary" onclick="addBet('black', 0, 2)">BLACK</button>
                    </div>
                </div>

                <!-- EVEN/ODD BETS -->
                <div class="bet-group">
                    <div class="bet-group-label">Even/Odd</div>
                    <div class="bet-buttons">
                        <button class="btn btn-secondary" onclick="addBet('even', 0, 2)">EVEN</button>
                        <button class="btn btn-secondary" onclick="addBet('odd', 0, 2)">ODD</button>
                    </div>
                </div>

                <!-- RANGE BETS -->
                <div class="bet-group">
                    <div class="bet-group-label">Ranges</div>
                    <div class="bet-buttons">
                        <button class="btn btn-secondary" onclick="addBet('1to18', 0, 2)">1-18</button>
                        <button class="btn btn-secondary" onclick="addBet('19to36', 0, 2)">19-36</button>
                    </div>
                </div>

                <!-- NUMBER BETS -->
                <div class="bet-group">
                    <div class="bet-group-label">Straight Numbers</div>
                    <div class="number-grid" id="numberGrid"></div>
                </div>

                <!-- SELECTED BETS -->
                <div id="selectedBets" style="margin-top: var(--spacing-lg); display: none;">
                    <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: var(--spacing-sm);">Your Bets:</p>
                    <div id="betsList" style="font-size: 0.75rem;"></div>
                </div>
            </div>
        </div>

        <!-- HOW TO PLAY -->
        <div class="card">
            <div class="card-header">
                <h3>How to Play</h3>
            </div>
            <div class="card-body">
                <div class="rankings-grid">
                    <div>
                        <p><strong>Betting Options:</strong></p>
                        <ul class="how-to-list">
                            <li><strong>Red/Black:</strong> 2:1 payout</li>
                            <li><strong>Even/Odd:</strong> 2:1 payout</li>
                            <li><strong>1-18 / 19-36:</strong> 2:1 payout</li>
                            <li><strong>Straight Number:</strong> 36:1 payout</li>
                        </ul>
                    </div>
                    <div>
                        <p><strong>How it works:</strong></p>
                        <ul class="how-to-list">
                            <li>1. Click betting options to place bets (10 credits each)</li>
                            <li>2. Click SPIN WHEEL to start</li>
                            <li>3. Winning bets are paid automatically</li>
                            <li>4. Click Reset to restore credits</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- DISCLAIMER -->
        <div class="disclaimer">
            <strong>⚠ Disclaimer:</strong> This is a free-to-play game for entertainment only. No real money is involved. No prizes or winnings are given to players.
        </div>
    </div>

    <script src="../public/js/roulette.js"></script>

<?php include '../includes/footer.php'; ?>
