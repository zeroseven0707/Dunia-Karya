import './bootstrap';
import * as Turbo from "@hotwired/turbo";

// ── Turbo Configuration ───────────────────────────────────────────────────────

// Show progress bar after 100ms (default is 500ms — feels slow)
Turbo.setProgressBarDelay(100);

// ── Page Transitions ──────────────────────────────────────────────────────────
document.addEventListener('turbo:before-visit', () => {
    document.body.classList.add('turbo-loading');
});

document.addEventListener('turbo:render', () => {
    document.body.classList.remove('turbo-loading');
});

// ── Reinitialize page scripts after Turbo navigation ─────────────────────────
document.addEventListener('turbo:load', () => {
    initLazyImages();
    initScrollAnimations();
});

// ── Lazy Image Loading (global, works after every Turbo navigation) ───────────
function initLazyImages() {
    const lazyImgs = document.querySelectorAll('img.lazy[data-src]');
    if (!lazyImgs.length) return;

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    obs.unobserve(img);
                }
            });
        }, { rootMargin: '150px' });

        lazyImgs.forEach(img => observer.observe(img));

        document.addEventListener('turbo:before-cache', () => observer.disconnect(), { once: true });
    } else {
        // Fallback: load all immediately
        lazyImgs.forEach(img => { img.src = img.dataset.src; img.classList.remove('lazy'); });
    }
}

// ── Scroll Reveal Animations ──────────────────────────────────────────────────
function initScrollAnimations() {
    const elements = document.querySelectorAll('.animate-on-scroll:not(.animated)');
    if (!elements.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    elements.forEach(el => observer.observe(el));

    document.addEventListener('turbo:before-cache', () => observer.disconnect(), { once: true });
}

// Run on first load
initLazyImages();
initScrollAnimations();
