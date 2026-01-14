/**
 * PROFESSIONAL ROULETTE GAME ENGINE
 * Realistic European Roulette with Full Betting System
 */

// Roulette wheel configuration
const ROULETTE_CONFIG = {
    numbers: Array.from({ length: 37 }, (_, i) => i), // 0-36
    redNumbers: [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36],
    degreesPerNumber: 360 / 37, // ~9.73 degrees
};

// Game state
let gameState = {
    credits: 1000,
    bets: [],
    totalBet: 0,
    isSpinning: false,
    currentBetAmount: 10,
    lastWinAmount: 0,
};

// Red numbers for roulette
const RED_NUMBERS = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];

// Initialize game on page load
document.addEventListener('DOMContentLoaded', () => {
    initializeGame();
});

function initializeGame() {
    generateNumberGrid();
    updateDisplay();
}

/**
 * Generate the number grid for betting
 */
function generateNumberGrid() {
    const grid = document.getElementById('numberGrid');
    if (!grid) return;
    
    grid.innerHTML = '';
    
    // Add 0 first
    const zeroBtn = createNumberButton(0);
    grid.appendChild(zeroBtn);
    
    // Add 1-36
    for (let i = 1; i <= 36; i++) {
        const btn = createNumberButton(i);
        grid.appendChild(btn);
    }
}

/**
 * Create a number button for the grid
 */
function createNumberButton(number) {
    const btn = document.createElement('button');
    btn.className = 'number-btn';
    btn.textContent = number;
    
    if (number === 0) {
        btn.classList.add('green');
    } else if (RED_NUMBERS.includes(number)) {
        btn.classList.add('red');
    } else {
        btn.classList.add('black');
    }
    
    btn.onclick = () => placeBet('number', number.toString());
    return btn;
}

/**
 * Set the current bet amount
 */
function setBetAmount(amount) {
    gameState.currentBetAmount = amount;
    document.getElementById('customBetAmount').value = '';
}

/**
 * Place a bet
 */
function placeBet(type, label) {
    if (gameState.isSpinning) {
        showMessage('Cannot place bets while spinning!', 'error');
        return;
    }
    
    let betAmount = gameState.currentBetAmount;
    
    // Check for custom amount
    const customAmount = parseInt(document.getElementById('customBetAmount').value);
    if (customAmount && customAmount > 0) {
        betAmount = customAmount;
    }
    
    if (betAmount <= 0) {
        showMessage('Please select a valid bet amount!', 'error');
        return;
    }
    
    if (betAmount > gameState.credits) {
        showMessage('Insufficient credits!', 'error');
        return;
    }
    
    // Create bet object
    const bet = {
        id: Date.now() + Math.random(),
        type: type,
        label: label,
        amount: betAmount,
        payout: calculatePayout(type, betAmount),
    };
    
    // Add bet to list
    gameState.bets.push(bet);
    gameState.totalBet += betAmount;
    gameState.credits -= betAmount;
    
    updateDisplay();
    showMessage(`Bet placed: ${label} - ${betAmount} credits`, 'success');
}

/**
 * Calculate payout for a bet
 */
function calculatePayout(type, amount) {
    const payoutMultipliers = {
        'red': 2,
        'black': 2,
        'even': 2,
        'odd': 2,
        'low': 2,
        'high': 2,
        'number': 37, // 36:1 payout + original bet
    };
    
    const multiplier = payoutMultipliers[type] || 1;
    return amount * multiplier;
}

/**
 * Clear all bets
 */
function clearBets() {
    if (gameState.isSpinning) {
        showMessage('Cannot clear bets while spinning!', 'error');
        return;
    }
    
    // Refund all bets
    gameState.credits += gameState.totalBet;
    gameState.bets = [];
    gameState.totalBet = 0;
    gameState.lastWinAmount = 0;
    
    updateDisplay();
    showMessage('All bets cleared', 'info');
}

/**
 * Spin the wheel
 */
function spinWheel() {
    if (gameState.isSpinning) {
        showMessage('Wheel is already spinning!', 'error');
        return;
    }
    
    if (gameState.bets.length === 0) {
        showMessage('Place a bet first!', 'error');
        return;
    }
    
    gameState.isSpinning = true;
    const spinBtn = document.getElementById('spinBtn');
    const clearBtn = document.getElementById('clearBtn');
    spinBtn.disabled = true;
    clearBtn.disabled = true;
    spinBtn.textContent = 'SPINNING...';
    
    showMessage('Spinning...', 'info');
    playSpinSound();
    
    // Generate random winning number
    const winningNumber = Math.floor(Math.random() * 37);
    
    // Animate wheel
    animateWheel(winningNumber, () => {
        handleSpinResult(winningNumber);
        spinBtn.disabled = false;
        clearBtn.disabled = false;
        spinBtn.textContent = 'SPIN WHEEL';
        gameState.isSpinning = false;
    });
}

/**
 * Animate the wheel spin
 */
function animateWheel(winningNumber, callback) {
    const wheelImage = document.getElementById('wheelImage');
    const wheelContainer = document.getElementById('professionalWheel');
    const winningDisplay = document.getElementById('winningNumberDisplay');
    
    // Reset animation
    wheelImage.style.transition = 'none';
    wheelImage.style.transform = 'rotate(0deg)';
    
    // Trigger reflow to reset animation
    void wheelImage.offsetWidth;
    
    // Calculate rotation
    const numberPosition = (winningNumber * ROULETTE_CONFIG.degreesPerNumber) % 360;
    const fullRotations = 1800; // 5 full rotations
    const finalRotation = fullRotations + (360 - numberPosition);
    
    // Apply animation
    wheelImage.style.transition = 'transform 4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
    wheelImage.style.transform = `rotate(${finalRotation}deg)`;
    
    // Show winning number after spin
    setTimeout(() => {
        document.getElementById('winningNumber').textContent = winningNumber;
        playWinSound();
        if (callback) callback();
    }, 4000);
}

