<h1>Mis pedidos</h1>
<table>
    <tr>
        <th>N° Pedido</th>
        <th>Costo</th>
        <th>Fecha</th>

    </tr>
    <?php while($ped = $pedido->fetch_object()): ?>
        <tr>
            <td>
                <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"> <?=$ped->id?></a>
            </td>
            <td>
                S/.<?=$ped->costo?>
            </td>
            <td>
                <?=$ped->fecha?>
            </td>
        </tr>
    <?php endwhile;?>
</table>