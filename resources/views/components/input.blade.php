@props(['id' => '', 'name' => '', 'label' => '', 'required' => false, 'type' => 'text', 'placeholder' => ''])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ __($label) }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}"
        placeholder="{{ __($placeholder) }}" @if ($required) required @endif
        @error($name) is-invalid @enderror {!! $attributes->merge(['class' => 'form-control']) !!} />
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
