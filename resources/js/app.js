import "./bootstrap";
import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";

import { Modal, Ripple, initTWE } from "tw-elements";
initTWE({ Modal, Ripple });

document.addEventListener("DOMContentLoaded", function () {
    const card = document.querySelector(".products-card");

    if (card) {
        const container = card.querySelector(".logo-container");
        const logo = card.querySelector(".logo-container img.logo");
        const cheese = card.querySelector(".logo-container .cheese-container img.cheese");

        function checkImagesLoaded() {
            if (logo.complete && cheese.complete) {
                updateLogoHeight(container);
            } else {
                if (!logo.complete) {
                    logo.addEventListener('load', checkImagesLoaded);
                }
                if (!cheese.complete) {
                    cheese.addEventListener('load', checkImagesLoaded);
                }
            }
        }

        window.addEventListener('resize', () => updateLogoHeight(container));
        checkImagesLoaded()
    }


    function updateLogoHeight(container) {
        const containerHeight = container.offsetHeight;
        document.documentElement.style.setProperty('--logo-height', `${containerHeight}px`);
    }
});


// Menu toggle functionality
const menu = document.querySelector('.nav');
const menuIcon = document.querySelector('.menu-icon');
const body = document.body;

if (menu && menuIcon) {
    menuIcon.addEventListener('click', () => {
        menu.classList.toggle('active');
        menuIcon.classList.toggle('active');
        body.classList.toggle('lock');
    });

    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.remove('active');
            menuIcon.classList.remove('active');
            body.classList.remove('lock');
        });
    });
}

// Scroll up/down functionality
document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;

    if (window.pageYOffset > 0) {
        body.classList.add("scroll-up");
    } else {
        body.classList.remove("scroll-up");
    }

    let lastScroll = 0;

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 0) {
            body.classList.remove("scroll-up");
            return;
        }

        if (currentScroll > lastScroll && !body.classList.contains("scroll-down")) {
            body.classList.remove("scroll-up");
            body.classList.add("scroll-down");
        } else if (currentScroll < lastScroll && body.classList.contains("scroll-down")) {
            body.classList.remove("scroll-down");
            body.classList.add("scroll-up");
        }
        lastScroll = currentScroll;
    });
});

// Initialize Swiper
const galery_swiper = new Swiper('.galery_swiper', {
    slidesPerView: 1.021,
    spaceBetween: 20,
    loop: true,
    allowTouchMove: true,
    autoplay: {
        delay: 3000,
    },
    breakpoints: {
        768: {
            slidesPerView: 1.5,
            spaceBetween: 50,
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Adjust hero height
function adjustHeroHeight() {
    const header = document.querySelector('header');
    const headerHeight = header.offsetHeight;
    document.documentElement.style.setProperty('--header-height', headerHeight + "px");
}

window.addEventListener('load', adjustHeroHeight);
window.addEventListener('resize', adjustHeroHeight);

