@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @component('components.box')
                    @slot('title' ,'Riwayat Diagnosa Penyakit')
                    @slot('link')
                        <a href="{{ route('diagnose.regis') }}" class="btn btn-primary pull-right">Buat Diagnosa Baru</a>
                    @endslot
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penilaian</th>
                                <th>Nama Penyakit</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                @endcomponent
            </div>
        </div>
    </div>
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
                    url :"{{ route('diagnose.list') }}",
                    data: { '_token' : "{{ csrf_token() }}"},
                    type: 'POST',
            },
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false, "width": "30px"},
                { data: 'created_at', name: 'created_at' },
                { data: 'result', name: 'result' },
                { data: 'action', name: 'action', "width" : "100px", orderable: false }
            ]
        });
        
    });
</script>
@endpush
