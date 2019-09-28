const flashData = $('.flash-data').data('flashdata');

if(flashData){
	swal({
		title: 'Login Berhasil !',
		text: '',
		type: 'success'
	});
}

//tombol hapus
$('.confirm-swal').on('click', function (e) {
	e.preventDefault(); 
	const href = $(this).attr('href');
	swal({   
            title: "Apakah anda yakin?",   
            text: "",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            cancelButtonColor: '#d33',
            confirmButtonText: "Ya",
            cancelButtonText: "Batal"
        },
        function(isConfirm){
            if (isConfirm) {
                document.location.href = href;
            }
        });
});