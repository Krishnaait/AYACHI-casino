<?php
/**
 * BLACKJACK GAME - AYACHI Casino
 * Using Global Header & Footer
 */
$page_title = "Blackjack";
include '../includes/header.php';
?>

    <!-- GAME CONTAINER -->
    <div class="game-container">
        <!-- GAME HEADER -->
        <div class="game-header">
            <div class="game-title">
                <h1>🎴 BLACKJACK</h1>
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
                <div class="stat-label">Current Bet</div>
                <div class="stat-value text-primary" id="bet">0</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Payout</div>
                <div class="stat-value" id="winAmount" style="color: var(--accent-green);">0</div>
            </div>
        </div>

        <!-- BLACKJACK TABLE -->
        <div class="blackjack-table">
            <!-- DEALER HAND -->
            <div class="dealer-hand">
                <div class="hand-label">DEALER</div>
                <div class="cards-display" id="dealerCards"></div>
                <div class="hand-total" id="dealerTotal"></div>
            </div>

            <!-- MESSAGE -->
            <div class="game-message" id="message">
                Place your bet to start
            </div>

            <!-- PLAYER HAND -->
            <div class="player-hand">
                <div class="hand-label">YOUR HAND</div>
                <div class="cards-display" id="playerCards"></div>
                <div class="hand-total" id="playerTotal"></div>
            </div>
        </div>

        <!-- ACTION BUTTONS -->
        <div id="bettingOptions" class="betting-options">
            <button class="btn btn-primary" onclick="placeBet(10)">Bet 10</button>
            <button class="btn btn-primary" onclick="placeBet(25)">Bet 25</button>
            <button class="btn btn-primary" onclick="placeBet(50)">Bet 50</button>
            <button class="btn btn-primary" onclick="placeBet(100)">Bet 100</button>
        </div>

        <div id="actionButtons" class="action-buttons" style="display: none;">
            <button class="btn btn-primary" onclick="hit()">HIT</button>
            <button class="btn btn-secondary" onclick="stand()">STAND</button>
        </div>

        <div id="newGameBtn" style="display: none;">
            <button class="btn btn-primary btn-lg" onclick="newGame()" style="width: 100%;">NEW GAME</button>
        </div>

        <!-- CONTROL BUTTONS -->
        <div class="control-buttons" style="margin-top: var(--spacing-lg);">
            <button class="btn btn-secondary" onclick="resetCredits()">🔄 Reset</button>
            <button class="btn btn-secondary" onclick="toggleSound()" id="soundBtn">🔊 Sound</button>
        </div>

        <!-- HOW TO PLAY -->
        <div class="card">
            <div class="card-header">
                <h3>How to Play</h3>
            </div>
            <div class="card-body">
                <ul class="how-to-list">
                    <li><strong>Objective:</strong> Get closer to 21 than the dealer without going over</li>
                    <li><strong>Place Bet:</strong> Choose your bet amount (10, 25, 50, or 100 credits)</li>
                    <li><strong>Hit:</strong> Receive another card</li>
                    <li><strong>Stand:</strong> Keep your current hand and let dealer play</li>
                    <li><strong>Earn Credits:</strong> Beat the dealer or dealer busts (2x payout)</li>
                    <li><strong>Card Values:</strong> Number cards = face value, Face cards = 10, Ace = 1 or 11</li>
                </ul>
            </div>
        </div>

        <!-- DISCLAIMER -->
        <div class="disclaimer">
            <strong>⚠ Disclaimer:</strong> This is a free-to-play game for entertainment only. No real money is involved. No prizes or winnings are given to players.
        </div>
    </div>

    <script src="../public/js/blackjack.js"></script>

<?php include '../includes/footer.php'; ?>
