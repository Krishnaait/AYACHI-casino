/**
 * REALISTIC ROULETTE WHEEL ANIMATION
 * Professional spinning mechanics with realistic physics
 */

class RouletteWheel {
    constructor() {
        this.wheel = document.querySelector('.wheel');
        this.ball = document.querySelector('.wheel-ball');
        this.isSpinning = false;
        this.currentRotation = 0;
        this.rouletteNumbers = Array.from({ length: 37 }, (_, i) => i);
    }

    /**
     * Spin the wheel to a specific number
     * @param {number} winningNumber - The number the wheel should land on (0-36)
     * @param {function} onComplete - Callback when spin completes
     */
    spin(winningNumber, onComplete) {
        if (this.isSpinning) return;
        
        this.isSpinning = true;
        
        // Calculate the rotation needed
        // Each number takes up 360/37 degrees
        const degreesPerNumber = 360 / 37;
        const numberPosition = this.rouletteNumbers.indexOf(winningNumber);
        const targetRotation = numberPosition * degreesPerNumber;
        
        // Add multiple full rotations for dramatic effect (3-5 full spins)
        const fullSpins = 3 + Math.random() * 2; // 3-5 random spins
        const totalRotation = (fullSpins * 360) + targetRotation;
        
        // Add animation classes
        this.wheel.classList.add('spinning');
        this.ball.classList.add('spinning');
        
        // Update rotation after animation completes
        setTimeout(() => {
            this.currentRotation = totalRotation % 360;
            this.wheel.style.transform = `rotate(${totalRotation}deg)`;
            this.ball.style.transform = `translateX(-50%) rotate(${-totalRotation}deg)`;
            
            // Remove animation classes
            this.wheel.classList.remove('spinning');
            this.ball.classList.remove('spinning');
            
            this.isSpinning = false;
            
            // Call completion callback
            if (onComplete) {
                onComplete(winningNumber);
            }
        }, 4000); // Match animation duration
    }

    /**
     * Reset wheel to initial position
     */
    reset() {
        this.wheel.style.transform = 'rotate(0deg)';
        this.ball.style.transform = 'translateX(-50%) rotate(0deg)';
        this.currentRotation = 0;
        this.isSpinning = false;
    }

    /**
     * Get the winning number based on current wheel rotation
     */
    getWinningNumber() {
        const degreesPerNumber = 360 / 37;
        const normalizedRotation = (360 - (this.currentRotation % 360)) % 360;
        const numberIndex = Math.round(normalizedRotation / degreesPerNumber) % 37;
        return this.rouletteNumbers[numberIndex];
    }
}

// Initialize wheel when DOM is ready
let rouletteWheel;
document.addEventListener('DOMContentLoaded', () => {
    rouletteWheel = new RouletteWheel();
});
