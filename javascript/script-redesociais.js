const showSocial = (toggleCardClass, socialCardClass) => {
    const toggles = document.querySelectorAll(`.${toggleCardClass}`);
    toggles.forEach(toggle => {
        const social = toggle.closest('.cardtime').querySelector(`.${socialCardClass}`);
        
        toggle.addEventListener('click', () => {
            if (social.classList.contains('animation')) {
                social.classList.add('down-animation');

                setTimeout(() => {
                    social.classList.remove('down-animation');
                }, 1000);
            }
            social.classList.toggle('animation');
        });
    });
}

// Aplicar a função para todos os cards
showSocial('card__social-toggle', 'card__social');

