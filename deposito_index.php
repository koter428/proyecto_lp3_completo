<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" type="image/x-icon" href="/lp3/img/user.png">
        <title>LP3</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <?php
        session_start(); /* Reanudar sesion */
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
                <!-- CONTENEDOR PRINCIPAL -->
                <div class="content">
                    <!-- FILA 1 -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                            if (!empty($_SESSION['mensaje'])) {
                                $classType = "alert-danger";
                                ?>
                                <div class="<?php echo $classType ?> alert " id="mensaje">
                                    <span class="glyphicon glyphicon-info-sign"></span>
                                    <?php
                                    echo $_SESSION['mensaje'];
                                    $_SESSION['mensaje'] = '';
                                    ?>
                                </div>
                              <?php } ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Deposito</h3>
                                    <div class="box-tools">
                                        <a href="deposito_print.php" class="btn btn-default btn-sm" data-title="Imprimir" rel="tooltip" target="print">
                                            <i class="fa fa-print"></i></a>
                                            <a href="deposito_add.php" class="btn btn-primary btn-sm pull-right" data-title='Agregar' rel='tooltip' data-placement='top'
                                        ><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form action="deposito_index.php_index.php" method="post" accept-charset="utf-8" class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-group custom-search-form">
                                                                <input type="search" class="form-control" name="buscar"
                                                                       placeholder="Ingrese valor a buscar..." autofocus=""/>
                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="btn btn-primary btn-flat" data-title="Buscar" 
                                                                            rel="tooltip"><i class="fa fa-search"></i></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            //consulta a la tabla $deposito
                                            $deposito = consultas::get_datos("select * from deposito where dep_descri != '0' order by dep_cod");
                                            $deposito = consultas::get_datos("select * from deposito where dep_descri  ilike '%".(isset($_REQUEST['buscar'])?$_REQUEST['buscar']:"")."%'order by dep_cod");
                                            //var_dump($deposito);
                                            if (!empty($deposito)) {
                                                ?>
                                                <div class="table-responsive">
                                                    <table class="table table-condensed table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>deposito</th>
                                                                <th>Descripcion</th>
                                                                <th>sucursal</th>
                                                                <th class="text-center">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($deposito as $dep) { ?>
                                                                <tr>
                                                                    <td data-title='descripcion'><?php echo $dep['dep_descri']; ?></td>
                                                                    <td data-title='sucursal'><?php echo $dep['id_sucursal']; ?></td>
                                                                    <td data-title='Acciones' class="text-center">
                                                                        <a href="deposito_edit.php?vtipo_cod=<?php echo $dep['dep_cod']; ?>" class="btn btn-warning btn-sm" role='button' data-title='Editar' rel='tooltip' data-placement='top'>
                                                                            <span class="glyphicon glyphicon-edit"></span>
                                                                        </a>
                                                                        <a href="deposito_del.php?vtipo_cod=<?php echo $dep['dep_cod']; ?>" class="btn btn-danger btn-sm" role='button' data-title='Borrar' rel='tooltip' data-placement='top'>
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                           <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } else { ?>
                                                <div class="alert alert-info flat">
                                                    <span class="glyphicon glyphicon-info-sign"></span>
                                                    No se han registrado tipo de deposito...
                                                </div>
                                                    <?php }
                                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN FILA 1 -->
                </div>
                <!-- FIN CONTENEDOR PRINCIPAL -->
            </div>
<?php require 'menu/footer_lte.ctp'; ?>
            <!--ARCHIVOS JS-->
        </div>
<?php require 'menu/js_lte.ctp'; ?>
        <!--ARCHIVOS JS-->
        <script>
            $("#mensaje").delay(4000).slideUp(200, function () {
                $(this).alert('close');
            })
        </script>
    </body>

</html>
