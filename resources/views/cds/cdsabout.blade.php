
  @extends('layouts.master')

  @section ('content')

  @include('partials.header')


      <div class="card" style="width: 18rem;">
        <div class="card-header">
         A propos
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>


  @include('partials.footer')

  @endsection

