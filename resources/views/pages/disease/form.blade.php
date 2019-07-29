@component('components.modal')
    @slot('title','Form Penyakit')
    {!! Form::open(['id' => 'form', 'class' => 'form-horizontal']) !!}
    {!! Form::hidden('id', null,['id' => 'id']) !!}
    {!! Form::hidden('type', 'POST',['id' => 'type']) !!}
    <div class="modal-body pd-25">
        <div class="control-group">
            <label class="control-label">Kode</label>
            <div class="controls">
                {!! Form::text('code',null,['id' => 'code','class' => 'form-control','required','pattern' => '^[a-zA-Z0-9\s]+$',
                    'data-validation-pattern-message' => 'Mohon masukan data dengan benar', 
                    'data-validation-required-message' => 'Tulis Kode Disini']) !!}
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama</label>
            <div class="controls">
                {!! Form::text('name',null,['id' => 'name','class' => 'form-control','required','pattern' => '^[a-zA-Z\s]+$',
                    'data-validation-pattern-message' => 'Mohon masukan data dengan benar', 
                    'data-validation-required-message' => 'Tulis Kode Disini']) !!}
                <p class="help-block"></p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    </div>
    {!! Form::close() !!}
@endcomponent
