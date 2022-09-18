<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<div id="container">
    <body>
    <!-- Cabecera-->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta logo">
            <a href="<?=base_url?>">
                Tienda de camiseta
            </a>
        </div>
    </header>
    <!-- Menu-->
    <?php $categorias =Utils::showCategorias();?>
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
            <?php while($cat = $categorias->fetch_object()): ?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                </li>
            <?php endwhile; ?>

        </ul>
    </nav>
<div id="content">
