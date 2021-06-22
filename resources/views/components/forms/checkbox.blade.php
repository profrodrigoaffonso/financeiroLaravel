<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" {{ @$valueBd == $value ? 'checked' : '' }} value="{{ $value }}" id="{{ $name }}" name="{{ $id }}">
    <label class="form-check-label" for="correntista">{{ $label }}</label>
</div>