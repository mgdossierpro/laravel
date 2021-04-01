@extends('layouts.master')
@section ('content')
  @include('partials.header')
  <div class="row">
    <p>CDS DISPONIBLES</p>
    @foreach ( $cds as $cd )
        <ul>
            <li>
                <p>{{ $cd->title }}</p>
                <p> Description :  {{ $cd->description }}</p>
                <a href="{{ route('cds.cddetails' , ['id' => $cd->id ]) }}"> <i class="bi bi-bookmark-plus"></i> Les Détails de cet album</a>
            </li>
        </ul>
    @endforeach
  </div>
  <div class="row" style="max-height: 50px">
     {{ $cds->links() }}
  </div>
  @include('partials.footer')
@endsection

