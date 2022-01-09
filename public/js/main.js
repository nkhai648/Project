
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

// //* Dark/Light Theme
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

// /*==================== ACTIVE LINK MAIN MENU PRODUCTS ====================*/
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
const formAddNow = document.querySelectorAll('#form-add-now')
const btnAddNow = document.querySelectorAll('.add-cart-product')
const cartIcon = document.querySelector('#cart-icon');

btnAddNow.forEach(c => c.addEventListener('click', function(e){
	if(cartIcon == null) {
		e.preventDefault();
		Swal.fire({
			icon: 'error',
			title: 'Thông báo!',
			text: 'Bạn chưa đăng nhập nên không có quyền thêm sản phẩm. Hãy đăng nhập...',
			showCancelButton: true,
			confirmButtonText: 'Đăng nhập',
			confirmButtonColor: '#00c567'
		}).then((result) => {
			if(result.isConfirmed) {
				window.location = 'http://localhost:1234/?mod=user'
			}
		})
	}else {
		e.preventDefault()
		Swal.fire({
			icon: 'success',
			title: 'Thêm thành công!',
			showConfirmButton: false
		})
		setTimeout(function() {
			//TODO: Huỷ bỏ preventDefault theo cách này
			window.location = c.getAttribute('href')
		}, 1000)
	}
}))


    
const btnAtCart = document.querySelector('#btn-add-cart');
const formDetail = document.forms['form-detail']
if(btnAtCart) {
	btnAtCart.addEventListener('click', function(e) {
		if(cartIcon == null) {
			e.preventDefault();
			Swal.fire({
				icon: 'error',
				title: 'Thông báo!',
				text: 'Bạn chưa đăng nhập nên không có quyền thêm sản phẩm. Hãy đăng nhập...',
				showCancelButton: true,
				confirmButtonText: 'Đăng nhập',
				confirmButtonColor: '#00c567'
			}).then((result) => {
				if(result.isConfirmed) {
					window.location = 'http://localhost:1234/?mod=user'
				}
			})
		}else {
			e.preventDefault()
			Swal.fire({
				icon: 'success',
				title: 'Thêm thành công!',
				showConfirmButton: false
			})
			setTimeout(function() {
				//TODO: Huỷ bỏ preventDefault theo cách này
				formDetail.submit();
			}, 1000)
		}
	})
}


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


// DESTROY CART 
const btnDestroy = document.querySelector('#btn-destroy-cart');
if(btnDestroy) {
	btnDestroy.addEventListener('click', function(e) {
		e.preventDefault();
		Swal.fire({
			icon: 'warning',
			title: 'Cảnh báo!',
			text: 'Bạn có chắc muốn xóa tất cả sản phẩm trong giỏ hàng?',
			confirmButtonColor: '#ee4d2d',
			showCancelButton: true
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '?mod=cart&action=remove'
			}
		})
	})	
}