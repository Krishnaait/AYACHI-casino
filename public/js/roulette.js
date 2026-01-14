/**
 * ROULETTE GAME - JavaScript Logic
 * European roulette with 37 numbers (0-36)
 */

const RED_NUMBERS = [1, 3, 5, 7, 9, 12, 14, 16, 18, 19, 21, 23, 25, 27, 30, 32, 34, 36];
const ROULETTE_NUMBERS = Array.from({ length: 37 }, (_, i) => i);

let gameState = {
  credits: 1000,
  spinning: false,
  soundEnabled: true,
  bets: [],
  totalBet: 0,
  result: null
};

// Initialize game
document.addEventListener('DOMContentLoaded', () => {
  generateNumberButtons();
  updateDisplay();
});

function generateNumberButtons() {
  const grid = document.getElementById('numberGrid');
  ROULETTE_NUMBERS.forEach(num => {
    const btn = document.createElement('button');
    btn.className = 'number-btn btn btn-secondary';
    btn.textContent = num;
    
    if (num === 0) {
      btn.classList.add('green');
    } else if (RED_NUMBERS.includes(num)) {
      btn.classList.add('red');
    }
    
    btn.onclick = () => addBet('number', num, 36);
    grid.appendChild(btn);
  });
}

function updateDisplay() {
  document.getElementById('credits').textContent = gameState.credits;
  document.getElementById('totalBet').textContent = gameState.totalBet;
  
  const betsList = document.getElementById('betsList');
  const selectedBets = document.getElementById('selectedBets');
  
  if (gameState.bets.length > 0) {
    selectedBets.style.display = 'block';
    betsList.innerHTML = gameState.bets
      .map(b => `<div style="margin-bottom: 4px;">${b.type} ${b.value} - ${b.amount} credits</div>`)
      .join('');
  } else {
    selectedBets.style.display = 'none';
  }
}

function addBet(type, value, payout) {
  if (gameState.spinning) return;
  
  const amount = 10;
  if (gameState.credits < amount) {
    showMessage('Insufficient credits!', 'lose');
    return;
  }

  gameState.bets.push({ type, value, amount, payout });
  gameState.credits -= amount;
  gameState.totalBet += amount;
  showMessage(`Bet placed: ${type} ${value}`);
  updateDisplay();
}

function clearBets() {
  if (gameState.spinning) return;
  
  const refund = gameState.bets.reduce((sum, bet) => sum + bet.amount, 0);
  gameState.credits += refund;
  gameState.bets = [];
  gameState.totalBet = 0;
  showMessage('All bets cleared');
  updateDisplay();
}

function spinWheel() {
  if (gameState.spinning) return;
  
  if (gameState.bets.length === 0) {
    showMessage('Place a bet first!', 'lose');
    return;
  }

  gameState.spinning = true;
  const spinBtn = document.getElementById('spinBtn');
  spinBtn.disabled = true;
  spinBtn.textContent = 'SPINNING...';
  
  showMessage('Spinning...');
  playSound('spin');
  
  const winningNumber = Math.floor(Math.random() * 37);
  gameState.result = winningNumber;
  
  if (typeof professionalWheel !== 'undefined') {
    professionalWheel.spin(winningNumber, () => {
      handleSpinResult(winningNumber, spinBtn);
    });
  } else {
    setTimeout(() => {
      handleSpinResult(winningNumber, spinBtn);
    }, 4000);
  }
}

function handleSpinResult(winningNumber, spinBtn) {
  const wheel = document.getElementById('wheel');
  if (wheel) {
    wheel.textContent = winningNumber;
    
    // Calculate winnings
    let payout = 0;
    gameState.bets.forEach(bet => {
      if (bet.type === 'number' && bet.value === winningNumber) {
        payout += bet.amount * 36;
      } else if (bet.type === 'red' && RED_NUMBERS.includes(winningNumber)) {
        payout += bet.amount * 2;
      } else if (bet.type === 'black' && !RED_NUMBERS.includes(winningNumber) && winningNumber !== 0) {
        payout += bet.amount * 2;
      } else if (bet.type === 'even' && winningNumber !== 0 && winningNumber % 2 === 0) {
        payout += bet.amount * 2;
      } else if (bet.type === 'odd' && winningNumber % 2 === 1) {
        payout += bet.amount * 2;
      } else if (bet.type === '1to18' && winningNumber >= 1 && winningNumber <= 18) {
        payout += bet.amount * 2;
      } else if (bet.type === '19to36' && winningNumber >= 19 && winningNumber <= 36) {
        payout += bet.amount * 2;
      }
    });

    if (payout > 0) {
      gameState.credits += payout;
      document.getElementById('winAmount').textContent = payout;
      showMessage(`🎉 Winning number: ${winningNumber}! You earned ${payout} credits!`, 'win');
      playSound('win');
    } else {
      document.getElementById('winAmount').textContent = '0';
      showMessage(`Winning number: ${winningNumber}. Try again!`, 'lose');
    }

    gameState.spinning = false;
    gameState.bets = [];
    gameState.totalBet = 0;
    spinBtn.disabled = false;
    spinBtn.textContent = 'SPIN WHEEL';
    updateDisplay();
}

function resetCredits() {
  gameState.credits = 1000;
  gameState.bets = [];
  gameState.totalBet = 0;
  gameState.result = null;
  document.getElementById('wheel').textContent = '?';
  document.getElementById('winAmount').textContent = '0';
  if (typeof professionalWheel !== 'undefined') {
    professionalWheel.reset();
  }
  showMessage('Credits reset to 1000!', 'win');
  updateDisplay();
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
      spin: 500,
      win: 800,
      lose: 400
    };

    oscillator.frequency.value = frequencies[type] || 500;
    gainNode.gain.setValueAtTime(0.2, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
    
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.3);
  } catch (e) {
    console.log('Audio not supported');
  }
}
