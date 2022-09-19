<h1>detalle del pedido</h1>
<?php if (isset($pedido)):?>
    <?php if(isset($_SESSION['admin'])) :?>
    <h3>Cambiar el estado del pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="post">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
            <select name="estado" id="">
                <option value="confirm" <?=$pedido->estado == 'confirm'? 'selected': '';?>>Pendiente</option>
                <option value="preparation"<?=$pedido->estado == 'preparation'? 'selected': '';?>>En preparación</option>
                <option value="ready"<?=$pedido->estado == 'ready'? 'selected': '';?>>Preparado para enviar</option>
                <option value="sended"<?=$pedido->estado == 'sended'? 'selected': '';?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif;?>

    <h3>Dirección de envío:</h3>
    Provincia: <?=$pedido->localidad?> <br>
    Ciudad:<?=$pedido->localidad?> <br>
    Dirección:<?=$pedido->direccion?> <br><br>

    <h3>Datos del pedido:</h3>
    Estado:<?=Utils::showStatus($pedido->estado)?><br>
    Número de pedido: <?=$pedido->id?> <br>
    Total a pagar: S/. <?=$pedido->costo?> <br>
    Productos:
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while($producto = $productos->fetch_object()): ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="" class="img_carrito">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" alt="">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
                </td>
                <td>
                    <?=$producto->precio?>
                </td>
                <td>
                    <?=$producto->unidades?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>