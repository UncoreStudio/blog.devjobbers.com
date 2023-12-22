const header = document.getElementById("header");
const scroll_to_top_button = document.getElementById("scroll_to_top_button");

window.addEventListener("scroll", () => {
	header.classList.toggle("border-b", window.scrollY > 10);
	if (window.scrollY > 10) {
		header.classList.add("h-20");
		header.classList.remove("h-24");
		scroll_to_top_button.classList.remove("translate-y-56");
	} else {
		header.classList.add("h-24");
		header.classList.remove("h-20");
		scroll_to_top_button.classList.add("translate-y-56");
	}
});

scroll_to_top_button.addEventListener("click", () => {
	window.scrollTo({
		top: 0,
		behavior: "smooth",
	});
});
