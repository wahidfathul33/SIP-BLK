// $(document).ready(function(){
    
//     var provID = $('#provinsi').val();
//     var idkota = $('#id_kota').val();
//     $.ajax({
//         url: baseurl + "c_wilayah/getIDKota",
//         type: 'post',
//         data: {provID: provID},
//         dataType: 'json',
//         beforeSend: function () {
//             jQuery('#kota').find("option:eq(0)").html("Please wait..");
//         },
//         complete: function () {
//             // code
//         },
//         success: function (json) {
//             var options = '';
//             json.map(function(row){
//                 options +='<option value="'+row.kota_id+'" selected>'+row.kota_name+'</option>';
//             });
//             jQuery("#kota").html(options);
//             $('#kota').val(idkota).change();
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//             console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//         }
//     });
// });

function getKota(provID) {
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
            options +='<option value="">Pilih Kota</option>';
            json.map(function(row){
                options +='<option value="'+row.kota_id+'">'+row.kota_name+'</option>';
            });
            jQuery("#kota").html(options);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}         

function getKecamatan(kotaID) {
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
                options +='<option value="'+row.kec_id+'">'+row.kec_name+'</option>';
            });
            jQuery("#kecamatan").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function getKelurahan(kecID) {
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
                options +='<option value="'+row.kel_id+'">'+row.kel_name+'</option>';
            });
            jQuery("#kelurahan").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

//2
function getKotaNow(provIDnow) {
    $.ajax({
        url: baseurl + "c_wilayah/getKotaNow",
        type: 'post',
        data: {provIDnow: provIDnow},
        dataType: 'json',
        beforeSend: function () {
            jQuery('#kotaNow').find("option:eq(0)").html("Please wait..");
        },
        complete: function () {
            // code
        },
        success: function (json) {
            var options = '';
            options +='<option value="">Pilih Kota</option>';
            json.map(function(row){
                options +='<option value="'+row.kota_id+'">'+row.kota_name+'</option>';
            });
            jQuery("#kotaNow").html(options);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}         

function getKecamatanNow(kotaIDnow) {
    $.ajax({
        url: baseurl + "c_wilayah/getKecamatanNow",
        type: 'post',
        data: {kotaIDnow: kotaIDnow},
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
                options +='<option value="'+row.kec_id+'">'+row.kec_name+'</option>';
            });
            jQuery("#kecamatanNow").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

function getKelurahanNow(kecIDnow) {
    $.ajax({
        url: baseurl + "c_wilayah/getKelurahanNow",
        type: 'post',
        data: {kecIDnow: kecIDnow},
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
                options +='<option value="'+row.kel_id+'">'+row.kel_name+'</option>';
            });
            jQuery("#kelurahanNow").html(options);
 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}