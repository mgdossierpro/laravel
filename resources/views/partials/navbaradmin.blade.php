<header>
    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light p-2">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Menu
        </a>
        <a class="navbar-brand" href="{{ route('admin.add') }}">
            Ajouter un cd
        </a>
        <a class="navbar-brand" href="{{ route('admin.updateordelete') }}">
            Modifier ou supprimer un cd
        </a>
        <a class="navbar-brand" href="{{ route('cds.cds') }}">
            Retour aux vues users
        </a>
    </nav>
</header>
