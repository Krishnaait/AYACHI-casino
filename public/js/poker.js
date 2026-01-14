/**
 * POKER GAME - JavaScript Logic
 * 5-card draw poker with hand rankings
 */

const SUITS = ['♠', '♥', '♦', '♣'];
const RANKS = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

let gameState = {
  credits: 1000,
  bet: 0,
  deck: [],
  playerCards: [],
  dealerCards: [],
  selectedToDiscard: [],
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
      let value = 0;
      if (rank === 'A') value = 14;
      else if (rank === 'K') value = 13;
      else if (rank === 'Q') value = 12;
      else if (rank === 'J') value = 11;
      else value = parseInt(rank);
      deck.push({ suit, rank, value });
    }
  }
  return deck.sort(() => Math.random() - 0.5);
}

function getHandRanking(cards) {
  const sorted = [...cards].sort((a, b) => b.value - a.value);
  const values = sorted.map(c => c.value);
  const suits = sorted.map(c => c.suit);

  const isFlush = suits.every(s => s === suits[0]);
  const isStraight = values[0] - values[1] === 1 && values[1] - values[2] === 1 && 
                     values[2] - values[3] === 1 && values[3] - values[4] === 1;

  const counts = {};
  values.forEach(v => {
    counts[v] = (counts[v] || 0) + 1;
  });
  const countValues = Object.values(counts).sort((a, b) => b - a);

  if (isStraight && isFlush) return { name: 'Royal Flush', value: 8 };
  if (isStraight) return { name: 'Straight', value: 5 };
  if (isFlush) return { name: 'Flush', value: 6 };
  if (countValues[0] === 4) return { name: 'Four of a Kind', value: 7 };
  if (countValues[0] === 3 && countValues[1] === 2) return { name: 'Full House', value: 7 };
  if (countValues[0] === 3) return { name: 'Three of a Kind', value: 4 };
  if (countValues[0] === 2 && countValues[1] === 2) return { name: 'Two Pair', value: 3 };
  if (countValues[0] === 2) return { name: 'One Pair', value: 2 };
  return { name: 'High Card', value: 1 };
}

function updateDisplay() {
  document.getElementById('credits').textContent = gameState.credits;
  document.getElementById('bet').textContent = gameState.bet;

  // Render dealer cards
  const dealerCardsEl = document.getElementById('dealerCards');
  dealerCardsEl.innerHTML = gameState.dealerCards
    .map((card, idx) => `
      <div class="card ${gameState.gamePhase === 'finished' ? '' : 'back'}">
        ${gameState.gamePhase === 'finished' ? `<div>${card.rank}</div><div>${card.suit}</div>` : '?'}
      </div>
    `).join('');

  if (gameState.gamePhase === 'finished' && gameState.dealerCards.length > 0) {
    const dealerRanking = getHandRanking(gameState.dealerCards);
    document.getElementById('dealerRanking').textContent = dealerRanking.name;
  } else {
    document.getElementById('dealerRanking').textContent = '';
  }

  // Render player cards
  const playerCardsEl = document.getElementById('playerCards');
  playerCardsEl.innerHTML = gameState.playerCards
    .map((card, idx) => `
      <div class="card poker-card ${gameState.selectedToDiscard.includes(idx) ? 'selected' : ''}" 
           onclick="toggleCardSelection(${idx})" style="cursor: ${gameState.gamePhase === 'playing' ? 'pointer' : 'default'};">
        <div>${card.rank}</div>
        <div>${card.suit}</div>
      </div>
    `).join('');

  if (gameState.playerCards.length > 0) {
    const playerRanking = getHandRanking(gameState.playerCards);
    document.getElementById('playerRanking').textContent = playerRanking.name;
  } else {
    document.getElementById('playerRanking').textContent = '';
  }

  // Update draw button
  const drawBtn = document.getElementById('drawBtn');
  if (drawBtn) {
    drawBtn.textContent = `DRAW (${gameState.selectedToDiscard.length})`;
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
  gameState.playerCards = gameState.deck.slice(0, 5);
  gameState.dealerCards = gameState.deck.slice(5, 10);
  gameState.deck = gameState.deck.slice(10);
  gameState.gamePhase = 'playing';
  gameState.selectedToDiscard = [];

  showMessage('Select cards to discard (0-5), then click Draw');
  playSound('deal');
  updateDisplay();
}

function toggleCardSelection(index) {
  if (gameState.gamePhase !== 'playing') return;

  if (gameState.selectedToDiscard.includes(index)) {
    gameState.selectedToDiscard = gameState.selectedToDiscard.filter(i => i !== index);
  } else {
    gameState.selectedToDiscard.push(index);
  }

  updateDisplay();
}

function drawCards() {
  if (gameState.deck.length < gameState.selectedToDiscard.length) {
    showMessage('Not enough cards in deck!', 'lose');
    return;
  }

  const newPlayerCards = [...gameState.playerCards];
  let newDeck = [...gameState.deck];

  gameState.selectedToDiscard.sort((a, b) => b - a);
  gameState.selectedToDiscard.forEach(idx => {
    newPlayerCards[idx] = newDeck[0];
    newDeck = newDeck.slice(1);
  });

  gameState.playerCards = newPlayerCards;
  gameState.deck = newDeck;
  gameState.gamePhase = 'finished';

  const playerRanking = getHandRanking(gameState.playerCards);
  const dealerRanking = getHandRanking(gameState.dealerCards);

  let result = '';
  let payout = 0;

  if (playerRanking.value > dealerRanking.value) {
    result = `You earned credits with ${playerRanking.name}!`;
    payout = gameState.bet * 2;
    playSound('win');
  } else if (playerRanking.value === dealerRanking.value) {
    result = `Tie! Both have ${playerRanking.name}.`;
    payout = gameState.bet;
    playSound('deal');
  } else {
    result = `Dealer earns this round with ${dealerRanking.name}!`;
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

  updateDisplay();
}

function keepAll() {
  gameState.selectedToDiscard = [];
  drawCards();
}

function newGame() {
  gameState.bet = 0;
  gameState.playerCards = [];
  gameState.dealerCards = [];
  gameState.selectedToDiscard = [];
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
