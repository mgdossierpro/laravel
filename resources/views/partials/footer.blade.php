<footer class="p-5">
    <div class="card">
        <h5 class="card-header">Mes liens</h5>
        <div class="card-body">
            <h5 class="card-title">Naviguer dans votre site</h5>
            @if( substr(Route::currentRouteName(),0,5) === "admin")
                <a href="{{ route('cds.cds') }}">Lien vers l'espace lecteur</a>
                @else
                <a href="{{ route('admin.auth') }}">>Lien vers l'espace admin</a>
            @endif
        </div>
    </div>
</footer>
