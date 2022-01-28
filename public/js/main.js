//! SHOW MENU
const toggle = document.querySelector('#nav-toggle'),
	menu = document.querySelector('#nav-menu');

toggle.onclick = () => {
	menu.classList.toggle('show-menu');
};

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
const imgLogo = document.querySelector('.nav__logo img');
const darkTheme = 'dark-theme';
const iconTheme = 'bx-sun';

const selectedTheme = localStorage.getItem('selected-theme');
const selectedIcon = localStorage.getItem('selected-icon');

const getCurrentTheme = () =>
	document.body.classList.contains(darkTheme) ? 'dark' : 'light';

const getCurrentIcon = () =>
	themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun';

if (selectedTheme) {
	document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme);
	themeButton.classList[selectedTheme === 'bx-moon' ? 'add' : 'remove'](iconTheme);
}

themeButton.addEventListener('click', () => {
	document.body.classList.toggle(darkTheme);
	themeButton.classList.toggle(iconTheme);
	
	if(document.body.classList.contains('dark-theme')) {
		imgLogo.src = '../public/img/logo2.png'
	}else {
		imgLogo.src = '../public/img/logo.png'
	}

	localStorage.setItem('selected-theme', getCurrentTheme());
	localStorage.setItem('selected-icon', getCurrentIcon());
});

if(localStorage.getItem('selected-theme') === 'dark') {
	imgLogo.src = '../public/img/logo2.png'
} else {
	imgLogo.src = '../public/img/logo.png'
}

/*==================== REMOVE ACTIVE LINK MENU IN DEVICE MOBILE ====================*/
const navLink = document.querySelectorAll('.nav__link')
navLink.forEach(c => c.addEventListener('click', function() {
	menu.classList.remove('show-menu')
}))

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

//! FAVORITE FOOD
const hearts = document.querySelectorAll('.favorite-food');
hearts.forEach((c) =>
	c.addEventListener('click', function () {
		c.classList.toggle('bx-heart');
		c.classList.toggle('bxs-heart');
	})
);

//! ADD NOW TO CART
const formAddNow = document.querySelectorAll('#form-add-now');
const btnAddNow = document.querySelectorAll('.add-cart-product');
const cartIcon = document.querySelector('#cart-icon');

btnAddNow.forEach((c) =>
	c.addEventListener('click', function (e) {
		if (cartIcon == null) {
			e.preventDefault();
			Swal.fire({
				icon: 'error',
				title: 'Alert!',
				text: 'You are not logged in, so you do not have permission to add products. Please login...',
				showCancelButton: true,
				confirmButtonText: 'Loggin',
				confirmButtonColor: '#00c567',
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = 'http://localhost:5000/?mod=user&action=index';
				}
			});
		} else {
			e.preventDefault();
			Swal.fire({
				icon: 'success',
				title: 'Add successfully!',
				showConfirmButton: false,
			});
			setTimeout(function () {
				//TODO: Huỷ bỏ preventDefault theo cách này
				window.location = c.getAttribute('href');
			}, 1000);
		}
	})
);

const btnAtCart = document.querySelector('#btn-add-cart');
const formDetail = document.forms['form-detail'];
if (btnAtCart) {
	btnAtCart.addEventListener('click', function (e) {
		if (cartIcon == null) {
			e.preventDefault();
			Swal.fire({
				icon: 'error',
				title: 'Alert!',
				text: 'You are not logged in, so you do not have permission to add products. Please login...',
				showCancelButton: true,
				confirmButtonText: 'Login',
				confirmButtonColor: '#00c567',
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = 'http://localhost:5000/?mod=user&action=index';
				}
			});
		} else {
			e.preventDefault();
			Swal.fire({
				icon: 'success',
				title: 'Add successfully!',
				showConfirmButton: false,
			});
			setTimeout(function () {
				//TODO: Huỷ bỏ preventDefault theo cách này
				formDetail.submit();
			}, 1000);
		}
	});
}

//! JS DECRE & INCRE QUANTITY IN DETAIL PRODUCT
function changeNumOrder(elementId, valueChange) {
	var element = document.getElementById(elementId);
	var min = Number(element.getAttribute('min'));
	var max = Number(element.getAttribute('max'));
	var value = Number(element.value);
	value += valueChange;
	if ((!min || value >= min) && (!max || value <= max)) {
		element.value = value;
	}
}

// DESTROY CART
const btnDestroy = document.querySelector('#btn-destroy-cart');
if (btnDestroy) {
	btnDestroy.addEventListener('click', function (e) {
		e.preventDefault();
		Swal.fire({
			icon: 'warning',
			title: 'Warning!',
			text: 'Are you sure you want to delete all products in your cart?',
			confirmButtonColor: '#ee4d2d',
			showCancelButton: true,
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '?mod=cart&action=remove';
			}
		});
	});
}

const wrapper = document.querySelector('.wrapper');
const defaultBtn = document.querySelector('#default-btn');
const fileName = document.querySelector('.file-name');
const img = document.getElementById('imgHere');
const customBtn = document.querySelector('#custom-btn');
const nameImage = document.querySelector('#name-img-product');
let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

if (defaultBtn) {
	function defaultBtnActive() {
		defaultBtn.click();
	}
	defaultBtn.addEventListener('change', function () {
		const file = this.files[0];
		const getNameFile = this.value.split(/(\\|\/)/g).pop();
		console.log(nameImage);
		if (file) {
			const reader = new FileReader();
			// console.log(reader);
			reader.onload = function () {
				const result = reader.result;
				// console.log(result);
				img.src = result;
				nameImage.value = getNameFile;
				wrapper.classList.add('active');
			};
			reader.readAsDataURL(file);
		}
		if (this.value) {
			let valueStore = this.value.match(regExp);
			fileName.textContent = valueStore;
		}
	});
}