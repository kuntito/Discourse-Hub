// this function modifies the css classes in the header to allow
// nav items display when the nav hamburger menu is clicked
const collapsibles = document.querySelectorAll(".collapsible");
collapsibles.forEach((item) =>
item.addEventListener("click", function () {
		this.classList.toggle("collapsible-expanded");
	})
);