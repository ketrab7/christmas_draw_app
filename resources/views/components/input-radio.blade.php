<label class="inline-flex items-center ml-6">
    <input type="radio" class="form-radio accent-gray-800" name="{{ $name }}" value="{{ $value }}" {{ ($value == $checked) ? "checked" : ""}} />
    <span class="ml-2">{{ $slot }}</span>
</label>