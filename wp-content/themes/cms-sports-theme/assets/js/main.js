// CMS Sports Theme - Main JS
document.addEventListener('DOMContentLoaded', function() {
    // Smooth hover effect on post cards
    document.querySelectorAll('.post-card').forEach(function(card) {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'transform .2s ease, box-shadow .2s ease';
        });
    });

    // Active nav link highlight
    var currentPath = window.location.pathname;
    document.querySelectorAll('#primary-nav a').forEach(function(link) {
        if (link.getAttribute('href') && link.getAttribute('href').includes(currentPath.split('/').pop())) {
            link.style.background = 'rgba(255,255,255,.18)';
            link.style.color = '#fff';
        }
    });
});
