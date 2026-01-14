/**
 * Professional Roulette Wheel Animation
 * Handles the spinning animation for the professional roulette wheel image
 */

class ProfessionalRouletteWheel {
    constructor() {
        this.wheelElement = document.getElementById('professionalWheel');
        this.wheelImage = this.wheelElement?.querySelector('.wheel-image');
        this.winningNumberDisplay = document.getElementById('winningNumber');
        this.isSpinning = false;
        
        // Roulette numbers positions (0-36)
        this.numbers = [0, 26, 3, 35, 12, 28, 7, 29, 18, 22, 9, 31, 14, 20, 1, 33, 16, 24, 5, 10, 23, 8, 30, 11, 36, 13, 27, 6, 34, 17, 25, 2, 21, 4, 19, 15, 32];
        this.numberPositions = {};
        this.calculateNumberPositions();
    }

    calculateNumberPositions() {
        // Each number occupies 360/37 degrees (approximately 9.73 degrees)
        const degreesPerNumber = 360 / 37;
        
        this.numbers.forEach((num, index) => {
            // Position is from top (0 degrees = top)
            this.numberPositions[num] = index * degreesPerNumber;
        });
    }

    spin(winningNumber, callback) {
        if (this.isSpinning) return;
        
        this.isSpinning = true;
        this.wheelElement.classList.add('spinning');
        this.wheelElement.classList.remove('result');
        
        // Calculate target rotation
        // We want the winning number to end up at the top (0 degrees)
        const numberDegree = this.numberPositions[winningNumber];
        
        // Add multiple full rotations (3600 degrees = 10 full spins) plus the final position
        const finalRotation = 3600 + (360 - numberDegree);
        
        // Apply the rotation
        this.wheelImage.style.transform = `rotate(${finalRotation}deg)`;
        
        // After spin completes, show result
        setTimeout(() => {
            this.wheelElement.classList.remove('spinning');
            this.wheelElement.classList.add('result');
            this.winningNumberDisplay.textContent = winningNumber;
            this.isSpinning = false;
            
            if (callback) {
                callback();
            }
        }, 4000); // Match the CSS animation duration
    }

    reset() {
        this.wheelImage.style.transform = 'rotate(0deg)';
        this.wheelElement.classList.remove('spinning', 'result');
        this.winningNumberDisplay.textContent = '?';
    }
}

// Initialize the wheel when page loads
let professionalWheel;
document.addEventListener('DOMContentLoaded', function() {
    professionalWheel = new ProfessionalRouletteWheel();
});
