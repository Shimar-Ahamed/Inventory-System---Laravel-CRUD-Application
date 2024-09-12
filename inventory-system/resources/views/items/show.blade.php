@extends('items.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Item Details</h1>
    <div class="card shadow">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $item->name }}</p>
            <p><strong>Description:</strong> {{ $item->description }}</p>
            <p><strong>Price:</strong> Rs.{{ $item->price }}</p> 
            <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to Item List</a>
        </div>
    </div>
</div>
@endsection
