<footer>
    @if( substr(Route::currentRouteName(),0,5) === "admin")
    <a href="{{ route('cds.cds') }}">Lien vers l'espace lecteur</a>
    @else
    <a href="{{ route('admin.auth') }}">>Lien vers l'espace admin</a>
    @endif
</footer>



