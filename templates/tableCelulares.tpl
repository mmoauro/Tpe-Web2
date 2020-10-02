<table class="table table-bordered container">
    <thead>
    <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Link producto</th>
        {if $isAdmin eq true}
            <th>Eliminar</th>
        {/if}
    </tr>
    </thead>
    <tbody>
    {foreach from=$celulares item=celular}
        <tr>
            <td>{$celular->modelo}</td>
            <td><a href="marcas/{$celular->id_marca}">{$celular->marca}</a></td>
            <td><a class="btn btn-success" href="celular/{$celular->id}"><i class="fas fa-external-link-square-alt"></i></a></td>
            {if $isAdmin eq true}
                <td><a class="btn btn-danger" href="celular/remove/{$celular->id}"><i class="far fa-trash-alt "></i></a></td>
            {/if}
        </tr>
    {/foreach}
    </tbody>
</table>