<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $dish->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::text('description', $dish->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price', 'Price') }}
            {{ Form::text('price', $dish->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rating', 'Rating') }}
            {{ Form::text('rating', $dish->rating, ['class' => 'form-control' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Rating']) }}
            {!! $errors->first('rating', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prep_time', 'Prep Time') }}
            {{ Form::text('prep_time', $dish->prep_time, ['class' => 'form-control' . ($errors->has('prep_time') ? ' is-invalid' : ''), 'placeholder' => 'Prep Time']) }}
            {!! $errors->first('prep_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('photo', 'Photo') }}
            {{ Form::text('photo', $dish->photo, ['class' => 'form-control' . ($errors->has('photo') ? ' is-invalid' : ''), 'placeholder' => 'Photo']) }}
            {!! $errors->first('photo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_id', 'Type') }}
            {{ Form::select('type_id', $types, $dish->type_id, ['class' => 'form-control' . ($errors->has('type_id') ? ' is-invalid' : ''), 'placeholder' => 'Select a Type']) }}
            {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
