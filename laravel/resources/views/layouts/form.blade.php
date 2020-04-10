@push('loader')
    @include('layouts.components.loader')
@endpush
<div class="container" @if(isset($id)) id="{{$id}}" @endif>
  <div class="row" style="margin-top: 2em">
    <div class="{{ $col ?? "col s12 m10 offset-m1 l8 offset-l2" }}">
      <div class="card z-depth-2">
        @if (isset($top))
          {{ $top }}  
        @endif
          <div class="card-content">
              <span class="card-title center-align">{{ $title }}</span>
              {{ $content }}
          </div>
      </div>
    </div>
  </div>
</div>