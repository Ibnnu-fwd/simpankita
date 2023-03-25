@props(['id' => '', 'name' => '', 'label' => '', 'required' => false, 'type' => 'text', 'placeholder' => ''])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ __($label) }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <input id="{{ $id }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}" value="{{ old($name) }}" {{ $required ? 'required' : '' }} placeholder="{{$placeholder ? $placeholder  : ''}}" {{$type == 'password' ? 'autocomplete="on"' : ''}}/>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
