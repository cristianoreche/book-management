document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const appNav = document.getElementById('header-nav');

    menuToggle.addEventListener('click', function () {
        appNav.classList.toggle('open');
    });

    document.addEventListener('click', function (event) {
        if (!appNav.contains(event.target) && !menuToggle.contains(event.target)) {
            appNav.classList.remove('open');
        }
    });
});
