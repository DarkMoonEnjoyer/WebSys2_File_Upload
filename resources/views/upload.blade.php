<!DOCTYPE html>
<html>
<head>
    <title>LaravelImageUpload(Single+Multiple)</title>
</head>
<body>
    <h1>Single Image Upload</h1>
    <form action="{{route('photos.store.single')}} "method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
    </form>
    <h1>Multiple Images Upload</h1>
    <form action="{{route('photos.store.multiple')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]" multiple required>
    <button type="submit">Upload</button>
    </form>
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
    @foreach($images as $image)
        <img src="{{ asset('images/' . $image->image) }}" alt="{{ $image->image }}">
        <form action="{{ route('photos.destroy', $image->id) }}" method="post" style="display"inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
            </form>
    @endforeach
    {{ $images->links() }}
</body>
</html>