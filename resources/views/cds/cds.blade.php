@extends('layouts.master')
@section ('content')
  @include('partials.header')
    <p>CDS DISPONIBLES</p>
    @foreach ( $cds as $cd )
        <ul>
            <li>
                <p>{{ $cd->title }}</p>
                <p> Description :  {{ $cd->description }}</p>
                <a href="{{ route('cds.cddetails' , ['id' => $cd->id ]) }}"> <img src="/open-iconic/svg/circle-x.svg"> Détails{{ $cd->id }}</a>
            </li>
        </ul>
    @endforeach
  @include('partials.footer')
@endsection

