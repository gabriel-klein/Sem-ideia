@extends('layouts.app')

@section('content')
  @typeUser('Cliente')
    
  @elsetypeUser('Empresa')
    
  @else 
    @include('admin.home')
  @endtypeUser
@endsection
