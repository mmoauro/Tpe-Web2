<html>
<head>
    {include file="head.tpl"}
    <script src="app/js/comments.js"></script>
</head>
<body>
    {include file="navbar.tpl"}
    <div class="container">
        <h3>Celular: {$celular->modelo}</h3>
        <ul class="list-group">
            <li class="list-group-item">Marca: <a href="marcas/{$celular->id_marca}">{$celular->marca}</a></li>
            <li class="list-group-item">Especificaciones: {$celular->especificaciones}</li>
            {if $celular->imagen neq null}
                <li class="list-group-item">
                    <a href="{$celular->imagen}"><img width="300px" height="300px" src="{$celular->imagen}" alt="{$celular->modelo}"></a>
                    {if $status eq 1}
                        <a class="btn btn-danger" href="celular/removeimg/{$celular->id}"><i class="far fa-trash-alt "></i></a>
                    {/if}
                </li>
            {/if}
            {if $status eq 1}
                <li class="list-group-item"><a class="btn btn-danger" href="celular/remove/{$celular->id}"><i class="far fa-trash-alt "></i></a></li>
            {/if}
        </ul>
        <!-- Inputs para llevarme informacion a vue -->
        <input type="hidden" value="{$celular->id}" id="idCelular">
        <input type="hidden" value="{$idUser}" id="idUser">
        <input type="hidden" value="{$status}" id="userStatus">
        {include file="vue/comments.vue"}

    <!-- Si el usuario es administrador.... -->
    {if $status eq 1}
        
        <h3 class="container">Editar celular</h3>
        
        <form class="container" action="{$base_url}celular/edit/{$celular->id}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" placeholder="{$celular->modelo}" value="{$celular->modelo}" name="modelo" required>
            </div>
            <div class="form-group">
                <label>Especificaciones</label>
                <input type="text" class="form-control" value="{$celular->especificaciones}" name="especificaciones" placeholder="{$celular->especificaciones}" required>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" class="form-control" name="img">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    {/if}

</body>
</html>