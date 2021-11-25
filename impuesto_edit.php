<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/lp3/lp3/avatar_1.png">
    <title>LP3</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php
    require 'ver_session.php'; /*VERIFICAR SESSION*/
        @session_start();/*Reanudar sesion*/
        require 'menu/css_lte.ctp'; 
    ?>
    <!--ARCHIVOS CSS-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php require 'menu/header_lte.ctp'; ?>
        <!--CABECERA PRINCIPAL-->
        <?php require 'menu/toolbar_lte.ctp'; ?>
        <!--MENU PRINCIPAL-->
        
        <div class="content-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="box box-warning">
                            <div class="box-header"> 
                                <i class="fa fa-edit"></i>
                                <h3 class="box-title">Editar impuestos</h3>
                                <div class="box-tools">
                                    <a href="impuesto_index.php" class="btn btn-primary btn-sm" data-title="Volver" rel="tooltip">
                                        <i class="fa fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                           
                            <form action="impuesto_control.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                <div class="box-body">
                                    <?php $resultado = consultas::get_datos("select * from tipo_impuesto where tipo_cod=" . $_GET['vtipo_cod']); ?>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="2" />
                                        <input type="hidden" name="vtipo_cod" value="<?php echo $resultado[0]['tipo_cod'] ?>" />
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Descripción:</label>
                                        <input type="hidden" name="vtipo_porcen" value="<?php echo $resultado[0]['tipo_porcen'] ?>" />
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="text" name="vtipo_descri" class="form-control" required="" autofocus="" value="<?php echo $resultado[0]['tipo_descri'] ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2 col-md-2 col-sm-2"> Porcentaje:</label>
                                        <div class="col-lg-8 col-md-8 col-sm-8">
                                            <input type="number" name="vtipo_porcen" class="form-control" required="" value="<?php echo $resultado[0]['tipo_porcen'] ?>" /> 
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default" data-title="Cancelar" rel="tooltip">
                                        <i class="fa fa-remove"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-warning pull-right" data-title="Guardar" rel="tooltip">
                                        <i class="fa fa-edit"></i> Actualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'menu/footer_lte.ctp'; ?>
        <!--ARCHIVOS JS-->
    </div>
    <?php require 'menu/js_lte.ctp'; ?>
    <!--ARCHIVOS JS-->
</body>

</html>
