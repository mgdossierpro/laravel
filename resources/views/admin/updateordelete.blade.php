@extends('layouts.admin')

@section ('content')
    @foreach ( $cds as $cd )
        <ul>
            <li>
                <p>{{ $cd['title'] }}</p>
                <p> Description :  {{ $cd['description'] }}</p>
                <a href="{{ route('admin.update' , ['id' => $cd['id'] ]) }}"> <img src="/open-iconic/svg/loop-circular.svg"> Update {{ $cd['title'] }}</a>
                <a href="{{ route('admin.delete' , ['id' => $cd['id'] ]) }}"> <img src="/open-iconic/svg/circle-x.svg"> Delete {{ $cd['title'] }}</a>
            </li>
        </ul>
    @endforeach
    @include('partials.footer')
@endsection
