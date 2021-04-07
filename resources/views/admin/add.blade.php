
@extends('layouts.admin')

@section ('content')
    @include('partials.errorsforms')

    @if (\Session::has('info'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('info') !!}</li>
            </ul>
        </div>
    @endif


    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4>{{$errors->first()}}</h4>
    </div>
    @endif

    @if(isset($update))

    <form action="{{ route('admin.update') }}" method="post">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="title" value ="{{ $cd->title }}" aria-describedby="namehelp" placeholder="Enter the name of the cd" name="title" >
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" id="description" value ="{{ $cd->description }}" placeholder="Enter a description" name="description">
                <small id="description" class="form-text text-muted">You can add the date, the group and the catery of the cds.</small>
            </div>
            <div class="form-group">
               <select name="tag[]" multiple class="form-control">
                        @foreach ( $tags as $tag )
                        <option {{ (in_array($tag, $cd->tags->all())) ? ' checked' : '' }}  value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                </input> 
            </div>
            <input id="prodId" name="id" type="hidden" value="{{ $cd->id }}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @else
        <form action="{{ route('admin.create') }}" method="post">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="title" aria-describedby="namehelp" placeholder="Enter the name of the cd" name="title">
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
                <small id="description" class="form-text text-muted">You can add the date, the group and the catery of the cds.</small>
            </div>
            <div class="form-group">
                @foreach ( $tags as $tag )
                <input name="{{ $tag->name }}" class="form-check-input" type="checkbox" value="{{ $tag->id}}" id="flexCheckIndeterminate">
                    <label  class="form-check-label" for="flexCheckIndeterminate">
                       {{ $tag->name }}
                    </label>
                  @endforeach
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
    @include('partials.footer')
@endsection
