import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


setTimeout(() => {
    const msg = document.querySelector('.success');
    if(msg){
        msg.style.transition = "opacity 0.5s ease";
        msg.style.opacity = 0;
        setTimeout(() => {msg.remove(), 500});
    }
}, 2000);