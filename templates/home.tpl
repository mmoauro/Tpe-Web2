<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Especificaciones</th>
            <th>Link producto</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
            {foreach from=$celulares item=celular}
                <tr>
                    <td>{$celular->modelo}</td>
                    <td><a href="marcas/{$celular->id_marca}">{$celular->marca}</a></td>
                    <td>{$celular->especificaciones}</td>
                    <td><a class="btn btn-success" href="celular/{$celular->id}"><i class="fas fa-external-link-square-alt"></i></a></td>
                    <td><a class="btn btn-danger" href="celular/remove/{$celular->id}"><i class="far fa-trash-alt "></i></a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    <!-- Si vienen las marcas muestro el formulario para agregar celular
     Si no vienen es porque estoy viendo los celulares de una marca
     Si no vienen marcas muestro el formulario para editar una marca
     -->
    {if $marcas neq null}
        <h1>Agregar celular nuevo</h1>
        <form action="celular/add" method="post">
            <input type="text" placeholder="Modelo" name="modelo" required>
            <select name="marca">
                {foreach from=$marcas item=marca}
                    <option value="{$marca->id}">{$marca->nombre}</option>
                {/foreach}
            </select>
            <input type="text" placeholder="Caracteristicas" name="especificaciones" required>
            <button>Agregar</button>
        </form>
    {else}
        <h1>Editar marca</h1>
        <form action="marca/edit/{$celular->id_marca}" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="origen" placeholder="Origen">
            <button>Editar</button>
        </form>
    {/if}

</body>
</html>