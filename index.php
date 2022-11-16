<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    
    //include_once 'home.php';
    $rol= $user->getRol();
        if($rol=="Tecnico"){
            include_once 'home_tecnico.php';
        }
        else if($rol=="Administrador"){
            include_once 'home_administrador.php';
        }
        else if($rol=="Empleado"){
            include_once 'home_empleado.php';
        }

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    $name= $user-> getNombre();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $rol= $user->getRol();
        if($rol=="Tecnico"){
            include_once 'home_tecnico.php';
        }
        else if($rol=="Administrador"){
            include_once 'home_administrador.php';
        }
        else if($rol=="Empleado"){
            include_once 'home_empleado.php';
        }

        
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'login.php';
    }
}else{
    //echo "login";
    include_once 'login.php';
}



?>