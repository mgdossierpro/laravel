@extends('layouts.master')

@section ('content')

@include('partials.header')

    <p>Bienvenue sur le site des cds</p>

    <a href="{{ route('cds.cds') }}">Cliquez ici pour accèder à la liste</a>

    <div>
       <!-- <p> "<script>alert('hello')</script>" }} iterations </p>
        <p>!! "<script>alert('hello')</script>" !!} iterations </p> -->
    </div>

@include('partials.footer')

@endsection


