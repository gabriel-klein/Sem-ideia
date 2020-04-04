<option value="{{ $value }}" 
  {{ old($name) ? 
    ((old($name) == "$value") ? "selected" : '') :
    (isset($data) ?
      (($data == "$value") ? "selected" : '') : '')}}>
{{ $label }}
</option>