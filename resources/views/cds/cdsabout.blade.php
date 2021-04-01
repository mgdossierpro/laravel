@extends('layouts.master')
@section ('content')
  @include('partials.navbaruser')
      <div class="card" style="width: 18rem;">
        <div class="card-header">
         A propos
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ea eveniet pariatur quae sit.
                  Doloribus eligendi enim error libero magni maiores nobis odio porro provident voluptatem. Molestiae
                  natus quia voluptates!
              </p>
          </li>
          <li class="list-group-item">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ea eveniet pariatur quae sit.
                  Doloribus eligendi enim error libero magni maiores nobis odio porro provident voluptatem. Molestiae
                  natus quia voluptates!
              </p>
          </li>
          <li class="list-group-item">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ea eveniet pariatur quae sit.
                  Doloribus eligendi enim error libero magni maiores nobis odio porro provident voluptatem. Molestiae
                  natus quia voluptates!</p>
          </li>
        </ul>
      </div>
  @include('partials.footer')
@endsection

