<?php

require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo "Controlador Usuarios, acción index";
    }
    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    //para recoger los datos
    public function save(){

        if (isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']:false;
            $apellidos= isset($_POST['apellidos']) ? $_POST['apellidos']:false;
            $email= isset($_POST['email']) ? $_POST['email']:false;
            $password= isset($_POST['password']) ? $_POST['password']:false;

            $error = '';
            if (!is_string($nombre) || preg_match("/[0-9]+/", $nombre)){
                $error= 'nombre';
            }
            if (!is_string($apellidos) || preg_match("/[0-9]+/", $apellidos)){
                $error= 'apellidos';
            }
            if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error= 'email';
            }

            if (empty($password) || strlen($password)<5){
                $error= 'password';
            }
            if($error){
                $_SESSION['register'] = "failed";
                $_SESSION['error'] = $error;
                header("Location:".base_url.'usuario/registro');
                exit;
            }


             if ($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

    // para guardar los datos y redireccion

                $save = $usuario->save();
                if ($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
             }else{
                 $_SESSION['register'] = "failed";

             }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');
    }
    public function login(){
        if (isset($_POST)){
            //identificar al usuario
            //consulta a base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

    //para mantener el usuario logueado
            if ($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificación fallida';
            }

            //crear
        }
        header("Location:".base_url);
    }
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}














