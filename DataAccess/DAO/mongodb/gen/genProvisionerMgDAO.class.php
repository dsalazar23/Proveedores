<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_provisioners'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genProvisionerMgDAO implements ProvisionerDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_provisioners'.
     *
     * @param Provisioner $provisionerDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($provisionerDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_provisioners;

        $provisionerDTO->_id = new MongoID();
        unset($provisionerDTO->id);

        $collection->insert($provisionerDTO);

        return $provisionerDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $id Composición de la clave primaria.
     *
     * @return Provisioner Objeto que tiene como clave primaria $id
     */
    public function load($id) {
        $db = Connection::getDatabase();

        $collection = $db->prv_provisioners;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_provisioners'
     *
     * @param Provisioner $provisionerDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_provisioners'
     * @see executeUpdate()
     */
    public function update($provisionerDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_provisioners;

        unset($provisionerDTO->id);

        $collection->save($provisionerDTO);

        $provisionerDTO->id = $provisionerDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $id Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($id) {
        $db = Connection::getDatabase();

        $collection = $db->prv_provisioners;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_provisioners'.
     *
     * @return array Conjunto de registros de la tabla 'prv_provisioners'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_provisioners;

        $cursor = $collection->find();

        return $this->getList( $cursor );
    }

    /**
     * Retorna el número de registros limitado por $pageSize a partir del
     * registro $page además de organizar los registros por el campo $orderBy
     * aplicando el tipo de ordenamiento espeficiado en $type.
     *
     * @param int $start
     *        Registro a partir del cual comenzará la página a retornar.
     * @param int $pageSize
     *        Tamaño máximo de registros a retornar, esto es, el tamañan de página
     * @param string $orderBy
     *        Nombre del campo sobre el cual se aplicará un ordenamiento a los registros.
     * @param string $type
     *        Tipo de ordenamiento, esto es, Ascendente o Descendente.
     *
     * @return Arreglo de objetos de tipo 'notes'
     */
    public function queryLimit($start, $pageSize, $orderBy = null, $type='ASC') {
        if ($orderBy)
            $sql = 'SELECT * FROM prv_provisioners ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_provisioners LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_provisioners' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_provisioners' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_provisioners ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_provisioners'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_provisioners';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_provisioners' a partir del valor en un campo particular.
     */
    public function queryByName($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->findOne( array('name' => $value) );

        return $this->readRow( $cursor );
    }

    public function queryByDescription($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('description' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByContact($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('contact' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByPersonContact($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('person_contact' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByPhoneContact($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('phone_contact' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByAddress($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('address' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByWebsite($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('website' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByClintonList($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('clinton_list' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByAnnualIncome($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('annual_income' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByCenterIplusd($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $cursor = $collection->find( array('center_iplusd' => $value) );

        return $this->getList( $cursor );
    }

    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_provisioners' a partir del valor en un campo particular
     */
    public function deleteByName($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('name' => $value) );

        return;
    }

    public function deleteByDescription($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('description' => $value) );

        return;
    }

    public function deleteByContact($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('contact' => $value) );

        return;
    }

    public function deleteByPersonContact($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('person_contact' => $value) );

        return;
    }

    public function deleteByPhoneContact($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('phone_contact' => $value) );

        return;
    }

    public function deleteByAddress($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('address' => $value) );

        return;
    }

    public function deleteByWebsite($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('website' => $value) );

        return;
    }

    public function deleteByClintonList($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('clinton_list' => $value) );

        return;
    }

    public function deleteByAnnualIncome($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('annual_income' => $value) );

        return;
    }

    public function deleteByCenterIplusd($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_provisioners;
        $collection->remove( array('center_iplusd' => $value) );

        return;
    }

    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Provisioner a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Provisioner
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_provisioners' a un objeto de
     * tipo 'Provisioner'
     *
     * @return Provisioner
     *         Objeto que representa la tabla 'prv_provisioners'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $provisionerDTO = new ProvisionerDTO();
        $provisionerDTO->_id = $row['_id'];
        $provisionerDTO->id = $row['_id'];
        
		$provisionerDTO->name = $row['name'];
		$provisionerDTO->description = $row['description'];
		$provisionerDTO->contact = $row['contact'];
		$provisionerDTO->personContact = $row['personContact'];
		$provisionerDTO->phoneContact = $row['phoneContact'];
		$provisionerDTO->address = $row['address'];
		$provisionerDTO->website = $row['website'];
		$provisionerDTO->clintonList = $row['clintonList'];
		$provisionerDTO->annualIncome = $row['annualIncome'];
		$provisionerDTO->centerIplusd = $row['centerIplusd'];

        return $provisionerDTO;
    }
}
?>
