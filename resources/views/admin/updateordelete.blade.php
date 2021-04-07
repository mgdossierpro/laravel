@extends('layouts.admin')

@section ('content')
    @if (\Session::has('info'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('info') !!}</li>
        </ul>
    </div>
    @endif
    @foreach ( $cds as $cd )
        <ul>
            <li>
                <p>{{ $cd['title'] }}</p>
                <p> Description :  {{ $cd['description'] }}</p>
                @foreach ( $cd->tags as $tag )
                <ul>
                    <li>
                        <p> Tag :{{ $tag->name }}</p>
                    </li>
                </ul>
               @endforeach

                <a href="{{ route('admin.updateform' , ['id' => $cd['id'] ]) }}"> <i class="bi bi-arrow-clockwise"></i>Update {{ $cd['title'] }}</a>
                <a href="{{ route('admin.delete' , ['id' => $cd['id'] ]) }}"> <i class="bi bi-trash"></i>Delete {{ $cd['title'] }}</a>
            </li>
        </ul>
    @endforeach
    @include('partials.footer')
@endsection
