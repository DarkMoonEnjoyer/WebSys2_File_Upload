@extends('design')
@section('content')
<div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Enginco Upload Activity</h1>
        <hr>
</div>
<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
            <h1>Single Image Upload</h1>
            <form action="{{route('photos.store.single')}} "method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <button type="submit">Upload</button>
            </form>
        </div>
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
            <h1>Multiple Images Upload</h1>
            <form action="{{route('photos.store.multiple')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="images[]" multiple required>
            <button type="submit">Upload</button>
            </form>
        </div>
    </div>
</div>
<div>
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
</div>
<hr>
<div class="container text-center">
    <div class="row">
        @foreach($images as $image)
        <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/' . $image->image) }}" alt="{{ $image->image }}">
                    <p class="card-title">{{ $image->image }}</p>
                    <form action="{{ route('photos.destroy', $image->id) }}" method="post" style="display-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    {{ $images->links() }}