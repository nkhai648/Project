// CHECK OUT PILL 
if(window.location.href == 'http://localhost:1234/?mod=cart&action=pay') {
    const btnCheckout = document.querySelector('#btn-checkout');
	const formCheckout = document.querySelector('#form-pay');
	const nameInp = document.querySelector('#fullname');
	const addressInp = document.querySelector('#address');
	const telInp = document.querySelector('#tel');
	const emailInp = document.querySelector('#email');


    //! VALIDATOR FORM CHECKOUT
	btnCheckout.addEventListener('click', function(){
		if(nameInp.value != '' && addressInp.value != '' && telInp.value != '' && emailInp.value != '') {
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
		
				
