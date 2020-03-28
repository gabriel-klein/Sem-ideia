<div class="col s12 12 offset-4 align-self-center z-depth-1">
  <div class="row">
    <div class="col">
      <h5 class="left-align">{{ $title }}</h5>
      @if ($empresa != "")
          <h6>{{ $empresa }}</h6>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col s8 m10">
      <p class="truncate"><i class="material-icons">comment</i>{{ $descricao }}</p>
    </div>
  </div>
</div>
