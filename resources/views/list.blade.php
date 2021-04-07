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
                        vue admin list
                    </span>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
