
<?php if (isset($edit)&& isset($cat) && is_object($cat)):?>
    <h1>Editar Categoría <?=$cat->nombre?></h1>
    <?php  $url_action = base_url."categoria/save&id=".$cat->id;    ?>

<?php else: ?>
    <h1>Crear nuevos Categoría 1</h1>
    <?php  $url_action = base_url."categoria/save";    ?>

<?php endif; ?>


<div class="form_container">

    <form action="<?=$url_action?>" method="post" >
        <!--el enctype="multipart/form-data" permite subir ficheros-->
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($cat)&&is_object($cat) ? $cat->nombre: ''; ?>">

        <input type="submit" value="Guardar">
    </form>
</div>







