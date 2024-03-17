<select name="{{ $name }}" id="{{ $name }}" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

