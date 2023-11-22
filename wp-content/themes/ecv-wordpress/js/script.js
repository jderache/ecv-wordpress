/** Mobile navigation */

const burgerIcon = document.querySelector('.burger-menu');
const mobileMenu = document.querySelector('.mobile-menu');

burgerIcon.addEventListener('click', () => {
    console.log('click');
    mobileMenu.classList.toggle('active');
});


/** ELSE */

const windowWith = window.innerWidth;
const sections = document.querySelectorAll("section");

const header = document.querySelector('.site-header');
const hero_banner = document.querySelector('.hero-banner');

window.addEventListener('scroll', () => {
    if (window.scrollY > 0) {
        header.classList.add('fixed');
    } else {
        header.classList.remove('fixed');
    }
});

sections.forEach((section) => {
    section.classList.add("hide");
});

let observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            console.log(entry);
            if (entry.isIntersecting) {
                console.log(entry.target);
                entry.target.classList.remove("hide");
            }
        });
    },
    {
        threshold: windowWith < 767 ? 0.2 : 0.1,
    },
);

sections.forEach((observed) => {
    if (observed) {
        observer.observe(observed);
    }
});

const design_imgs = document.querySelectorAll(".design-gallery-item div");

// foreach images, zoom on hover based on mouse position
design_imgs.forEach((img) => {
    img.addEventListener("mousemove", (e) => {
        const { left, top, width, height, } = img.getBoundingClientRect();
        const x = ((e.pageX - left) / width) * 100;
        const y = (((e.pageY - top) / height) * 100) - 300;

        img.style.transform = `scale(1.05)`;
        img.style.transformOrigin = `${x}% ${y}%`;
    });

    img.addEventListener("mouseleave", () => {
        img.style.transform = `scale(1)`;
    });
}); 