//notification


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


// ==============================================================
// Select2
// ==============================================================

//wysiwyg summernote


// Switchery
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
$('.js-switch').each(function() {
    new Switchery($(this)[0], $(this).data());
});
// For select 2
$(".select2").select2({
    placeholder: 'Please Select'
});


// ==============================================================
// dynamic menu
// ==============================================================

$(".menu").click(function(){
        var callItem=$(this);
        callItem.addClass('active');
        $(".menu").not(callItem).removeClass('active');           
    });

// ==============================================================
// form 
// ==============================================================
function Toggle() { 
    var temp = document.getElementById("password"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
    var temp = document.getElementById("passconf"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
}


//datepicker
    $('#datepicker-autoclose').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
        });

        //clock picker

    $('#single-input').clockpicker({
                placement: 'bottom',
                align: 'left',
                autoclose: true,
                'default': 'now'
            });

//textarea summernote

    $('.summernote').summernote({
        height: "300px",
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: baseurl + "c_perusahaan/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(url) {
                $('.summernote').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {src : src},
            type: 'post',
            url: baseurl + "c_perusahaan/delete_image",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }


// $(function(window, document, $) {
//         "use strict";
//         $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input").iCheck({
//             checkboxClass: "icheckbox_squasre-green",
//             radioClass: "iradio_square-green"
//         }), $(".touchspin").TouchSpin(), $(".switchBootstrap").bootstrapSwitch();
//     }(window, document, jQuery));
//validation
$(function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(), $(".skin-square input");
    }(window, document, jQuery)
);

 


// ==============================================================
// form upload
// ==============================================================

        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });

// ==============================================================
// Data table 
// ==============================================================
    $('#myTable').DataTable();
        
    $('#tablePrintAble').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    
    $('#pdflands').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
            }, 
            'excel'
        ]
    });

    //Blftirp
    $('#example').DataTable({
        // lengthMenu: [
        //     [4, 7, 10, 15, 20, -1],
        //     [4, 7, 10, 15, 20, "Todo"]
        // ],
        responsive: true,
        paging: true,
        pagingType: "full_numbers",
        stateSave: true,
        processing: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                pageSize: "legal",
                extension: ".pdf",
                filename: "name",
                title: "",
                orientation: 'landscape',
                customize: function (doc) {

                    doc.styles.tableHeader = {
                        color: 'black',
                        background: 'grey',
                        alignment: 'center'
                    }

                    doc.styles = {
                        subheader: {
                            fontSize: 10,
                            bold: true,
                            color: 'black'
                        },
                        tableHeader: {
                            bold: true,
                            fontSize: 10.5,
                            color: 'black'
                        },
                        lastLine: {
                            bold: true,
                            fontSize: 11,
                            color: 'blue'
                        },
                        defaultStyle: {
                            fontSize: 10,
                            color: 'black'
                        }
                    }
                    

                    var objLayout = {};
                    objLayout['hLineWidth'] = function(i) { return .8; };
                        objLayout['vLineWidth'] = function(i) { return .5; };
                        objLayout['hLineColor'] = function(i) { return '#aaa'; };
                        objLayout['vLineColor'] = function(i) { return '#aaa'; };
                    objLayout['paddingLeft'] = function(i) { return 8; };
                    objLayout['paddingRight'] = function(i) { return 8; };
                    doc.content[0].layout = objLayout;

                    // margin: [left, top, right, bottom]

                    doc.content.splice(0, 0, {
                        text: [
                            {text: 'Texto 0', italics: true, fontSize: 12}
                        ],
                        margin: [0, 0, 0, 12],
                        alignment: 'center'
                    });

                    doc.content.splice(0, 0, {

                        table: {
                            widths: [300, '*'],
                            body: [
                                [
                                    {
                                        text: [
                                            {text: 'Texto 4', fontSize: 10},
                                            {
                                                text: 'Texto 5',
                                                bold: true,
                                                fontSize: 10
                                            }

                                        ]
                                    }
                                    , {
                                    text: [
                                        {
                                            text: 'Texto 6',
                                            bold: true, fontSize: 18
                                        },
                                        {
                                            text: 'Texto 7',
                                            fontSize: 10
                                        }

                                    ]
                                }]
                            ]
                        },

                        margin: [0, 0, 0, 22],
                        alignment: 'center'
                    });
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'CSV',
                fieldSeparator: ';',
                fieldBoundary: '"',
                exportOptions: {
                    columns: ':visible'
                }
            }

        ]

    });

//validation

