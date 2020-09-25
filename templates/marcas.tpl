<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Origen</th>
            <th>Celulares</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$marcas item=marca}
            <tr>
                <td>{$marca->nombre}</td>
                <td>{$marca->origen}</td>
                <td><a class="btn btn-secondary" href="marcas/{$marca->id}"><i class="far fa-mobile "></i></a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    <h1>Agregar Marca</h1>
    <form action="marca/add" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="origen" placeholder="Origen">
        <button>Agregar</button>
    </form>
</body>
</html>