@extends('items.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Items List</h1>
    
    <!-- Check if there are any items to display -->
    @if($items->isEmpty())
        <div class="alert alert-info">
            No items found. <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>
        </div>
    @else
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>Rs.{{ $item->price, 2 }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-info btn-sm mb-1">View</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>
    </div>
</div>
@endsection
