/**
 * Game Stats & History Manager
 * Tracks and displays last 7 bets for all games
 */

class GameStatsManager {
    constructor(gameName) {
        this.gameName = gameName;
        this.storageKey = `${gameName}_stats`;
        this.maxStats = 7;
        this.stats = this.loadStats();
    }

    loadStats() {
        const stored = localStorage.getItem(this.storageKey);
        return stored ? JSON.parse(stored) : [];
    }

    saveStats() {
        localStorage.setItem(this.storageKey, JSON.stringify(this.stats));
    }

    addBet(betAmount, result, payout) {
        const timestamp = new Date().toLocaleTimeString();
        const stat = {
            bet: betAmount,
            result: result,
            payout: payout,
            time: timestamp
        };

        this.stats.unshift(stat);
        if (this.stats.length > this.maxStats) {
            this.stats.pop();
        }
        this.saveStats();
    }

    getStats() {
        return this.stats;
    }

    clearStats() {
        this.stats = [];
        this.saveStats();
    }

    renderStatsHTML() {
        if (this.stats.length === 0) {
            return '<p class="no-stats">No bets yet</p>';
        }

        let html = '<div class="stats-list">';
        this.stats.forEach((stat, index) => {
            const resultClass = stat.payout > 0 ? 'win' : 'loss';
            html += `
                <div class="stat-item ${resultClass}">
                    <span class="stat-number">#${index + 1}</span>
                    <span class="stat-bet">Bet: ${stat.bet}</span>
                    <span class="stat-result">${stat.result}</span>
                    <span class="stat-payout">+${stat.payout}</span>
                    <span class="stat-time">${stat.time}</span>
                </div>
            `;
        });
        html += '</div>';
        return html;
    }
}

// Global stats managers for each game
let slotsStats = null;
let blackjackStats = null;
let pokerStats = null;

// Initialize stats manager for a game
function initGameStats(gameName) {
    if (gameName === 'slots') {
        slotsStats = new GameStatsManager('slots');
    } else if (gameName === 'blackjack') {
        blackjackStats = new GameStatsManager('blackjack');
    } else if (gameName === 'poker') {
        pokerStats = new GameStatsManager('poker');
    }
}

// Show stats modal
function showGameStats(gameName) {
    let stats;
    if (gameName === 'slots') {
        stats = slotsStats;
    } else if (gameName === 'blackjack') {
        stats = blackjackStats;
    } else if (gameName === 'poker') {
        stats = pokerStats;
    }

    if (!stats) return;

    const modal = document.createElement('div');
    modal.className = 'stats-modal';
    modal.innerHTML = `
        <div class="stats-modal-content">
            <div class="stats-modal-header">
                <h3>Last 7 Bets - ${gameName.toUpperCase()}</h3>
                <button class="close-btn" onclick="this.closest('.stats-modal').remove()">✕</button>
            </div>
            <div class="stats-modal-body">
                ${stats.renderStatsHTML()}
            </div>
            <div class="stats-modal-footer">
                <button class="btn btn-secondary" onclick="clearGameStats('${gameName}'); this.closest('.stats-modal').remove();">Clear History</button>
                <button class="btn btn-primary" onclick="this.closest('.stats-modal').remove();">Close</button>
            </div>
        </div>
    `;

    document.body.appendChild(modal);
}

// Clear stats for a game
function clearGameStats(gameName) {
    if (gameName === 'slots' && slotsStats) {
        slotsStats.clearStats();
    } else if (gameName === 'blackjack' && blackjackStats) {
        blackjackStats.clearStats();
    } else if (gameName === 'poker' && pokerStats) {
        pokerStats.clearStats();
    }
}
