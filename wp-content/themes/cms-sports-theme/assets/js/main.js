// CMS Theme - Main JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // 1. Account Dropdown toggle (Module 1 Header)
    var accountDropdownBtn = document.getElementById('accountDropdownBtn');
    var accountDropdownWrapper = document.querySelector('.nav-dropdown-wrapper');

    if (accountDropdownBtn && accountDropdownWrapper) {
        accountDropdownBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            accountDropdownWrapper.classList.toggle('open');
            var isExpanded = accountDropdownWrapper.classList.contains('open');
            accountDropdownBtn.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!accountDropdownWrapper.contains(e.target)) {
                accountDropdownWrapper.classList.remove('open');
                accountDropdownBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // 2. Search Icon in Nav (focus search bar or navigate)
    var navSearchTrigger = document.getElementById('navSearchTrigger');
    var headerSearchInput = document.querySelector('.navbar-search-input');
    if (navSearchTrigger && headerSearchInput) {
        navSearchTrigger.addEventListener('click', function(e) {
            if (headerSearchInput.offsetParent !== null) {
                // If header search input is visible, focus it
                e.preventDefault();
                headerSearchInput.focus();
                headerSearchInput.select();
            }
        });
    }

    // 3. Mobile Hamburger toggle
    var hamburgerBtn = document.querySelector('.nav-hamburger');
    var navLinks = document.querySelector('.navbar-links');
    if (hamburgerBtn && navLinks) {
        hamburgerBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            navLinks.classList.toggle('open');
        });
    }
});
