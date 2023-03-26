@props(['id', 'name', 'label', 'required' => false, 'autocomplete' => 'off', 'rows' => 3])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <textarea name="{{ $name }}" id="{{ $id }}" rows="{{ $rows }}" {!! $attributes->merge([
        'class' => 'form-control',
    ]) !!}>{{ $slot }}</textarea>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
