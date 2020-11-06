<table class="table table-bordered container">
    <thead>
    <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Link producto</th>
        {if $status eq 1}
            <th>Eliminar</th>
        {/if}
    </tr>
    </thead>
    <tbody>
    {foreach from=$celulares item=celular}
        <tr>
            <td>{$celular->modelo}</td>
            <td><a href="marcas/{$celular->id_marca}/0">{$celular->marca}</a></td>
            <td><a class="btn btn-success" href="celular/{$celular->id}"><i class="fas fa-external-link-square-alt"></i></a></td>
            {if $status eq 1}
                <td><a class="btn btn-danger" href="celular/remove/{$celular->id}"><i class="far fa-trash-alt "></i></a></td>
            {/if}
        </tr>
    {/foreach}
    </tbody>
</table>
<div class="container">
    {if $offset gt 0}
        <a href="{$base_url}{$url}/{$offset - 1}">Anterior</a>
    {/if}
    {if $max neq true}
        <a href="{$base_url}{$url}/{$offset + 1}">Siguiente</a>
    {/if}

</div>