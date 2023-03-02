<input 
    type="checkbox" 
    name="{{ $name }}" 
    id="{{ $id }}"
    value="{{ $value }}" 
    class="mr-1 text-gray-800 bg-gray-100 rounded border-gray-300 focus:ring-gray-800 accent-gray-800 focus:ring-1"
    {{ ($checked == 'true') ? "checked" : "" }}
    />