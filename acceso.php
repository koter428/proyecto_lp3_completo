<?php
@session_start();
require './clases/conexion.php';

//echo "Usuario:".$_REQUEST['usuario'];
//echo "   Clave:".$_REQUEST['clave'];

$sql = "select * from v_usuarios where usu_nick='".$_REQUEST['usuario']
        ."' and usu_clave=md5('".$_REQUEST['clave']."')";



$resultado = consultas::get_datos($sql);




if ($resultado[0]['usu_cod']==null) {
    $_SESSION['#error'] = 'Usuario o contraseña incorrectos';
    header('location:index.php');
}else{
    $_SESSION['usu_cod']=$resultado[0]['usu_cod'];
    $_SESSION['usu_nick']=$resultado[0]['usu_nick'];
    $_SESSION['usu_foto']='';
    $_SESSION['emp_cod']=$resultado[0]['emp_cod'];
    $_SESSION['nombres']=$resultado[0]['empleado'];
    $_SESSION['cargo']=$resultado[0]['car_descri'];
    $_SESSION['gru_cod']=$resultado[0]['gru_cod'];
    $_SESSION['grupo']=$resultado[0]['gru_nombre'];
    $_SESSION['id_sucursal']=$resultado[0]['id_sucursal'];
    $_SESSION['sucursal']=$resultado[0]['suc_descri'];
    header('location:menu.php');
}

?>
  <!--<?php require 'menu/js_lte.ctp'; ?>
        <script>
            $("#error").delay(4000).slideUp(200,function(){
                $(this).alert('close');
            })
        </script>-->