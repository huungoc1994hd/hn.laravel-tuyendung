
<select class="{{ $config['class'] }}" id="{{ $config['name'] }}" name="{{ $config['name'] }}">
    @foreach ($categoriesSelectData as $key => $item)
        <option value="{{ $key }}" {{ $config['defaultValue'] == $key ? "selected=selected" : '' }}>{{ $item }}</option>
    @endforeach
</select>
