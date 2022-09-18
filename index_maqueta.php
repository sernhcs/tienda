<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Tienda de camisetas</title>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <div id="container">
        <body>
        <!-- Cabecera-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="camiseta logo">
                <a href="maqueta.php">
                   Tienda de camiseta
                </a>
            </div>
        </header>
        <!-- Menu-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <li>
                    <a href="">Categoria 1</a>
                </li>
                <li>
                    <a href="">Categoria 2</a>
                </li>
                <li>
                    <a href="">Categoria 3</a>
                </li>
                <li>
                    <a href="">Categoria 4</a>
                </li>
                <li>
                    <a href="">Categoria 5</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <!-- Barra lateral-->
            <aside id="lateral">
                <div id="login" class="block_aside"   >
                    <h3>Entrar a la web</h3>
                    <form action="" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li><a href="">Mis pedidos</a></li>
                        <li><a href="">Gestionar pedidos</a></li>
                        <li><a href="">Gestionar Categorias</a></li>
                    </ul>
                </div>
            </aside>

          <!-- Contenido central-->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>30 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta azul</h2>
                    <p>30 euros</p>
                    <a href=""class="button">Comprar</a>
                </div>
            </div>

        </div>
        <!-- Pie de pagina -->
        <footer id="footer">
            <p>Desarrollado por scsss &copy; <?=date('Y')?></p>
        </footer>
        </body>
    </div>

</html>