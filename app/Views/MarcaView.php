<?php

class MarcaView {

    function __construct () {

    }

    function showMarcas ($marcas) {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Origen</th>
                        <th>Celulares</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($marcas as $marca) {
                        ?>
                        <tr>
                            <td><?php echo $marca->nombre ?></td>
                            <td><?php echo $marca->origen ?></td>
                            <td><a href="marcas/<?php echo $marca->id?>/celulares">Celulares</a></td>
                            <td><a href="marca/remove/<?php echo $marca->id?>">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <h1>Agregar Marca</h1>
            <form action="marca/add" method="post">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="text" name="origen" placeholder="Origen">
                    <button>Agregar</button>
            </form>
        <?php
    }

    function showCelularesMarca ($celulares) {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Especificaciones</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($celulares as $celular) {
                        ?>
                        <tr>
                            <td><?php echo $celular->modelo ?></td>
                            <td><?php echo $celular->marca ?></td>
                            <td><?php echo $celular->especificaciones ?></td>
                            <td><a href="<?php echo BASE_URL ?>celular/<?php echo $celular->id?>">Link</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <h1>Editar marca</h1>
            <form action="<?php echo BASE_URL ?>marca/edit/<?php echo $celular->id_marca ?>" method="post">
                <input type="text" name="nombre" placeholder="<?php echo $celular->marca ?>">
                <input type="text" name="origen">
                <button>Editar</button>
            </form>
        <?php
    }

    function redirectMarcas () {
        header ('Location: '.BASE_URL.'marcas');
    }

    function redirectCelularesMarca ($id) {
        header ('Location: '.BASE_URL."marcas/$id/celulares");
    }
}

?>