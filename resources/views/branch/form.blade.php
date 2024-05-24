<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $branch->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $branch->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $branch->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('company_id', 'Company') }}
            {{ Form::select('company_id', $companies, $branch->company_id, ['class' => 'form-control' . ($errors->has('company_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Company']) }}
            {!! $errors->first('company_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('commune_id', 'Commune') }}
            {{ Form::select('commune_id', $communes, $branch->commune_id, ['class' => 'form-control' . ($errors->has('commune_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Commune']) }}
            {!! $errors->first('commune_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
