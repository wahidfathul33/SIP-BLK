// notification
$(document).ready(function(){
    
    var provID = $('#provinsi').val();
    var kotaID = $('#kotaID').val();
    var kecID = $('#kecID').val();
    var kelID = $('#kelID').val();

    $.ajax({
        url: baseurl + "c_wilayah/getKota",
        type: 'post',
        data: {provID: provID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('#kota').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            json.map(function(row){
                if (kotaID == row.kota_id) {
                    options +='<option selected value="'+row.kota_id+'" selected>'+row.kota_name+'</option>';
                }else{
                    options +='<option value="'+row.kota_id+'" selected>'+row.kota_name+'</option>';
                }
                
            });
            jQuery("#kota").html(options);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    $.ajax({
        url: baseurl + "c_wilayah/getKecamatan",
        type: 'post',
        data: {kotaID: kotaID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('#kecamatan').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Pilih kecamatan</option>';
            json.map(function(row){
                if (kecID == row.kec_id) {
                    options +='<option selected value="'+row.kec_id+'">'+row.kec_name+'</option>';
                }else{
                    options +='<option value="'+row.kec_id+'">'+row.kec_name+'</option>';
                }
            });
            jQuery("#kecamatan").html(options);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });

    $.ajax({
        url: baseurl + "c_wilayah/getKelurahan",
        type: 'post',
        data: {kecID: kecID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('#kelurahan').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Pilih kelurahan</option>';
            json.map(function(row){
                if (kelID == row.kel_id) {
                    options +='<option selected value="'+row.kel_id+'">'+row.kel_name+'</option>';
                }else{
                    options +='<option value="'+row.kel_id+'">'+row.kel_name+'</option>';
                }
                
            });
            jQuery("#kelurahan").html(options);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});

//modal 
$('.loker-detail').click(function(){

  var id = $(this).attr('relid'); //get the attribute value
  console.log(id);

  $('#href-loker').attr('href', baseurl + "c_perusahaan/loker_edit/" +id );

  $.ajax({
      url : baseurl + "c_perusahaan/loker_detail",
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

$('.berita-detail').click(function(){
          
  var id = $(this).attr('relid'); //get the attribute value
  
  $.ajax({
      url : baseurl + "c_perusahaan/berita_detail",
      data:{id : id},
      method:'GET',
      dataType:'json',
      success:function(response) {
        $('#header').html(response.header); //hold the response in id and show on popup
        $('#jenis_tes').html(response.jenis_tes);
        $('#tanggal').html(response.tanggal);
        $('#lokasii').html(response.lokasi);
        $('#mulai').html(response.waktu_mulai);
        $('#selesai').html(response.waktu_selesai);
        $('#keterangan').html(response.keterangan);
        $('#lampiran a' ).attr('href', baseurl + "uploads/documents/"+response.lampiran);

        $('#show_berita').modal({backdrop: 'static', keyboard: true, show: true});
    }
  });
});