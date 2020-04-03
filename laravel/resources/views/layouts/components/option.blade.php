<option value="{{ $value }}" 
  {{ ((old($name) == $value) || ($data == $value)) ? "selected" : "" }}>
  {{ $label }}
</option>