@extends('layouts.app')

@section('content')

  @include('partials.category')
  {{-- Modales --}}
  @include('partials.edit_category')
  @include('partials.product')
  @include('partials.create_edit_product')

@endsection
