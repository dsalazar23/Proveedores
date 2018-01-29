<?php

/**
 * Esta clase representa el DAO para la tabla 'prv_provisioners'
 *
 * @package     DataAccess.dao
 * @subpackage  mysql
 * @author      JpBaena13
 * @since       PHP 5
 */
class ProvisionerMsDAO extends genProvisionerMsDAO {

	public function queryAllDetails (){

		$sql = "SELECT * 
				FROM prv_provisioners
				INNER JOIN prv_actions ON prv_provisioners.id = prv_actions.providers_id
				INNER JOIN prv_occupations ON prv_actions.occupations_id = prv_occupations.id";

		$sqlQuery = new SqlQuery($sql);

		$tab = QueryExecutor::execute($sqlQuery);
		// $r = Array();

		// foreach ($tab as $t) {
		// 	array_push($r, $t);			
		// }
		// return $r;
		// echo "<pre>";
		// print_r($tab);
		// echo "</pre>";
		
		// exit;
	}
	
}
?>