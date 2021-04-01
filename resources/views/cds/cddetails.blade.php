
  @extends('layouts.master')

  @section ('content')

  @include('partials.navbaruser')

    <p>{{ $cd->title }}</p>
    @foreach ( $cd->titles as $titledetail )
        <ul>
            <li>
                <p>{{ $titledetail->name }}</p>
                <p>{{ $titledetail->duration }}</p>
            </li>
        </ul>
    @endforeach

  @include('partials.footer')

  @endsection
