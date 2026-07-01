@props(['value' => ''])

<input type="hidden" name="slug" class="slug-output" value="{{ old('slug', $value) }}">
@error('slug')
    <div class="text-danger fs-sm mt-1">{{ $message }}</div>
@enderror
