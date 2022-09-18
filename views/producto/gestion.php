<h1>Gestionar Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small"> Crear Producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] !== 'complete'): ?>
    <strong class="alert_red">El producto no se ha creado </strong>
<?php endif;?>
<?php Utils::deleteSession('producto');?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] !== 'complete'): ?>
    <strong class="alert_red">El producto no se ha borrado </strong>
<?php endif;?>
<?php Utils::deleteSession('delete');?>

<table>
    <th>Id </th>
    <th>Nombre </th>
    <th>Precio </th>
    <th>Stock </th>
    <th>Acciones </th>

    <?php while ($pro = $productos->fetch_object()):?>
        <tr>
            <td><?=$pro->id;?> </td>
            <td><?=$pro->nombre;?> </td>
            <td><?=$pro->precio;?> </td>
            <td><?=$pro->stock;?> </td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
            </td>

        </tr>

    <?php endwhile;?>
</table>