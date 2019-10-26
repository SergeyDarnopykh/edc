<small class="badge badge-warning">{{ $errors->first($title) }}</small>
<input class="form__input"
       type="text"
       name="{{ $title }}"
       value="{{ old($title) ?? ($value ?? '') }}"
       id="{{ $title  }}"
       data-role="placeholder-field"
       required
>
<label class="form__label"
       for="{{ $title }}"
       data-role="placeholder-label"
>
    {{ $label }}
</label>
