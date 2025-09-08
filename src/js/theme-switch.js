document.addEventListener('DOMContentLoaded', function () {
    const themeSwitches = document.querySelectorAll('.theme-switch');
    const body = document.body;

    // Function to apply the theme
    const applyTheme = (theme) => {
        if (theme === 'dark') {
            body.setAttribute('data-theme', 'dark');
        } else {
            body.removeAttribute('data-theme');
        }
    };

    // Check for saved theme in localStorage
    const savedTheme = localStorage.getItem('theme');

    // Check for OS preference
    const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

    // Apply saved theme or OS preference
    if (savedTheme) {
        applyTheme(savedTheme);
    } else if (prefersDark) {
        applyTheme('dark');
    }

    // Add event listener to each theme switch button
    themeSwitches.forEach(themeSwitch => {
        themeSwitch.addEventListener('click', () => {
            const currentTheme = body.getAttribute('data-theme');
            let newTheme;

            if (currentTheme === 'dark') {
                newTheme = 'light';
            } else {
                newTheme = 'dark';
            }
            
            applyTheme(newTheme);
            localStorage.setItem('theme', newTheme);
        });
    });
});