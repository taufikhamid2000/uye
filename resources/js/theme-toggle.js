document.addEventListener('DOMContentLoaded', () => {
    const toggles = [
        { button: document.getElementById('theme-toggle'), icon: document.getElementById('theme-icon') },
        { button: document.getElementById('responsive-theme-toggle'), icon: document.getElementById('responsive-theme-icon') }
    ];

    toggles.forEach(toggle => {
        if (toggle.button) {
            toggle.button.addEventListener('click', () => {
                const html = document.documentElement;
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    toggle.icon.classList.replace('fa-moon', 'fa-sun');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    toggle.icon.classList.replace('fa-sun', 'fa-moon');
                }
            });
        }
    });

    // Apply saved theme on page load
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
        toggles.forEach(toggle => toggle?.icon?.classList.replace('fa-sun', 'fa-moon'));
    } else {
        document.documentElement.classList.remove('dark');
        toggles.forEach(toggle => toggle?.icon?.classList.replace('fa-moon', 'fa-sun'));
    }
});
