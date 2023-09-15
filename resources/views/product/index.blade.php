


@extends('layouts.app')

@section('header')
   <h4>Products</h4>
@endsection
@section('content')
    
<div class="d-flex justify-content-end">
    <a class="btn btn-success" href="{{ url(route('product.create')) }}"> <i class="bi bi-clipboard-plus-fill"></i> Add New Product</a>
</div>
{{-- <p>List of Products</p> --}}
<table class="table table-secondary mt-3">
    <thead>
        @php 
        $index = 1
      
        @endphp


    

      <tr class="table-dark">
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
      <tr>
        <th scope="row" >{{ $index++ }}</th>
        <td>{{ $product->name }}</td>
        <td>{{ $product->desc }}</td>
        <td>RM {{ $product->price }}</td>
        <td>{{$product->stock}} Units</td>
        <td>
          {{-- Edit --}}
          <form method="POST" action="{{ route('products.edit', $product->id)}}">
            @csrf
            @method('PUT')
          <a class="btn btn-warning"> <i class="bi bi-pencil-square "></i></a>
          </form>
          {{-- End Edit --}}
          
          {{-- Delete --}}
          <form method="POST" action="{{ route('products.destroy', $product->id) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash3-fill"></i></button>
        </form>
        
        </td>
      </tr>
      <tr>
        @empty

        <tr>
            <th colspan="6" scope="row" class="text-center">The product is not found</th>
        </tr>
        @endforelse
    </tbody>
  </table>
@endsection