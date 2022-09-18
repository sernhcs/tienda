
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] !== 'complete'): ?>
    <strong class="alert_red">El producto no se ha borrado </strong>
<?php endif;?>
<?php Utils::deleteSession('delete');?>

<h1>Gestionar Categorías</h1>

<div class="button-float">
    <a href="<?=base_url?>categoria/crear" class="button button-small"> Crear Categoría</a>
</div>
<table>
    <th>Id </th>
    <th>Nombre </th>
    <th>Gestión </th>

    <?php while ($cat = $categorias->fetch_object()):?>
        <tr>
            <td><?=$cat->id;?> </td>
            <td><?=$cat->nombre;?> </td>
            <td>
                <div>
                    <a href="<?=base_url?>categoria/edit&id=<?=$cat->id;?>">
                        <i class='fas fa-pen' style='color:darkgoldenrod'></i>
                    </a>
                    <a href="<?=base_url?>categoria/delete&id=<?=$cat->id;?>">
                        <i class='far fa-trash-alt' style='color:red'></i>
                    </a>

                </div>
            </td>

        </tr>

    <?php endwhile;?>
</table>