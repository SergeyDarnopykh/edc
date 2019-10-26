<small class="badge badge-warning">{{ $errors->first($title) }}</small>
<textarea class="form__textarea"
          name="{{ $title }}"
          id="{{ $title }}"
          rows="10"
          data-role="placeholder-field"
          required
>{{ old($title) ?? ($value ?? '')  }}</textarea>
<label class="form__label"
       data-role="placeholder-label"
       for="{{ $title }}"
>
    {{ $label }}
</label>
