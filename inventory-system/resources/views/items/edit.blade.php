@extends('items.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $item->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" name="description" required>{{ $item->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" class="form-control" name="price" value="{{ $item->price }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to Item List</a>
    </form>
</div>
@endsection
