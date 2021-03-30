@extends('layouts.admin')

@section ('content')

<ul>
    <li>
        <p>{{ $item['name'] }}</p>
        <a href="{{ route('admin.update' , ['id' => $item['id'] ]) }}"> <img src="/open-iconic/svg/loop-circular.svg"> Update {{ $item['name'] }}</a>
        <a href="{{ route('admin.delete' , ['id' => $item['id'] ]) }}"> <img src="/open-iconic/svg/circle-x.svg"> Delete {{ $item['name'] }}</a>
    </li>
</ul>

@include('partials.footer')

@endsection
