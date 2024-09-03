import "./bootstrap";
// import Toastify from "toastify-js";
// import "toastify-js/src/toastify.css";

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

function setUnderLine() {
    var tab = document.querySelector('.tab-link.active');
    var line = document.querySelector('.underline');
    if (!line) {
        return;
    }
    line.style.width = tab.offsetWidth + "px";
    line.style.left = tab.offsetLeft + "px";
    line.style.top = tab.offsetHeight + "px";
}

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

$(document).ready(function () {

    setUnderLine();
    $(window).on("resize", function () {
        setUnderLine();
    });

});

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-link');
    const pins = document.querySelectorAll('.pin');
    const line = document.querySelector('.underline');
    const contents = document.querySelectorAll('.tab-content');
    let activeTab = null;

    function setActive(elements, activeElement) {
        elements.forEach(element => element.classList.remove('active'));
        if (activeElement) {
            activeElement.classList.add('active');
        }
    }

    function updateLinePosition(element) {
        if (element) {
            line.style.width = element.offsetWidth + "px";
            line.style.left = element.offsetLeft + "px";
            line.style.top = element.offsetHeight + "px";
        } else {
            line.style.width = 0;
        }
    }

    function hideContent() {
        setActive(tabs, null);
        setActive(pins, null);
        setActive(contents, null);
        updateLinePosition(null);
        activeTab = null;
    }

    function toggleContent(tab, index) {
        if (activeTab === tab) {
            hideContent();
        } else {
            setActive(tabs, tab);
            updateLinePosition(tab);

            const linkClass = tab.classList[1];
            const pin = document.querySelector(`.pin.${linkClass}`);
            setActive(pins, pin);
            setActive(contents, contents[index]);
            activeTab = tab;
        }
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            toggleContent(tab, index);
        });
    });

    pins.forEach(pin => {
        pin.addEventListener('mouseover', () => {
            const pinClass = pin.classList[1];
            const tabLink = document.querySelector(`.tab-link.${pinClass}`);
            const index = Array.from(tabs).indexOf(tabLink);

            setActive(tabs, tabLink);
            setActive(pins, pin);
            setActive(contents, contents[index]);
            updateLinePosition(tabLink);
            activeTab = tabLink;
        });
    });

});


const swiper = new Swiper('.product_swiper', {
    slidesPerView: 1,
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

