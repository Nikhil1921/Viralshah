<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
        $(document).on('click', '.sidebar-mini', function(){
            if ($(this).hasClass("sidebar-collapse") == true) 
                document.cookie = "sidebar=sidebar-collapse; path=/";
            else
                document.cookie = "sidebar=; path=/";
        });

		setTimeout(function(){ $(".alert-messages").remove(); }, 3000);
		
        <?php if (isset($dataTables)): ?>
      	var table = $('.datatable').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, 100, -1 ],
                [ '10', '25', '50', '100', 'All' ]
            ],
            buttons: [
                'pageLength',
                {
                    extend: 'print',
                    footer: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                {
                    extend: 'csv',
                    footer: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                },
                'colvis'
            ],
            columnDefs: [ {
                targets: -1,
                visible: false
            } ],
            "processing": true,
            "serverSide": true,
            'language': {
                'loadingRecords': '&nbsp;',
                'processing': 'Processing',
                'paginate': {
                    'first': '|',
                    'next': '<i class="fa fa-arrow-circle-right"></i>',
                    'previous': '<i class="fa fa-arrow-circle-left"></i>',
                    'last': '|'
                }
            },
            "order": [],
            "ajax": {
                url: "<?= base_url($url) ?>",
                type: "POST",
                data: function(data) {
                    data.star_line_token = $('#'+"<?= strtolower(str_replace(" ", '_', APP_NAME)).'_token' ?>").val();
                    data.formLoad = $('#formLoad').val();
                    data.is_deleted = $('#is_deleted').val();
                    data.emp = $('#emp').val();
                    data.veh_sender = $('#veh_sender').val();
                    data.veh_emp = $('#veh_emp').val();
                    data.task_status = $('#task_status').val();
                    data.start_date = $('#start').val();
                    data.end_date = $('#end').val();
                },
                complete: function(response) {
                    var data = JSON.parse(response.responseText).star_line_token;
                    $('#'+"<?= strtolower(str_replace(" ", '_', APP_NAME)).'_token' ?>").val(data);
                },
            },
            "columnDefs": [{
                "targets": 'target',
                "orderable": false,
            },],
        });

        $('.ajax-reload').change(function(){
            table.ajax.reload();
        });

        $('.task_status').click(function(){
            $('#task_status').val($(this).html());
            table.ajax.reload();
        });

        <?php endif ?>

        if ($('#reservation')) {
            /* $('#reservation').daterangepicker();

            $("#reservation").change(function (){
                console.log(this.value)
            }); */
            $('#reservation').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                $("#start").val(start.format('YYYY-MM-DD'));
                $("#end").val(end.format('YYYY-MM-DD'));
                table.ajax.reload();
            });
        }

        if ($(".dependent").length) {
            $(".dependent").change(function(){
                let dependent = $(this).data('dependent');
                let selected = $(this).data('value');
                let url = $(this).data('url');
                var html = `<option value="">Select ${$('#'+dependent).siblings('label').html()}</option>`;

                if ($(this).val())
                    $.ajax({
                        url:url,
                        type: "GET",
                        data: {id: $(this).val()},
                        dataType: "JSON",
                        async: false,
                        success : function(data) {
                            $.each(data.data, function( index, value ) {
                                html += `<option value="${value.id}" ${selected == value.id ? 'selected' : ''}>${value.name}</option>`;
                            });
                            $('#'+dependent).html(html);
                        },
                        error : function(request,error)
                        {
                            console.log("Request: "+JSON.stringify(request));
                        }
                    });
                
                $('#'+dependent).html(html);
            });

            $(".dependent").trigger('change');
        }
	});
    
    function remove(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This will be deleted from your data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) $('#'+id).submit();
      })
    }

    function complete(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This task will be completed!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.value) $('#'+id).submit();
      })
    }

    function existCheck(veh_no) {
        if (veh_no)
            $.get(
                "<?= base_url($url.'/existCheck') ?>",
                {veh_no: veh_no},
                function(result){
                    $(".exist-check").html(result.message);
                },
                'json'
            );
    }
</script>