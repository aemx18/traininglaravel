
@extends('layouts.app')

@section('header')
   <h4>Create Product</h4>
@endsection
@section('content')

<form action="{{ route('product.store') }}" method="POST"> {{-- tambah route terus --}}
    @csrf {{-- token --}}
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

      @error('name')
      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
      @enderror
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Product Description</label>
        <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc">
  
        @error('desc')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Product Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
  
        @error('stock')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Product Stock</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock">
  
        @error('stock')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

  
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

