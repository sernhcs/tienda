<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Registro fallido</strong>
<?php endif;
if(isset($_SESSION['error'])): ?>
    <br><strong class="alert_red">Error en <?php echo $_SESSION['error']; ?></strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>
<?php Utils::deleteSession('error'); ?>

<form action="<?=base_url?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" />

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" />

    <label for="email">Email</label>
    <input type="email" name="email" />

    <label for="password">Contraseña</label>
    <input type="password" name="password" />

    <input type="submit" value="Registrarse">
</form>