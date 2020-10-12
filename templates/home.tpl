<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}
    {include file="tableCelulares.tpl"}

    <!-- Si el usuario es administrador.... -->
    {if $status eq 1}

        <h3 class="container">Agregar celular nuevo</h3>

        <form class="container" action="celular/add" method="post">
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" placeholder="Modelo" name="modelo" required>
            </div>
            <div class="form-group">
                <label>Marca</label>
                <select class="form-control" name="marca">
                    {foreach from=$marcas item=marca}
                        <option value="{$marca->id}">{$marca->nombre}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <label>Caracteristicas</label>
                <input type="text" class="form-control" placeholder="Caracteristicas" name="especificaciones" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    {/if}

</body>
</html>