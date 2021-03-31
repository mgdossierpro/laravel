@extends('layouts.admin')

@section ('content')
    @foreach ( $cds as $cd )
        <ul>
            <li>
                <p>{{ $cd['title'] }}</p>
                <p> Description :  {{ $cd['description'] }}</p>
                <a href="{{ route('admin.updateform' , ['id' => $cd['id'] ]) }}"> <i class="bi bi-arrow-clockwise"></i>Update {{ $cd['title'] }}</a>
                <a href="{{ route('admin.delete' , ['id' => $cd['id'] ]) }}"> <i class="bi bi-trash"></i>Delete {{ $cd['title'] }}</a>
            </li>
        </ul>
    @endforeach
    @include('partials.footer')
@endsection
