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

// now
$(document).ready(function(){
    
    var provID = $('#provinsiNow').val();
    var kotaID = $('#kotaIDnow').val();
    var kecID = $('#kecIDnow').val();
    var kelID = $('#kelIDnow').val();

    $.ajax({
        url: baseurl + "c_wilayah/getKota",
        type: 'post',
        data: {provID: provID},
        dataType: 'json',
        beforeSend: function () {
            jQuery('#kotaNow').find("option:eq(0)").html("Please wait..");
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
            jQuery("#kotaNow").html(options);
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
            jQuery('#kecamatanNow').find("option:eq(0)").html("Please wait..");
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
            jQuery("#kecamatanNow").html(options);
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
            jQuery('#kelurahanNow').find("option:eq(0)").html("Please wait..");
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
            jQuery("#kelurahanNow").html(options);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});