<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Space ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span>
                        vue admin add
                    </span>
                    
                    @include('partials.errorsforms')

                    @if (\Session::has('info'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('info') !!}</li>
                            </ul>
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
                                    <select name="tag[]" multiple="true" class="form-control">
                                                @foreach ( $tags as $tag )
                                                <option {{ (in_array($tag->id,$tagsForView)) ? 'selected=selected' : '' }} value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                    </select>
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
                                <select name="tag[]" multiple class="form-control">
                                            @foreach ( $tags as $tag )
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                </input>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                    @include('partials.footer')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
