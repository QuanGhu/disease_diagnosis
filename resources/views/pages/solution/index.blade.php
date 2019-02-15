@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @component('components.box')
                    @slot('title' ,'Data Solusi Penyakit')
                    @slot('link')
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalForm">Tambah Data</a>
                    @endslot
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyakit</th>
                                <th>Nama Solusi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                @endcomponent
            </div>
        </div>
    </div>
    @include('pages.solution.form')
@endsection
@push('scripts')
<script src="{{ asset('theme/js/scripts.js') }}"></script>
<script>
    $( document ).ready(function() {

        var dt = $('#dataTable').DataTable({
            orderCellsTop: true,
            responsive: true,
            processing: true,
            serverSide: true,
            searching: true,
            autoWidth: false,
            ajax: {
                    url :"{{ route('solution.list') }}",
                    data: { '_token' : "{{ csrf_token() }}"},
                    type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, "width": "30px"},
                { data: 'disease', name: 'disease' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', "width" : "100px", orderable: false }
            ]
        });

        $('table#dataTable tbody').on( 'click', 'td button', function (e) {
            var mode = $(this).attr("data-mode");
            var parent = $(this).parent().get( 0 );
            var parent1 = $(parent).parent().get( 0 );
            var row = dt.row(parent1);
            var data = row.data();

            if($(this).hasClass('delete')) {
                swal({   
                    title: "Hapus",   
                    text: "Apakah Anda Yakin Untuk Menghapus Data Ini ?",   
                    type: "warning",   
                    showCancelButton: true,
                    cancelButtonText: "No",   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Ya Saya Yakin",   
                    closeOnConfirm: true 
                }, function(){
                    $('.preloader').show();
                    remove(data.id,"{{ route('solution.delete') }}", "{{ csrf_token() }}")   
                    .then((result) => {
                        $('.preloader').hide();
                        $.toast({
                            heading: 'Success !!',
                            text: result.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'success',
                            hideAfter: 3500, 
                            stack: 6
                        });
                        $('#dataTable').DataTable().ajax.reload();
                    })
                    .catch((err) => {
                        $('.preloader').hide();
                        $.toast({
                            heading: 'Error !!!',
                            text: err.responseJSON.message,
                            position: 'top-right',
                            loaderBg:'#ff6849',
                            icon: 'error',
                            hideAfter: 3500
                        });
                        $('#dataTable').DataTable().ajax.reload();
                    })
                });
                
            }else {
                $('#id').val(data.id);
                $('#type').val('PUT');
                $('#disease_id').val(data.disease_id);
                $('#name').val(data.name);
                $('#modalForm').modal('show');
            }
        });
        
        $("#form").find("input,textarea,select").jqBootstrapValidation(
            {
                preventSubmit: true,
                submitError: function($form, event, errors) {

                },
                submitSuccess: function($form, event) {
                    $('.preloader').show();
                    event.preventDefault();
                    const data = $('#form').serialize();
                    if($('#type').val() === 'POST')
                    {
                        save(data,"{{ route('solution.save') }}", "{{ csrf_token() }}")
                        .then((result) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Success !!',
                                text: result.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'success',
                                hideAfter: 3500, 
                                stack: 6
                            });
                            $('#dataTable').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Error !!!',
                                text: err.responseJSON.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                            });
                            $('#dataTable').DataTable().ajax.reload();
                        })
                    } else {
                        update(data,"{{ route('solution.update') }}","{{ csrf_token() }}")
                        .then((result) => {
                            $('#form')[0].reset();
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Success !!',
                                text: result.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'success',
                                hideAfter: 3500, 
                                stack: 6
                            });
                            $('#type').val('POST');
                            $('#dataTable').DataTable().ajax.reload();
                        })
                        .catch((err) => {
                            $('#modalForm').modal('hide')
                            $('.preloader').hide();
                            $.toast({
                                heading: 'Error !!!',
                                text: err.responseJSON.message,
                                position: 'top-right',
                                loaderBg:'#ff6849',
                                icon: 'error',
                                hideAfter: 3500
                            });
                            $('#type').val('POST');
                            $('#dataTable').DataTable().ajax.reload();
                        })
                    }
                },
                filter: function() {
                    return $(this).is(":visible");
                }
            }
        );
    });
</script>
@endpush