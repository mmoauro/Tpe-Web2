<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}
    <h3 class="container">Marca: {$nombreMarca->nombre}</h3>
    {include file="tableCelulares.tpl"}

    <!-- Si el usuario es administrador.... -->
    <h3 class="container">Editar marca</h3>

    <form class="container" action="marca/edit/{$celular->id_marca}" method="post">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label>Origen</label>
            <input type="text" class="form-control" name="origen" placeholder="Origen" required>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>

</body>
</html>