<?php
/**
 * POKER GAME - AYACHI Casino
 * HTML, CSS, PHP with Vanilla JavaScript
 * 5-card draw poker with hand rankings
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker - AYACHI Casino</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/games.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="container">
            <div class="logo">
                <div class="logo-icon">AY</div>
                <span>POKER</span>
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
                <h1>♠️ POKER</h1>
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
                <div class="stat-label">Current Bet</div>
                <div class="stat-value text-primary" id="bet">0</div>
            </div>
            <div class="stat-box">
                <div class="stat-label">Payout</div>
                <div class="stat-value" id="winAmount" style="color: var(--accent-green);">0</div>
            </div>
        </div>

        <!-- POKER TABLE -->
        <div class="poker-table">
            <!-- DEALER HAND -->
            <div class="dealer-hand">
                <div class="hand-label">DEALER</div>
                <div class="cards-display" id="dealerCards"></div>
                <div class="hand-ranking" id="dealerRanking"></div>
            </div>

            <!-- MESSAGE -->
            <div class="game-message" id="message">
                Place your bet to start
            </div>

            <!-- PLAYER HAND -->
            <div class="player-hand">
                <div class="hand-label">YOUR HAND (Click to discard)</div>
                <div class="cards-display" id="playerCards"></div>
                <div class="hand-ranking" id="playerRanking"></div>
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
            <button class="btn btn-primary" id="drawBtn" onclick="drawCards()">DRAW (0)</button>
            <button class="btn btn-secondary" onclick="keepAll()">KEEP ALL</button>
        </div>

        <div id="newGameBtn" style="display: none;">
            <button class="btn btn-primary btn-lg" onclick="newGame()" style="width: 100%;">NEW GAME</button>
        </div>

        <!-- CONTROL BUTTONS -->
        <div class="control-buttons" style="margin-top: var(--spacing-lg);">
            <button class="btn btn-secondary" onclick="resetCredits()">🔄 Reset</button>
            <button class="btn btn-secondary" onclick="toggleSound()" id="soundBtn">🔊 Sound</button>
        </div>

        <!-- HAND RANKINGS -->
        <div class="card">
            <div class="card-header">
                <h3>Hand Rankings (Best to Worst)</h3>
            </div>
            <div class="card-body">
                <div class="rankings-grid">
                    <div class="ranking-item">
                        <strong>1. Royal Flush</strong>
                        <p>Straight flush (highest)</p>
                    </div>
                    <div class="ranking-item">
                        <strong>2. Four of a Kind</strong>
                        <p>Four cards of same rank</p>
                    </div>
                    <div class="ranking-item">
                        <strong>3. Full House</strong>
                        <p>Three of a kind + pair</p>
                    </div>
                    <div class="ranking-item">
                        <strong>4. Flush</strong>
                        <p>Five cards of same suit</p>
                    </div>
                    <div class="ranking-item">
                        <strong>5. Straight</strong>
                        <p>Five consecutive cards</p>
                    </div>
                    <div class="ranking-item">
                        <strong>6. Three of a Kind</strong>
                        <p>Three cards of same rank</p>
                    </div>
                </div>
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

    <script src="../public/js/poker.js"></script>
</body>
</html>
