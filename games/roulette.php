<?php
/**
 * ROULETTE GAME - AYACHI Casino
 * Professional European Roulette with URL-based State Management
 * HTML + PHP + CSS Only (No JavaScript)
 */

// Roulette configuration
$RED_NUMBERS = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
$ALL_NUMBERS = range(0, 36);

// Initialize game state from URL or default
$credits = isset($_GET['credits']) ? intval($_GET['credits']) : 1000;
$bets_json = isset($_GET['bets']) ? $_GET['bets'] : '[]';
$bets = json_decode($bets_json, true) ?? [];
$total_bet = array_sum(array_column($bets, 'amount'));
$last_spin = isset($_GET['last_spin']) ? intval($_GET['last_spin']) : null;
$message = isset($_GET['message']) ? urldecode($_GET['message']) : '';
$last_payout = isset($_GET['last_payout']) ? intval($_GET['last_payout']) : 0;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'place_bet') {
        $bet_type = $_POST['bet_type'] ?? '';
        $bet_amount = intval($_POST['bet_amount'] ?? 0);
        
        if ($bet_amount > 0 && $bet_amount <= $credits) {
            $new_bet = [
                'type' => $bet_type,
                'amount' => $bet_amount,
                'label' => getBetLabel($bet_type),
                'payout_multiplier' => getPayoutMultiplier($bet_type)
            ];
            
            $bets[] = $new_bet;
            $credits -= $bet_amount;
            $message = "✅ Bet placed: " . $new_bet['label'] . " - " . $bet_amount . " credits";
        } else {
            $message = "❌ Invalid bet amount or insufficient credits";
        }
        
        // Redirect to update URL
        $bets_json = json_encode($bets);
        $redirect_url = "?credits=" . $credits . "&bets=" . urlencode($bets_json) . "&message=" . urlencode($message);
        if ($last_spin !== null) $redirect_url .= "&last_spin=" . $last_spin;
        header("Location: " . $redirect_url);
        exit;
    } 
    elseif ($action === 'spin') {
        if (count($bets) > 0) {
            $winning_number = rand(0, 36);
            
            // Calculate payouts
            $total_payout = 0;
            foreach ($bets as $bet) {
                if (checkWinningBet($bet, $winning_number, $RED_NUMBERS)) {
                    $payout = $bet['amount'] * $bet['payout_multiplier'];
                    $total_payout += $payout;
                }
            }
            
            $credits += $total_payout;
            $last_spin = $winning_number;
            $last_payout = $total_payout;
            
            if ($total_payout > 0) {
                $message = "🎉 YOU WON " . $total_payout . " CREDITS! Winning number: " . $winning_number;
            } else {
                $message = "❌ No winning bets. Winning number was: " . $winning_number;
            }
            
            // Clear bets for next round
            $bets = [];
        } else {
            $message = "⚠️ Place a bet first!";
        }
        
        // Redirect to update URL
        $bets_json = json_encode($bets);
        $redirect_url = "?credits=" . $credits . "&bets=" . urlencode($bets_json) . "&last_spin=" . $last_spin . "&last_payout=" . $last_payout . "&message=" . urlencode($message);
        header("Location: " . $redirect_url);
        exit;
    }
    elseif ($action === 'clear_bets') {
        $credits += $total_bet;
        $bets = [];
        $message = "✅ All bets cleared";
        
        // Redirect to update URL
        $bets_json = json_encode($bets);
        $redirect_url = "?credits=" . $credits . "&bets=" . urlencode($bets_json) . "&message=" . urlencode($message);
        if ($last_spin !== null) $redirect_url .= "&last_spin=" . $last_spin;
        header("Location: " . $redirect_url);
        exit;
    }
    elseif ($action === 'reset') {
        $credits = 1000;
        $bets = [];
        $last_spin = null;
        $last_payout = 0;
        $message = "✅ Game reset - 1000 credits restored";
        
        // Redirect to clean URL
        header("Location: ?credits=1000&bets=[]&message=" . urlencode($message));
        exit;
    }
}

// Helper functions
function getBetLabel($bet_type) {
    $labels = [
        'red' => '🔴 Red',
        'black' => '⚫ Black',
        'even' => '🔢 Even',
        'odd' => '🔢 Odd',
        'low' => '📊 1-18',
        'high' => '📊 19-36',
    ];
    
    if (strpos($bet_type, 'number_') === 0) {
        $num = substr($bet_type, 7);
        return "# " . $num;
    }
    
    return $labels[$bet_type] ?? $bet_type;
}

function getPayoutMultiplier($bet_type) {
    if (strpos($bet_type, 'number_') === 0) {
        return 36; // 36:1 for straight numbers
    }
    return 2; // 1:1 payout (returns 2x)
}

