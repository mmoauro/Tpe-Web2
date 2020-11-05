<html>
<head>
    {include file="head.tpl"}
</head>
<body>
    {include file="navbar.tpl"}

    <table class="table table-bordered container">
        <thead>
        <tr>
            <th>Mail</th>
            <th>Rol del usuario</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
            {foreach from=$users item=user}
                <tr>
                    <td>{$user->email}</td>
                    <td>
                        <form method="POST" action="user/edit/{$user->id}">
                            <select name="role">
                                <option value="0" selected>Usuario</option>
                                <option value="1" {if $user->admin eq 1} selected {/if}>Administrador</option>
                            </select>
                            <button>Editar</button>
                        </form>
                    </td>
                    <td>
                    <a href="user/remove/{$user->id}"><i class="far fa-trash-alt "></i></a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

</body>
</html>