/**
 * Handle spin result and calculate payouts
 */
function handleSpinResult(winningNumber) {
    let totalPayout = 0;
    const winningBets = [];
    
    gameState.bets.forEach(bet => {
        let isWinning = false;
        let payout = 0;
        
        switch (bet.type) {
            case 'number':
                if (parseInt(bet.label) === winningNumber) {
                    isWinning = true;
                    payout = bet.amount * 36; // 36:1 payout
                }
                break;
            
            case 'red':
                if (RED_NUMBERS.includes(winningNumber)) {
                    isWinning = true;
                    payout = bet.amount * 2;
                }
                break;
            
            case 'black':
                if (!RED_NUMBERS.includes(winningNumber) && winningNumber !== 0) {
                    isWinning = true;
                    payout = bet.amount * 2;
                }
                break;
            
            case 'even':
                if (winningNumber !== 0 && winningNumber % 2 === 0) {
                    isWinning = true;
                    payout = bet.amount * 2;
                }
                break;
            
            case 'odd':
                if (winningNumber !== 0 && winningNumber % 2 === 1) {
                    isWinning = true;
                    payout = bet.amount * 2;
                }
                break;
            
            case 'low':
                if (winningNumber >= 1 && winningNumber <= 18) {
                    isWinning = true;
                    payout = bet.amount * 2;
                }
                break;
            
            case 'high':
                if (winningNumber >= 19 && winningNumber <= 36) {
                    isWinning = true;
                    payout = bet.amount * 2;
                }
                break;
        }
        
        if (isWinning) {
            totalPayout += payout;
            winningBets.push(bet);
        }
    });
    
    // Update credits
    gameState.credits += totalPayout;
    gameState.lastWinAmount = totalPayout;
    
    // Update display
    document.getElementById('winAmount').textContent = totalPayout;
    document.getElementById('credits').textContent = gameState.credits;
    
    // Show result message
    if (totalPayout > 0) {
        showMessage(`🎉 YOU WON ${totalPayout} CREDITS!`, 'win');
    } else {
        showMessage('No winning bets this round', 'lose');
    }
    
    // Clear bets for next round
    gameState.bets = [];
    gameState.totalBet = 0;
    updateDisplay();
}

/**
 * Update display elements
 */
function updateDisplay() {
    document.getElementById('credits').textContent = gameState.credits;
    document.getElementById('totalBet').textContent = gameState.totalBet;
    
    const betsList = document.getElementById('betsList');
    
    if (gameState.bets.length === 0) {
        betsList.innerHTML = '<p class="no-bets">No bets placed yet</p>';
    } else {
        betsList.innerHTML = '';
        gameState.bets.forEach((bet, index) => {
            const betItem = document.createElement('div');
            betItem.className = 'bet-item';
            betItem.innerHTML = `
                <div>
                    <span class="bet-item-type">${bet.label}</span>
                </div>
                <div class="bet-item-amount">${bet.amount} credits</div>
                <button class="bet-item-remove" onclick="removeBet(${index})">✕</button>
            `;
            betsList.appendChild(betItem);
        });
    }
}

/**
 * Remove a specific bet
 */
function removeBet(index) {
    if (gameState.isSpinning) return;
    
    const bet = gameState.bets[index];
    gameState.credits += bet.amount;
    gameState.totalBet -= bet.amount;
    gameState.bets.splice(index, 1);
    
    updateDisplay();
    showMessage('Bet removed', 'info');
}

/**
 * Show game message
 */
function showMessage(text, type = 'info') {
    const messageEl = document.getElementById('message');
    if (!messageEl) return;
    
    messageEl.textContent = text;
    messageEl.className = `game-message message-${type}`;
    
    // Auto-clear after 3 seconds
    setTimeout(() => {
        if (messageEl.textContent === text) {
            messageEl.textContent = 'Place your bets and spin!';
            messageEl.className = 'game-message';
        }
    }, 3000);
}

/**
 * Play spin sound effect
 */
function playSpinSound() {
    // Create a simple beep sound using Web Audio API
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.value = 400;
        oscillator.type = 'sine';
        
        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.1);
    } catch (e) {
        // Silently fail if Web Audio API not available
    }
}

/**
 * Play win sound effect
 */
function playWinSound() {
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const now = audioContext.currentTime;
        
        // Create a winning chord
        const frequencies = [523.25, 659.25, 783.99]; // C, E, G
        
        frequencies.forEach((freq, index) => {
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.value = freq;
            oscillator.type = 'sine';
            
            gainNode.gain.setValueAtTime(0.2, now);
            gainNode.gain.exponentialRampToValueAtTime(0.01, now + 0.3);
            
            oscillator.start(now + index * 0.05);
            oscillator.stop(now + 0.3);
        });
    } catch (e) {
        // Silently fail if Web Audio API not available
    }
}

// Add CSS for message types
const style = document.createElement('style');
style.textContent = `
    .message-info {
        color: #d4af37 !important;
    }
    
    .message-success {
        color: #00ff88 !important;
    }
    
    .message-win {
        color: #00ff88 !important;
        font-weight: 900;
        font-size: 1.2rem !important;
        animation: pulse 0.5s ease-in-out;
    }
    
    .message-error {
        color: #ff6b6b !important;
    }
    
    .message-lose {
        color: #ff6b6b !important;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
`;
document.head.appendChild(style);
