<footer class="p-5">
    <div class="card">
        <h5 class="card-header">Mes liens</h5>
        <div class="card-body">

            <h5 class="card-title">Naviguer dans votre site</h5>
            <ul>
                <li  class="list-group-item">>
            @if( substr(Route::currentRouteName(),0,5) === "admin")
                <a class="navbar-brand" href="{{ route('cds.cds') }}">Espace lecteur</a>
                @else
                <a class="navbar-brand" href="{{ route('dashboard') }}"> Espace admin</a>
            @endif
                </li>
                <li  class="list-group-item">>
                    <a class="navbar-brand" href="{{ route('cds.about') }}">A propos</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
