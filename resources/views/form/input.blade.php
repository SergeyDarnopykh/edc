<small class="badge badge-warning">{{ $errors->first($title) }}</small>
<input class="@if (!isset($type) || $type != 'file') form__input @endif"
       type="{{ $type ?? 'text' }}"
       name="{{ $title }}"
       value="{{ old($title) ?? ($value ?? '') }}"
       id="{{ $title  }}"
       data-role="placeholder-field"
       @if (!isset($required) || $required) required @endif
>
@if (!isset($type) || $type != 'file')
    <label class="form__label"
           for="{{ $title }}"
           data-role="placeholder-label"
    >
        {{ $label }}
    </label>
@endif
