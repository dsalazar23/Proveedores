<?php

/**
 * Vista para página principal de usuarios autenticados.
 *
 * @package     View
 * @subpackage  App
 * @author      Lantia SAS
 */
?>

<!DOCTYPE html>
<html lang="<?php echo i18n::getLang() ?>">
    <head>
        <title><?php __('home_title')?></title>

        <meta name="description" content="<?php __('home_description')?>">

        <!-- Importando las cabeceras por defecto-->
        <?php require VIEW . 'Layouts' . DS . 'head.php'; ?>

        <!--Stylesheet-->
        <link rel="stylesheet" type="text/css" href="<?php echo WEBROOT_URL ?>css/home.css" media="screen" />
    </head>

    <body>
        <div class="provContentWrapper">
            <header class="provHeaderWrapper">
                <?php require VIEW . 'Layouts' . DS . 'custom_header.php'; ?>
            </header>

            <div class="provMainWrapper">
                <h2 class="provTitlePage">Listado de proveedores</h2>
                <table class="provTable">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Actividades</th>
                        <th>País</th>
                        <th>Ciudad</th>
                        <th>Sector</th>
                        <th>Contacto</th>
                        <th>Persona de contacto</th>
                        <th>Teléfono de contacto</th>
                        <th>Dirección</th>
                        <th>Sitio web</th>
                        <th>Lista clinton</th>
                        <th>Ingresos anuales</th>
                        <th>Centros de I+D</th>
                    </thead>
                    <tbody>
                        <!-- <?php 
                            foreach ($providersDTOs as $providersDTO) { 
                                
                        ?>
                        <td><?php echo $providersDTO->id; ?></td>
                        <td><?php echo $providersDTO->name; ?></td>
                        <td><?php echo $providersDTO->description; ?></td>
                        <td><?php echo $providersDTO->contact; ?></td>
                        <td><?php echo $providersDTO->personContact; ?></td>
                        <td><?php echo $providersDTO->phoneContact; ?></td>
                        <td><?php echo $providersDTO->address; ?></td>
                        <td><?php echo $providersDTO->website; ?></td>
                        <td><?php echo $providersDTO->clintonList; ?></td>
                        <td><?php echo $providersDTO->annualIncome; ?></td>
                        <td><?php echo $providersDTO->centerIplusd; ?></td>
                        <?php } ?> -->
                    </tbody>
                </table>
            </div>

            <footer class="provFooter">
                <?php require VIEW . 'Layouts' . DS . 'custom_footer.php' ?>
            </footer>
        </div>


        <!--Script para esta página-->
        <script type="text/javascript" src="<?php echo WEBROOT_URL ?>js/home.js"></script>
    </body>
</html>