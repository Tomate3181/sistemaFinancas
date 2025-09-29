const toggleBtn = document.getElementById('toggleMode');
const body = document.body;
const navbar = document.querySelector('.navbar');

// aplica tema salvo no localStorage logo ao carregar
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    body.classList.add('dark-mode');
    navbar.classList.remove('navbar-light', 'bg-light');
    navbar.classList.add('navbar-dark', 'bg-dark');
    toggleBtn.querySelector('i').classList.replace('bi-moon-fill', 'bi-sun-fill');
} else {
    body.classList.add('light-mode');
    navbar.classList.add('navbar-light', 'bg-light');
    toggleBtn.querySelector('i').classList.replace('bi-sun-fill', 'bi-moon-fill');
}

toggleBtn.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    body.classList.toggle('light-mode');

    if (body.classList.contains('dark-mode')) {
        navbar.classList.remove('navbar-light', 'bg-light');
        navbar.classList.add('navbar-dark', 'bg-dark');
        toggleBtn.querySelector('i').classList.replace('bi-moon-fill', 'bi-sun-fill');
        localStorage.setItem('theme', 'dark'); // salva escolha
    } else {
        navbar.classList.remove('navbar-dark', 'bg-dark');
        navbar.classList.add('navbar-light', 'bg-light');
        toggleBtn.querySelector('i').classList.replace('bi-sun-fill', 'bi-moon-fill');
        localStorage.setItem('theme', 'light'); // salva escolha
    }
});