function checkWinningBet($bet, $winning_number, $RED_NUMBERS) {
    $bet_type = $bet['type'];
    
    if (strpos($bet_type, 'number_') === 0) {
        $num = intval(substr($bet_type, 7));
        return $num === $winning_number;
    }
    
    switch ($bet_type) {
        case 'red':
            return in_array($winning_number, $RED_NUMBERS);
        case 'black':
            return !in_array($winning_number, $RED_NUMBERS) && $winning_number !== 0;
        case 'even':
            return $winning_number !== 0 && $winning_number % 2 === 0;
        case 'odd':
            return $winning_number !== 0 && $winning_number % 2 === 1;
        case 'low':
            return $winning_number >= 1 && $winning_number <= 18;
        case 'high':
            return $winning_number >= 19 && $winning_number <= 36;
    }
    
    return false;
}

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
                <p class="game-description">
                    European Roulette - Predict where the ball will land on the spinning wheel and earn credits. 
                    Experience the elegance and excitement of this classic casino game with multiple betting options.
                </p>
            </div>
        </div>

        <!-- GAME IMAGE AND HISTORY SECTION -->
        <div class="game-image-history-section">
            <div class="game-image-container">
                <img src="/public/images/game_roulette.webp" alt="Roulette Game" class="game-featured-image">
            </div>
            <div class="game-history-container">
                <h3 class="history-title">History of Roulette</h3>
                <div class="history-content">
                    <p>Roulette has a fascinating history that dates back to 17th-century France. The game was invented by mathematician Blaise Pascal, who was trying to create a perpetual motion machine. Instead, he accidentally created one of the most iconic casino games in the world.</p>
                    <p>The name "roulette" comes from the French word meaning "little wheel." The game became extremely popular in France during the 18th century and eventually spread throughout Europe and the world. It became a staple of Monte Carlo and other famous casinos.</p>
                    <p>The modern roulette wheel was developed in the 19th century, with the addition of the "0" pocket to give the house an edge. American roulette later added a "00" pocket, increasing the house advantage even further.</p>
                    <p>Today, roulette remains one of the most beloved casino games, known for its simplicity, elegance, and the thrill of watching the ball spin around the wheel. The game's enduring appeal lies in its combination of chance, strategy, and the excitement of anticipation.</p>
                </div>
            </div>
        </div>

        <!-- GAME MESSAGE SECTION -->
        <?php if (!empty($message)): ?>
        <div class="game-message-banner">
            <div class="message-content">
                <?php echo htmlspecialchars($message); ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- MAIN GAME CONTAINER -->
        <div class="game-container-professional">
            
            <!-- LEFT SIDE - GAME BOARD -->
            <div class="game-board-section">
                
                <!-- PLAYER STATS BAR -->
                <div class="game-stats-bar">
                    <div class="stat-item">
                        <span class="stat-label">Credits</span>
                        <span class="stat-value"><?php echo $credits; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Total Bet</span>
                        <span class="stat-value"><?php echo $total_bet; ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-label">Last Spin</span>
                        <span class="stat-value payout-value">
                            <?php echo ($last_spin !== null) ? $last_spin : '—'; ?>
                        </span>
                    </div>
                </div>

                <!-- ROULETTE WHEEL DISPLAY -->
                <div class="wheel-section">
                    <div class="wheel-container">
                        <div class="professional-wheel" id="professionalWheel">
                            <img src="/public/images/roulette-wheel-professional.webp" alt="Roulette Wheel" class="wheel-image">
                            <div class="ball-indicator"></div>
                            <div class="winning-number-display">
                                <div class="winning-number">
                                    <?php echo ($last_spin !== null) ? $last_spin : '?'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="game-message">
                        <?php echo (count($bets) > 0) ? 'Ready to spin!' : 'Place your bets and spin!'; ?>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="game-action-buttons">
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="action" value="spin">
                        <button type="submit" class="btn btn-primary btn-lg" <?php echo (count($bets) === 0) ? 'disabled' : ''; ?>>
                            SPIN WHEEL
                        </button>
                    </form>
                    
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="action" value="clear_bets">
                        <button type="submit" class="btn btn-secondary btn-lg" <?php echo (count($bets) === 0) ? 'disabled' : ''; ?>>
                            CLEAR BETS
                        </button>
                    </form>
                    
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="action" value="reset">
                        <button type="submit" class="btn btn-secondary btn-lg">
                            🔄 RESET
                        </button>
                    </form>
                </div>
            </div>

            <!-- RIGHT SIDE - BETTING PANEL -->
            <div class="betting-panel-section">
                
                <!-- BETTING OPTIONS -->
                <div class="betting-options">
                    <h3 class="betting-title">PLACE YOUR BETS</h3>
                    
                    <!-- QUICK BETS -->
                    <div class="quick-bets">
                        <h4>Quick Bets (1:1 Payout)</h4>
                        <div class="quick-bets-grid">
                            <form method="POST" class="quick-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="red">
                                <input type="hidden" name="bet_amount" value="50">
                                <button type="submit" class="quick-bet-btn">🔴 RED - 50</button>
                            </form>
                            
                            <form method="POST" class="quick-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="black">
                                <input type="hidden" name="bet_amount" value="50">
                                <button type="submit" class="quick-bet-btn">⚫ BLACK - 50</button>
                            </form>
                            
                            <form method="POST" class="quick-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="even">
                                <input type="hidden" name="bet_amount" value="50">
                                <button type="submit" class="quick-bet-btn">🔢 EVEN - 50</button>
                            </form>
                            
                            <form method="POST" class="quick-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="odd">
                                <input type="hidden" name="bet_amount" value="50">
                                <button type="submit" class="quick-bet-btn">🔢 ODD - 50</button>
                            </form>
                            
                            <form method="POST" class="quick-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="low">
                                <input type="hidden" name="bet_amount" value="50">
                                <button type="submit" class="quick-bet-btn">📊 1-18 - 50</button>
                            </form>
                            
                            <form method="POST" class="quick-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="high">
                                <input type="hidden" name="bet_amount" value="50">
                                <button type="submit" class="quick-bet-btn">📊 19-36 - 50</button>
                            </form>
                        </div>
                    </div>

                    <!-- NUMBER GRID -->
                    <div class="number-grid-section">
                        <h4>Select Numbers (36:1 Payout)</h4>
                        <div class="number-grid">
                            <?php foreach ($ALL_NUMBERS as $num): ?>
                            <form method="POST" class="number-bet-form">
                                <input type="hidden" name="action" value="place_bet">
                                <input type="hidden" name="bet_type" value="number_<?php echo $num; ?>">
                                <input type="hidden" name="bet_amount" value="25">
                                <button type="submit" class="number-btn <?php echo (in_array($num, $RED_NUMBERS)) ? 'red' : (($num === 0) ? 'green' : 'black'); ?>">
                                    <?php echo $num; ?>
                                </button>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- PLACED BETS DISPLAY -->
                <div class="placed-bets-container">
                    <h3 class="bets-title">YOUR BETS (<?php echo count($bets); ?>)</h3>
                    <div class="bets-list">
                        <?php if (count($bets) === 0): ?>
                            <p class="no-bets">No bets placed yet</p>
                        <?php else: ?>
                            <?php foreach ($bets as $index => $bet): ?>
                            <div class="bet-item">
                                <div>
                                    <span class="bet-item-type"><?php echo htmlspecialchars($bet['label']); ?></span>
                                </div>
                                <div class="bet-item-amount"><?php echo $bet['amount']; ?> credits</div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
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

    <!-- ROULETTE STYLES -->
    <style>
        .game-message-banner {
            max-width: 1400px;
            margin: 1rem auto;
            padding: 1rem;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
            border: 2px solid rgba(212, 175, 55, 0.4);
            border-radius: 8px;
            text-align: center;
        }

        .message-content {
            color: #d4af37;
            font-weight: 600;
            font-size: 1rem;
        }

        .game-container-professional {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .game-board-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .game-stats-bar {
            display: flex;
            justify-content: space-around;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
            border: 2px solid rgba(212, 175, 55, 0.3);
            padding: 1.5rem;
            border-radius: 12px;
            gap: 2rem;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 1.8rem;
            color: #d4af37;
            font-weight: 700;
            font-family: 'Courier New', monospace;
        }

        .payout-value {
            color: #00ff88;
        }

        .wheel-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            background: linear-gradient(135deg, rgba(13, 42, 34, 0.8), rgba(11, 83, 69, 0.8));
            border: 2px solid rgba(212, 175, 55, 0.3);
            padding: 2rem;
            border-radius: 12px;
        }

        .wheel-container {
            position: relative;
            width: 350px;
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .professional-wheel {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wheel-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.4));
        }

        .ball-indicator {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            background: radial-gradient(circle at 30% 30%, #ffffff, #d4af37);
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.8), inset -2px -2px 5px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        .winning-number-display {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #d4af37, #f0d570);
            border: 3px solid #ffffff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.8);
            z-index: 5;
        }

        .winning-number {
            font-size: 1.8rem;
            font-weight: 900;
            color: #0d2a22;
            font-family: 'Courier New', monospace;
        }

        .game-message {
            font-size: 1.1rem;
            color: #d4af37;
            text-align: center;
            font-weight: 600;
            min-height: 1.5rem;
        }

        .game-action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #d4af37, #f0d570);
            color: #0d2a22;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.4);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.6);
        }

        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-secondary {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(212, 175, 55, 0.1));
            color: #d4af37;
            border: 2px solid rgba(212, 175, 55, 0.4);
        }

        .btn-secondary:hover:not(:disabled) {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), rgba(212, 175, 55, 0.2));
            border-color: #d4af37;
        }

        .btn-lg {
            padding: 15px 40px;
            font-size: 1.1rem;
        }

        /* BETTING PANEL */
        .betting-panel-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .betting-options {
            background: linear-gradient(135deg, rgba(13, 42, 34, 0.9), rgba(11, 83, 69, 0.9));
            border: 2px solid rgba(212, 175, 55, 0.3);
            padding: 1.5rem;
            border-radius: 12px;
        }

        .betting-title {
            font-family: 'Cinzel', serif;
            font-size: 1.3rem;
            color: #d4af37;
            margin: 0 0 1rem 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .quick-bets {
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .quick-bets h4 {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .quick-bets-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.6rem;
        }

        .quick-bet-form {
            margin: 0;
        }

        .quick-bet-btn {
            display: block;
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
            border: 2px solid rgba(212, 175, 55, 0.3);
            color: rgba(255, 255, 255, 0.9);
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.9rem;
            font-family: inherit;
        }

        .quick-bet-btn:hover {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.3), rgba(212, 175, 55, 0.2));
            border-color: #d4af37;
            color: #d4af37;
            transform: translateX(5px);
        }

        .number-grid-section {
            margin-top: 1rem;
        }

        .number-grid-section h4 {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .number-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 0.4rem;
            max-height: 200px;
            overflow-y: auto;
            padding: 0.5rem;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 6px;
        }

        .number-bet-form {
            margin: 0;
        }

        .number-btn {
            padding: 0.6rem;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
            border: 2px solid rgba(212, 175, 55, 0.3);
            color: rgba(255, 255, 255, 0.8);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.85rem;
            font-family: inherit;
        }

        .number-btn:hover {
            background: linear-gradient(135deg, #d4af37, #f0d570);
            color: #0d2a22;
            border-color: #d4af37;
            transform: scale(1.1);
        }

        .number-btn.red {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.3), rgba(220, 53, 69, 0.1));
            border-color: rgba(220, 53, 69, 0.5);
            color: #ff6b6b;
        }

        .number-btn.red:hover {
            background: linear-gradient(135deg, #ff6b6b, #ff8787);
            border-color: #ff6b6b;
            color: #ffffff;
        }

        .number-btn.black {
            background: linear-gradient(135deg, rgba(50, 50, 50, 0.3), rgba(50, 50, 50, 0.1));
            border-color: rgba(100, 100, 100, 0.5);
            color: #a0a0a0;
        }

        .number-btn.black:hover {
            background: linear-gradient(135deg, #333333, #555555);
            border-color: #888888;
            color: #ffffff;
        }

        .number-btn.green {
            background: linear-gradient(135deg, rgba(0, 200, 100, 0.3), rgba(0, 200, 100, 0.1));
            border-color: rgba(0, 200, 100, 0.5);
            color: #00ff88;
        }

        .number-btn.green:hover {
            background: linear-gradient(135deg, #00ff88, #00dd77);
            border-color: #00ff88;
            color: #0d2a22;
        }

        /* PLACED BETS */
        .placed-bets-container {
            background: linear-gradient(135deg, rgba(13, 42, 34, 0.9), rgba(11, 83, 69, 0.9));
            border: 2px solid rgba(212, 175, 55, 0.3);
            padding: 1.5rem;
            border-radius: 12px;
            max-height: 300px;
            overflow-y: auto;
        }

        .bets-title {
            font-family: 'Cinzel', serif;
            font-size: 1.1rem;
            color: #d4af37;
            margin: 0 0 1rem 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .bets-list {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .no-bets {
            color: rgba(255, 255, 255, 0.5);
            text-align: center;
            font-style: italic;
            padding: 1rem;
            margin: 0;
        }

        .bet-item {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 0.8rem;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }

        .bet-item-type {
            font-weight: 600;
            color: #d4af37;
        }

        .bet-item-amount {
            font-family: 'Courier New', monospace;
            font-weight: 700;
            color: #00ff88;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .game-container-professional {
                grid-template-columns: 1fr;
            }

            .wheel-container {
                width: 300px;
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .game-stats-bar {
                flex-direction: column;
                gap: 1rem;
            }

            .quick-bets-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .number-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .wheel-container {
                width: 250px;
                height: 250px;
            }

            .game-action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <?php include '../includes/footer.php'; ?>
