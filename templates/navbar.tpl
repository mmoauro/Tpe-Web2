<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">Titulo pagina</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="marcas">Marcas</a>
            </li>
        </ul>
    </div>
    {if $logged eq false}
        <a href="login"><button class="btn btn-outline-success my-2 my-sm-0" type="button">Ingresar</button></a>
        <a href="signup"><button class="btn btn-outline-primary my-2 my-sm-0" type="button">Registrarse</button></a>
    {else}
        <a href="logout"><button class="btn btn-outline-danger my-2 my-sm-0" type="button">Logout</button></a>
    {/if}

</nav>