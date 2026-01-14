/**
 * BLACKJACK GAME - JavaScript Logic
 * Classic blackjack with dealer AI
 */

const SUITS = ['♠', '♥', '♦', '♣'];
const RANKS = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

let gameState = {
  credits: 1000,
  bet: 0,
  deck: [],
  playerCards: [],
  dealerCards: [],
  gamePhase: 'betting', // betting, playing, finished
  soundEnabled: true
};

// Initialize game
document.addEventListener('DOMContentLoaded', () => {
  updateDisplay();
});

function createDeck() {
  const deck = [];
  for (let suit of SUITS) {
    for (let rank of RANKS) {
      deck.push({ suit, rank });
    }
  }
  return deck.sort(() => Math.random() - 0.5);
}

function getCardValue(rank) {
  if (rank === 'A') return 11;
  if (['J', 'Q', 'K'].includes(rank)) return 10;
  return parseInt(rank);
}

function calculateHand(cards) {
  let total = cards.reduce((sum, card) => sum + getCardValue(card.rank), 0);
  let aces = cards.filter(c => c.rank === 'A').length;

  while (total > 21 && aces > 0) {
    total -= 10;
    aces--;
  }

  return total;
}

function updateDisplay() {
  document.getElementById('credits').textContent = gameState.credits;
  document.getElementById('bet').textContent = gameState.bet;

  // Render dealer cards
  const dealerCardsEl = document.getElementById('dealerCards');
  dealerCardsEl.innerHTML = gameState.dealerCards
    .map((card, idx) => `
      <div class="card ${gameState.gamePhase === 'finished' ? '' : (idx === 0 ? '' : 'back')}">
        ${gameState.gamePhase === 'finished' ? `<div>${card.rank}</div><div>${card.suit}</div>` : '?'}
      </div>
    `).join('');

  if (gameState.gamePhase === 'finished' && gameState.dealerCards.length > 0) {
    document.getElementById('dealerTotal').textContent = 'Total: ' + calculateHand(gameState.dealerCards);
  } else {
    document.getElementById('dealerTotal').textContent = '';
  }

  // Render player cards
  const playerCardsEl = document.getElementById('playerCards');
  playerCardsEl.innerHTML = gameState.playerCards
    .map(card => `
      <div class="card">
        <div>${card.rank}</div>
        <div>${card.suit}</div>
      </div>
    `).join('');

  if (gameState.playerCards.length > 0) {
    document.getElementById('playerTotal').textContent = 'Total: ' + calculateHand(gameState.playerCards);
  } else {
    document.getElementById('playerTotal').textContent = '';
  }

  // Show/hide buttons based on game phase
  document.getElementById('bettingOptions').style.display = gameState.gamePhase === 'betting' ? 'grid' : 'none';
  document.getElementById('actionButtons').style.display = gameState.gamePhase === 'playing' ? 'flex' : 'none';
  document.getElementById('newGameBtn').style.display = gameState.gamePhase === 'finished' ? 'block' : 'none';
}

function placeBet(amount) {
  if (gameState.credits < amount) {
    showMessage('Insufficient credits!', 'lose');
    return;
  }

  gameState.bet = amount;
  gameState.credits -= amount;
  startGame();
}

function startGame() {
  gameState.deck = createDeck();
  gameState.playerCards = [gameState.deck[0], gameState.deck[1]];
  gameState.dealerCards = [gameState.deck[2], gameState.deck[3]];
  gameState.deck = gameState.deck.slice(4);
  gameState.gamePhase = 'playing';

  showMessage('Hit or Stand?');
  playSound('deal');
  updateDisplay();
}

function hit() {
  if (gameState.deck.length === 0) {
    showMessage('No more cards!', 'lose');
    return;
  }

  gameState.playerCards.push(gameState.deck[0]);
  gameState.deck = gameState.deck.slice(1);
  playSound('deal');

  const playerTotal = calculateHand(gameState.playerCards);
  if (playerTotal > 21) {
    gameState.gamePhase = 'finished';
    showMessage('BUST! You went over 21!', 'lose');
    playSound('lose');
    setTimeout(() => finishGame(), 1500);
  }

  updateDisplay();
}

function stand() {
  playSound('deal');
  dealerPlay();
}

function dealerPlay() {
  while (calculateHand(gameState.dealerCards) < 17) {
    if (gameState.deck.length === 0) break;
    gameState.dealerCards.push(gameState.deck[0]);
    gameState.deck = gameState.deck.slice(1);
    playSound('deal');
  }

  finishGame();
}

function finishGame() {
  const playerTotal = calculateHand(gameState.playerCards);
  const dealerTotal = calculateHand(gameState.dealerCards);

  let result = '';
  let payout = 0;

  if (dealerTotal > 21) {
    result = 'Dealer busts! You earned credits!';
    payout = gameState.bet * 2;
    playSound('win');
  } else if (playerTotal > dealerTotal) {
    result = 'You earned credits!';
    payout = gameState.bet * 2;
    playSound('win');
  } else if (playerTotal === dealerTotal) {
    result = 'Push! Tie game.';
    payout = gameState.bet;
    playSound('deal');
  } else {
    result = 'Dealer earns this round!';
    payout = 0;
    playSound('lose');
  }

  showMessage(result, payout > 0 ? 'win' : 'lose');
  if (payout > 0) {
    gameState.credits += payout;
    document.getElementById('winAmount').textContent = payout;
  } else {
    document.getElementById('winAmount').textContent = '0';
  }

  gameState.gamePhase = 'finished';
  updateDisplay();
}

function newGame() {
  gameState.bet = 0;
  gameState.playerCards = [];
  gameState.dealerCards = [];
  gameState.gamePhase = 'betting';
  document.getElementById('winAmount').textContent = '0';
  showMessage('Place your bet to start');
  updateDisplay();
}

function resetCredits() {
  gameState.credits = 1000;
  newGame();
  showMessage('Credits reset to 1000!', 'win');
}

function toggleSound() {
  gameState.soundEnabled = !gameState.soundEnabled;
  document.getElementById('soundBtn').textContent = gameState.soundEnabled ? '🔊 Sound' : '🔇 Muted';
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
      deal: 600,
      win: 800,
      lose: 400
    };

    oscillator.frequency.value = frequencies[type] || 600;
    gainNode.gain.setValueAtTime(0.2, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
    
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.2);
  } catch (e) {
    console.log('Audio not supported');
  }
}
