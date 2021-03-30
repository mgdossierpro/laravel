
@extends('layouts.admin')

@section ('content')
@if (count($errors->all()))

<ul>
    @foreach ($errors->all() as $error )
    <li>
        {{ $error }}
    </li>
    @endforeach
</ul>
@endif

<a href="{{ route('admin.updateordelete') }}"  type="button" class="btn btn-success">Modifier/supprimer un cd</a>

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
        {{ csrf_field() }}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@include('partials.footer')

@endsection
