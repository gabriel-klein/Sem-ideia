@extends('layouts.app')

@section('content')
  @typeUser('Cliente')
    @include('cliente.home')
  @elsetypeUser('Empresa')
    @include('empresa.home')
  @else 
    @include('admin.home')
  @endtypeUser
@endsection
