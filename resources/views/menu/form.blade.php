<!-- resources/views/menu/form.blade.php -->

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $menu->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('branch_id') }}
            {{ Form::text('branch_id', $menu->branch_id, ['class' => 'form-control' . ($errors->has('branch_id') ? ' is-invalid' : ''), 'placeholder' => 'Branch Id']) }}
            {!! $errors->first('branch_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="dishes">{{ __('Select Dishes') }}</label>
            <div class="checkbox-group">
                @foreach($dishes as $dish)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="dishes[]" value="{{ $dish->id }}" {{ in_array($dish->id, $selectedDishes) ? 'checked' : '' }}>
                        <label class="form-check-label" for="dish{{ $dish->id }}">
                            {{ $dish->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="dishes">{{ __('Select beverages') }}</label>
            <div class="checkbox-group">
                @foreach($beverages as $beverage)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="beverages[]" value="{{ $beverage->id }}" {{ in_array($beverage->id, $selectedBeverages) ? 'checked' : '' }}>
                        <label class="form-check-label" for="dish{{ $beverage->id }}">
                            {{ $beverage->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
