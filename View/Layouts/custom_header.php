<?php

/**
 * Cabecera para todas las páginas del sitio
 *
 * @package     View
 * @subpackage  Elements
 * @author      Lantia SAS
 */
?>

<!--[if lt IE 9]>
    <p class="chromeframe">Estas usando un <strong> navegador desactualizado</strong>. 
    Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> or 
    <a href="http://www.google.com/chromeframe/?redirect=true">activa Google Chrome Frame</a> 
    para mejorar tu experiencia.</p>
<![endif]-->

<div class="provHeaderContent">
	<div class="provHeaderCols provLogo"><img src="<?php echo WEBROOT_URL ?>img/default/logo.png" alt="Logo Proveedores" /></div>
	<div class="provHeaderCols provTitle"><h2>Proveedores</h2></div>
	<div class="provHeaderCols provLogout">
		<?php if($auth->hasSession()) { ?>
        	<a href="<?php echo ROOT_URL?>Login/Clear" class="closeSection"><?php __('logout')?></a>
    	<?php } ?>
	</div>
</div>