@extends('layouts.master')
@section ('content')
  @include('partials.navbaruser')
  <div class="row">
    <h2 class="mx-auto" >CDS DISPONIBLES</h2>
    @foreach ( $cds as $cd )
        <ul>
            <li>
                <p>{{ $cd->title }}</p>
                <p> Description :  {{ $cd->description }}</p>

                @foreach ( $cd->tags as $tag )
                <ul>
                    <li>
                        <p> Tag :{{ $tag->name }}</p>

                    </li>
                </ul>
               @endforeach

                <a href="{{ route('cds.cddetails' , ['id' => $cd->id ]) }}"> <i class="bi bi-bookmark-plus"></i> Les Détails de cet album</a>
            </li>
        </ul>
    @endforeach
  </div>
  <span >

  </span>
    {{ $cds->links() }}
  @include('partials.footer')
@endsection

