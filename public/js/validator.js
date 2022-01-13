// CHECK OUT PILL 
    const btnCheckout = document.querySelector('#btn-checkout');
	const formCheckout = document.querySelector('#form-pay');
	const nameInp = document.querySelector('#fullname');
	const addressInp = document.querySelector('#address');
	const telInp = document.querySelector('#tel');
	const emailInp = document.querySelector('#email');

	console.log(btnCheckout);
    // VALIDATOR FORM CHECKOUT
	if(btnCheckout) {
		btnCheckout.addEventListener('click', function(e){
			if(nameInp.value != '' && addressInp.value != '' && telInp.value != '' && emailInp.value != '') {
				e.preventDefault();
				Swal.fire({
					icon: 'success',
					title: 'Thông báo!',
					text: 'Bạn đã thanh toán thành công.',
					showConfirmButton: false
				})
				setTimeout(function() {
					formCheckout.submit();
				}, 2000)
			}
		}) 
	}
		
		
				
