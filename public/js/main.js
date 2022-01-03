// import 'boxicons';
//! SHOW MENU
const toggle = document.querySelector('#nav-toggle'),
	menu = document.querySelector('#nav-menu');

toggle.onclick = () => {
	menu.classList.toggle('show-menu');
};

//! Remove menu when active any link
const navLink = document.querySelectorAll('.nav__link');

function removeMenu() {
	menu.classList.remove('show-menu');
	localStorage.removeItem(0);
	localStorage.removeItem(1);
	localStorage.removeItem(2);
}
navLink.forEach((c) => c.addEventListener('click', removeMenu));

//* Change background header when scroll
function activeHeader() {
	const header = document.querySelector('#header');
	if (this.scrollY >= 200) header.classList.add('scroll-header');
	else header.classList.remove('scroll-header');
}
window.addEventListener('scroll', activeHeader);

//* Show scroll up when scroll >= 560 viewport
function activeScrollUp() {
	const scrollTop = document.querySelector('#scroll-top');
	if (this.scrollY >= 560) scrollTop.classList.add('active');
	else scrollTop.classList.remove('active');
}
window.addEventListener('scroll', activeScrollUp);

//* Scroll section active link
const sections = document.querySelectorAll('section[id]');
function scrollActive() {
	const scrollY = window.pageYOffset;

	sections.forEach((current) => {
		const sectionHeight = current.offsetHeight;
		const sectionTop = current.offsetTop - 50;
		sectionId = current.getAttribute('id');

		if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
			document
				.querySelector('.nav__menu a[href*=' + sectionId + ']')
				.classList.add('active');
		} else {
			document
				.querySelector('.nav__menu a[href*=' + sectionId + ']')
				.classList.remove('active');
		}
	});
}

window.addEventListener('scroll', scrollActive);

//* Dark/Light Theme
const themeButton = document.getElementById('theme-button');
const darkTheme = 'dark-theme';
const iconTheme = 'bx-sun';

const selectedTheme = localStorage.getItem('selected-theme');
const selectedIcon = localStorage.getItem('selected-icon');

const getCurrentTheme = () =>
	document.body.classList.contains(darkTheme) ? 'dark' : 'light';

const getCurrentIcon = () =>
	themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun';

if (selectedTheme) {
	document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](
		darkTheme
	);
	themeButton.classList[selectedTheme === 'bx-moon' ? 'add' : 'remove'](
		iconTheme
	);
}

themeButton.addEventListener('click', () => {
	document.body.classList.toggle(darkTheme);
	themeButton.classList.toggle(iconTheme);

	localStorage.setItem('selected-theme', getCurrentTheme());
	localStorage.setItem('selected-icon', getCurrentIcon());
});

/*==================== ACTIVE LINK MAIN MENU PRODUCTS ====================*/
const listMainProducts = document.querySelectorAll('.main-menu__link');

function removeActive() {
	listMainProducts.forEach(c => c.addEventListener('click', function() {
		c.classList.remove('active')
	}))
}
listMainProducts.forEach(c => c.addEventListener('click', function() {
	removeActive()
	c.classList.add('active')
}))

//! FAVORITE FOOD
const hearts = document.querySelectorAll('.favorite-food');
hearts.forEach((c) =>
	c.addEventListener('click', function () {
		c.classList.toggle('bx-heart');
		c.classList.toggle('bxs-heart');
	})
);


//! JS DECRE & INCRE QUANTITY IN DETAIL PRODUCT 
function changeNumOrder(elementId, valueChange) {
	var element = document.getElementById(elementId)
	var min = Number(element.getAttribute('min'))
	var max = Number(element.getAttribute('max'))
	var value = Number(element.value)
	value += valueChange
	if((!min || value >= min) && (!max || value <= max)) {
		element.value = value
	}
}


/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
	origin: 'top',
	distance: '30px',
	duration: 2000,
	reset: true,
});

sr.reveal(
	`.home__data, .home__img,
            .about__data, .about__img,
            .services__content, .menu__content,
            .app__data, .app__img,
            .contact__data, .contact__button,
            .footer__content`,
	{
		interval: 200,
	}
);