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
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
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
    $('#tabelexport').DataTable({
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

