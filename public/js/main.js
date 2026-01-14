/**
 * JACKPOO CASINO - Main JavaScript
 * Global functionality and utilities
 */

// Smooth scroll behavior for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Add animation on scroll
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
    }
  });
}, observerOptions);

// Observe all cards and sections
document.querySelectorAll('.card, .feature-card, .game-card, .testimonial-card').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(20px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  observer.observe(el);
});

// Mobile menu toggle (if needed)
function toggleMobileMenu() {
  const nav = document.querySelector('nav');
  if (nav) {
    nav.classList.toggle('active');
  }
}

// Prevent multiple rapid clicks on buttons
document.querySelectorAll('button').forEach(btn => {
  btn.addEventListener('click', function() {
    if (this.disabled) return;
    this.disabled = true;
    setTimeout(() => {
      this.disabled = false;
    }, 300);
  });
});

console.log('Jackpoo Casino - Ready to play!');
