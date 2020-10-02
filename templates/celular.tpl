<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}
    <div class="container">
        <h3>Celular: {$celular->modelo}</h3>
        <ul class="list-group">
            <li class="list-group-item">Marca: <a href="marcas/{$celular->id_marca}">{$celular->marca}</a></li>
            <li class="list-group-item">Especificaciones: {$celular->especificaciones}</li>
            {if $isAdmin eq true}
                <li class="list-group-item"><a class="btn btn-danger" href="celular/remove/{$celular->id}"><i class="far fa-trash-alt "></i></a></li>
            {/if}
        </ul>

    </div>

    <!-- Si el usuario es administrador.... -->
    {if $isAdmin eq true}
        
        <h3 class="container">Editar celular</h3>
        
        <form class="container" action="{$base_url}celular/edit/{$celular->id}" method="post">
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" placeholder="{$celular->modelo}" value="{$celular->modelo}" name="modelo" required>
            </div>
            <div class="form-group">
                <label>Especificaciones</label>
                <input type="text" class="form-control" value="{$celular->especificaciones}" name="especificaciones" placeholder="{$celular->especificaciones}" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    {/if}

</body>
</html>