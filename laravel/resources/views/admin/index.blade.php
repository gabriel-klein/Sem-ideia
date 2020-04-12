@extends('layouts.app')

@section('content')

<div class="fixed-action-btn">
  <a class="btn-floating btn-large blue pulse" href="{{route('admin.create')}}">
      <i class="large material-icons">add</i>
  </a>
</div>

@endsection