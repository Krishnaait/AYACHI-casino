<?php
/**
 * SLOTS GAME - AYACHI Casino
 * HTML, CSS, PHP with Vanilla JavaScript
 * Realistic slot machine with spinning reels
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slots - AYACHI Casino</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/games.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="logo">
                <div class="logo-icon">AY</div>
                <span>SLOTS</span>
            </div>
            <nav>
                <a href="../index.php">← BACK HOME</a>
            </nav>
        </div>
    </header>

    <!-- GAME CONTAINER -->
    <div class="game-container">
        <!-- GAME HEADER -->
        <div class="game-header">
            <div class="game-title">
                <h1>🎰 SLOT MACHINES</h1>
            </div>
            <a href="../index.php" class="btn btn-secondary btn-sm">← Back</a>
        </div>

        <!-- GAME STATS -->
        <div class="game-stats">
            <div class="stat-box">
                <div class="stat-label">Credits</div>
                <div class="stat-value" id="credits">1000</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Bet</div>
                <div class="stat-value text-primary" id="bet">10</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Payout</div>
                <div class="stat-value" id="winAmount" style="color: var(--accent-green);">0</div>
            </div>
        </div>

        <!-- GAME BOARD -->
        <div class="game-board">
            <!-- SLOT REELS -->
            <div class="slots-container">
                <div class="reel" id="reel1">🍒</div>
                <div class="reel" id="reel2">🍋</div>
                <div class="reel" id="reel3">🍊</div>
            </div>

            <!-- MESSAGE -->
            <div class="game-message" id="message">
                Place your bet and spin!
            </div>

            <!-- BET CONTROLS -->
            <div class="bet-controls">
                <button class="btn btn-secondary" onclick="decreaseBet()">- Bet</button>
                <button class="btn btn-secondary" onclick="increaseBet()">+ Bet</button>
            </div>

            <!-- SPIN BUTTON -->
            <button class="btn btn-primary btn-lg" id="spinBtn" onclick="spin()" style="width: 100%; margin-bottom: var(--spacing-md);">
                SPIN
            </button>

            <!-- CONTROL BUTTONS -->
            <div class="control-buttons">
                <button class="btn btn-secondary" onclick="resetCredits()">🔄 Reset</button>
                <button class="btn btn-secondary" onclick="toggleSound()" id="soundBtn">🔊 Sound</button>
            </div>
        </div>

        <!-- HOW TO PLAY -->
        <div class="card">
            <div class="card-header">
                <h3>How to Play</h3>
            </div>
            <div class="card-body">
                <ul class="how-to-list">
                    <li><strong>Set your bet:</strong> Use the +/- buttons to adjust your bet amount</li>
                    <li><strong>Click SPIN:</strong> Spin the reels to play</li>
                    <li><strong>Match symbols:</strong> Get matching symbols to win credits</li>
                    <li><strong>Payouts:</strong> 7️⃣ (100x), 👑 (75x), 💎 (50x), 🍊 (25x), 🍋 (20x), 🍒 (15x)</li>
                    <li><strong>Reset:</strong> Click Reset to restore credits to 1000</li>
                </ul>
            </div>
        </div>

        <!-- DISCLAIMER -->
        <div class="disclaimer">
            <strong>⚠ Disclaimer:</strong> This is a free-to-play game for entertainment only. No real money is involved. No prizes or winnings are given to players.
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2026 AYACHI Healthcare Pvt. Ltd. All rights reserved.</p>
                <p><span class="text-primary"><strong>FREE TO PLAY</strong></span> • No Real Money • No Prizes • Entertainment Only</p>
            </div>
        </div>
    </footer>

    <script src="../public/js/slots.js"></script>
</body>
</html>
