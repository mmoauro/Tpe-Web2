<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}

    <form action="{$base_url}celulareslike/0" method="GET" class="container">
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Ej: Xiaomi" required>
        </div>
        <button class="btn btn-primary">Buscar</button>
    </form>
    {include file="tableCelulares.tpl"}

    <!-- Si el usuario es administrador.... -->
    {if $status eq 1}

        <h3 class="container">Agregar celular nuevo</h3>

        <form class="container" action="celular/add" method="post" enctype="multipart/form-data">
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
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" class="form-control" name="img">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    {/if}

</body>
</html>