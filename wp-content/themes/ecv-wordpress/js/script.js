console.log("test");

const windowWith = window.innerWidth;
const sections = document.querySelectorAll("section");

const header = document.querySelector(".site-header");
const hero_banner = document.querySelector(".hero-banner");
window.addEventListener("scroll", () => {
	if (window.scrollY > 0) {
		header.classList.add("fixed");
	} else {
		header.classList.remove("fixed");
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
