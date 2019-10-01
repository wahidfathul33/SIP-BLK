$('.loker-detail').click(function(){

  var id = $(this).attr('relid'); //get the attribute value
  console.log(id);

  $('#publik').attr('href', baseurl + "c_admin/loker_status/1/" +id );
  $('#privat').attr('href', baseurl + "c_admin/loker_status/2/" +id );

  $.ajax({
      url : baseurl + "c_admin/loker_detail", 
      data:{id : id},
      method:'GET',
      dataType:'json',
      success:function(response) {
        $('#judul').html(response.judul); //hold the response in id and show on popup
        $('#posisi').html(response.posisi);
        $('#pendidikan').html(response.pendidikan);
        $('#jurusan').html(response.jurusan);
        $('#jns_kontrak').html(response.jns_kontrak);
        $('#gaji').html(response.gaji);
        $('#lokasi').html(response.lokasi);
        $('#tgl_tutup').html(response.tgl_tutup); 
        $('#batas_kuota').html(response.batas_kuota);
        $('#ket_lowongan').html(response.ket_lowongan);  

        $('#id_lowongan').html(response.id_lowongan);
        $('#show_loker').modal({backdrop: 'static', keyboard: true, show: true});
    }
  });
});
