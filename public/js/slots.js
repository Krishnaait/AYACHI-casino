/**
 * SLOTS GAME - JavaScript Logic
 * Realistic slot machine with spinning reels and win detection
 */

const SYMBOLS = ['🍒', '🍋', '🍊', '💎', '👑', '7️⃣'];
const WIN_COMBINATIONS = [
  { symbols: ['7️⃣', '7️⃣', '7️⃣'], payout: 100 },
  { symbols: ['👑', '👑', '👑'], payout: 75 },
  { symbols: ['💎', '💎', '💎'], payout: 50 },
  { symbols: ['🍊', '🍊', '🍊'], payout: 25 },
  { symbols: ['🍋', '🍋', '🍋'], payout: 20 },
  { symbols: ['🍒', '🍒', '🍒'], payout: 15 },
];

let gameState = {
  credits: 1000,
  bet: 10,
  spinning: false,
  soundEnabled: true,
  reels: ['🍒', '🍋', '🍊']
};

// Initialize game
document.addEventListener('DOMContentLoaded', () => {
  updateDisplay();
});

function updateDisplay() {
  document.getElementById('credits').textContent = gameState.credits;
  document.getElementById('bet').textContent = gameState.bet;
  document.getElementById('reel1').textContent = gameState.reels[0];
  document.getElementById('reel2').textContent = gameState.reels[1];
  document.getElementById('reel3').textContent = gameState.reels[2];
}

function decreaseBet() {
  if (gameState.bet > 1) {
    gameState.bet = Math.max(1, gameState.bet - 5);
    updateDisplay();
  }
}

function increaseBet() {
  if (gameState.bet < gameState.credits) {
    gameState.bet = Math.min(gameState.credits, gameState.bet + 5);
    updateDisplay();
  }
}

function spin() {
  if (gameState.spinning) return;
  
  if (gameState.credits < gameState.bet) {
    showMessage('Insufficient credits!', 'lose');
    return;
  }

  gameState.spinning = true;
  gameState.credits -= gameState.bet;
  updateDisplay();
  
  const spinBtn = document.getElementById('spinBtn');
  spinBtn.disabled = true;
  spinBtn.textContent = 'SPINNING...';
  
  playSound('spin');
  
  // Animate spinning
  let spinCount = 0;
  const spinInterval = setInterval(() => {
    gameState.reels[0] = SYMBOLS[Math.floor(Math.random() * SYMBOLS.length)];
    gameState.reels[1] = SYMBOLS[Math.floor(Math.random() * SYMBOLS.length)];
    gameState.reels[2] = SYMBOLS[Math.floor(Math.random() * SYMBOLS.length)];
    updateDisplay();
    spinCount++;

    if (spinCount > 20) {
      clearInterval(spinInterval);
      
      // Get final result
      const finalReels = [
        SYMBOLS[Math.floor(Math.random() * SYMBOLS.length)],
        SYMBOLS[Math.floor(Math.random() * SYMBOLS.length)],
        SYMBOLS[Math.floor(Math.random() * SYMBOLS.length)]
      ];
      gameState.reels = finalReels;
      updateDisplay();

      // Check for win
      const winCombo = WIN_COMBINATIONS.find(combo =>
        combo.symbols[0] === finalReels[0] &&
        combo.symbols[1] === finalReels[1] &&
        combo.symbols[2] === finalReels[2]
      );

      if (winCombo) {
        const payout = winCombo.payout * gameState.bet;
        gameState.credits += payout;
        document.getElementById('winAmount').textContent = payout;
        showMessage(`🎉 Great! You earned ${payout} credits!`, 'win');
        playSound('win');
      } else {
        document.getElementById('winAmount').textContent = '0';
        showMessage('No match this time. Try again!', 'lose');
        playSound('lose');
      }

      updateDisplay();
      gameState.spinning = false;
      spinBtn.disabled = false;
      spinBtn.textContent = 'SPIN';
    }
  }, 100);
}

function resetCredits() {
  gameState.credits = 1000;
  gameState.reels = ['🍒', '🍋', '🍊'];
  document.getElementById('winAmount').textContent = '0';
  showMessage('Credits reset to 1000!', 'win');
  updateDisplay();
}

function toggleSound() {
  gameState.soundEnabled = !gameState.soundEnabled;
  const btn = document.getElementById('soundBtn');
  btn.textContent = gameState.soundEnabled ? '🔊 Sound' : '🔇 Muted';
}

function showMessage(text, type = 'info') {
  const messageEl = document.getElementById('message');
  messageEl.textContent = text;
  messageEl.className = 'game-message ' + type;
}

function playSound(type) {
  if (!gameState.soundEnabled) return;

  try {
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const oscillator = audioContext.createOscillator();
    const gainNode = audioContext.createGain();

    oscillator.connect(gainNode);
    gainNode.connect(audioContext.destination);

    const frequencies = {
      spin: 400,
      win: 800,
      lose: 200
    };

    oscillator.frequency.value = frequencies[type] || 400;
    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
    
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.1);
  } catch (e) {
    console.log('Audio not supported');
  }
}
