// SHOW MENU
window.onload = function () {
	const showMenu = (toggleId, navbar, bodyId) => {
		const nav = document.getElementById(navbar),
			toggle = document.getElementById(toggleId),
			body = document.getElementById(bodyId);

		if (toggle && nav) {
			toggle.addEventListener('click', () => {
				toggle.classList.toggle('rotate');

				nav.classList.toggle('show');

				body.classList.toggle('expander');
			});
		}
	};
	showMenu('nav-toggle', 'navbar', 'body');

	// CONFIRM DELETE PRODUCT
	const trashBtn = document.querySelectorAll('#trash-icon');
	if (trashBtn) {
		trashBtn.forEach((c) =>
			c.addEventListener('click', function (e) {
				e.preventDefault();
				Swal.fire({
					icon: 'warning',
					title: 'Alert!',
					text: 'Are you sure you want to delete this product?',
					showCancelButton: true,
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = c.getAttribute('href');
					}
				});
			})
		);
	}

	// SWEETALERT ADD PRODUCT 
	const formAddProduct = document.querySelector('#form-add-product')
	const btnAddProduct = document.querySelector('#btn-add-product')
	if(formAddProduct && btnAddProduct) {
		btnAddProduct.addEventListener('click', function(e) {
			e.preventDefault()
			Swal.fire({
				icon: 'success',
				title: 'Alert!',
				text: 'You was add successfully one product!',
				showConfirmButton: false
			})
			setTimeout(function() {
				formAddProduct.submit();
			},2000)
		})
	}

	// SWEETALERT UPDATE PRODUCT 
	const formEditProduct = document.querySelector('#form-edit-product')
	const btnEditProduct = document.querySelector('#btn-edit-product')
	if(formEditProduct && btnEditProduct) {
		btnEditProduct.addEventListener('click', function(e) {
			e.preventDefault();
			Swal.fire({
				icon: 'success',
				title: 'Alert!',
				text: 'Update successfully!',
				showConfirmButton: false,
			})
			setTimeout(function() {
				formEditProduct.submit();
			},2000)
		})
	}

	// CONFIRM DELETE USER
	const deleteUser = document.querySelectorAll('#delete-user');
	if(deleteUser) {
		deleteUser.forEach((c) => c.addEventListener('click', function(e) {
			e.preventDefault()
			Swal.fire({
				icon: 'warning',
				title: 'Alert!',
				text: 'Are you sure you want to delete this user?',
				showCancelButton: true,
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = c.getAttribute('href');
				}
			});
		}))
	}

	// LINK ACTIVE COLOR
	const linkColor = document.querySelectorAll('.nav__link');
	function colorLink() {
		linkColor.forEach((l) => l.classList.remove('active'));
		this.classList.add('active');
	}

	linkColor.forEach((l) => l.addEventListener('click', colorLink));
};

const wrapper = document.querySelector('.wrapper');
const defaultBtn = document.querySelector('#default-btn');
const fileName = document.querySelector('.file-name');
const img = document.getElementById('imgHere');
// const cancelBtn = document.querySelector("#cancel-btn i")
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
			// cancelBtn .addEventListener("click", ()=> {
			//     img.src="";
			//     wrapper.classList.remove("active")
			// })
			reader.readAsDataURL(file);
		}
		if (this.value) {
			let valueStore = this.value.match(regExp);
			fileName.textContent = valueStore;
		}
	});
}
