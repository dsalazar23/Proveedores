<?php
/**
 * Controlador para Proveedores
 *
 * @package     Controller
 * @author      Lantia SAS
 * @since       PHP 5
 */


require_once CONTROLLER . 'Controller.php';

/**
 * Controlador para Proveedores
 */
class ProvisionerController extends Controller {

	/**
	 * @GET /Home
	 *
	 * @AUTHORIZE
	 */
	public function DefaultView() {
		$provisionerDTOs = FactoryDAO::getProvisionerDAO()->queryAllDetails();
		
		include_once PAGE . 'Index.php';
	}
}