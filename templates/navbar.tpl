<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{$base_url}home">Titulo pagina</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="marcas">Marcas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marcas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <!-- TODO: Por cada marca un link
                        Cada vez que quiero mostrar la navbar tengo que hacer una query para traerme las marcas?
                     -->
                    {foreach from=$marcas item=marca}
                        <a class="dropdown-item" href="marcas/{$marca->id}">{$marca->nombre}</a>
                    {/foreach}
                </div>
            </li>
        </ul>
    </div>
</nav>