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
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{$celular->modelo}</td>
                <td><a href="marcas/{$celular->id_marca}">{$celular->marca}</a></td>
                <td>{$celular->especificaciones}</td>
                <td><a class="btn btn-danger" href="celular/remove/{$celular->id_marca}"><i class="far fa-trash-alt "></i></a></td>

            </tr>
        </tbody>
    </table>

    <h1>Editar celular</h1>

    <form action="{$base_url}celular/edit/{$celular->id}" method="post">
        <input type="text" placeholder="{$celular->modelo}" name="modelo" required>
        <input type="text" placeholder="{$celular->especificaciones}" name="especificaciones" required>
        <button>Editar</button>
    </form>

</body>
</html>