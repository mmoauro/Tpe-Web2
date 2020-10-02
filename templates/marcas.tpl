<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}
    <table class="table table-bordered container">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Origen</th>
            <th>Celulares</th>
            {if $isAdmin eq true}
                <th>Eliminar</th>
            {/if}
        </tr>
        </thead>
        <tbody>
        {foreach from=$marcas item=marca}
            <tr>
                <td>{$marca->nombre}</td>
                <td>{$marca->origen}</td>
                <td><a class="btn btn-secondary" href="marcas/{$marca->id}"><i class="far fa-mobile "></i></a></td>
                {if $isAdmin eq true}
                    <td><a class="btn btn-danger" href="marca/remove/{$marca->id}"><i class="far fa-trash "></i></a></td>
                {/if}
            </tr>
        {/foreach}
        </tbody>
    </table>

    <!-- Si el usuario es administrador...-->
    {if $isAdmin eq true}
        
        <h3 class="container">Agregar Marca</h3>

        <form class="container" action="marca/add" method="post">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label>Origen</label>
                <input type="text" class="form-control" name="origen" placeholder="Origen" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    {/if}
</body>
</html>