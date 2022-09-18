<?php if (isset($_SESSION['identity'])):?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Ver las compras</a>
    </p>

    <h3>Dirección para envío</h3>
    <form action="<?=base_url.'pedido/add'?>" method="post">
        <label for="provincia">Provincias</label>
        <input type="text" name="provincia" required>

        <label for="localidad">Ciudad</label>
        <input type="text" name="localidad" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar pedido">
    </form>
<?php else:?>
    <h1>Registrate</h1>
    <p>Logueate</p>
<?php endif;?>
