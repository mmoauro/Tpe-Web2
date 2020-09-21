<?php

class AppView {

    function __construct () {

    }

    function showHome ($celulares, $marcas) {
        ?>
            <table>
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Caracteristicas</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($celulares as $celular) {
                        ?>
                        <tr>
                            <td><?php echo $celular->modelo ?></td>
                            <td><a href="marcas/<?php echo $celular->id_marca?>/celulares"> <?php echo $celular->marca ?></a></td>
                            <td><?php echo $celular->especificaciones ?></td>
                            <td><a href="celular/<?php echo $celular->id?>">Link</a></td>
                            <td><a href="celular/remove/<?php echo $celular->id?>">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <h1>Agregar celular nuevo</h1>
            <form action="celular/add" method="post">
                    <input type="text" placeholder="Modelo" name="modelo" required>
                    <select name="marca">
                        <?php
                        foreach ($marcas as $marca) {
                            ?>
                            <option value="<?php echo $marca->id ?>"><?php echo $marca->nombre ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="text" placeholder="Caracteristicas" name="especificaciones" required>
                    <button>Agregar</button>
            </form>
        <?php
    }

    function showCelular($celular){ ?>
        <table>
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Caracteristicas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $celular->modelo ?></td>
                    <td><a href="<?php echo BASE_URL ?>marcas/<?php echo $celular->id_marca?>/celulares"> <?php echo $celular->marca ?></a></td>
                    <td><?php echo $celular->especificaciones ?></td>
                </tr>
            </tbody>
            
        </table>
        <h1>Editar celular</h1>
            <form action="<?php echo BASE_URL ?>celular/edit/<?php echo $celular->id ?>" method="post">
                <input type="text" value="<?php $celular->modelo ?>" name="modelo">
                <input type="text" value="<?php $celular->especificaciones ?>" name="especificaciones">
                <button>Editar</button>
            </form>
        <?php
    }

    function redirectHome () {
        header ('Location: '.BASE_URL.'home');
    }

    function redirectCelular ($id) {
        header('Location: '.BASE_URL."celular/$id");
    }
}

?>