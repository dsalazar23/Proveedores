<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_selected_custom_values'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genSelectedCustomValueMgDAO implements SelectedCustomValueDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_selected_custom_values'.
     *
     * @param SelectedCustomValue $selectedCustomValueDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($selectedCustomValueDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_selected_custom_values;

        $selectedCustomValueDTO->_id = new MongoID();
        unset($selectedCustomValueDTO->id);

        $collection->insert($selectedCustomValueDTO);

        return $selectedCustomValueDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $id, $prvSelectedCustomFieldsId, $prvProvisionersId Composición de la clave primaria.
     *
     * @return SelectedCustomValue Objeto que tiene como clave primaria $id
     */
    public function load($id, $prvSelectedCustomFieldsId, $prvProvisionersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_values;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;
		$keys["prvSelectedCustomFieldsId"] = (gettype($prvSelectedCustomFieldsId) == 'string') ? new MongoID($prvSelectedCustomFieldsId) : $prvSelectedCustomFieldsId;
		$keys["prvProvisionersId"] = (gettype($prvProvisionersId) == 'string') ? new MongoID($prvProvisionersId) : $prvProvisionersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_selected_custom_values'
     *
     * @param SelectedCustomValue $selectedCustomValueDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_selected_custom_values'
     * @see executeUpdate()
     */
    public function update($selectedCustomValueDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_values;

        unset($selectedCustomValueDTO->id);

        $collection->save($selectedCustomValueDTO);

        $selectedCustomValueDTO->id = $selectedCustomValueDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $id, $prvSelectedCustomFieldsId, $prvProvisionersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($id, $prvSelectedCustomFieldsId, $prvProvisionersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_values;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;
		$keys["prvSelectedCustomFieldsId"] = (gettype($prvSelectedCustomFieldsId) == 'string') ? new MongoID($prvSelectedCustomFieldsId) : $prvSelectedCustomFieldsId;
		$keys["prvProvisionersId"] = (gettype($prvProvisionersId) == 'string') ? new MongoID($prvProvisionersId) : $prvProvisionersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_selected_custom_values'.
     *
     * @return array Conjunto de registros de la tabla 'prv_selected_custom_values'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_values;

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
            $sql = 'SELECT * FROM prv_selected_custom_values ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_selected_custom_values LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_selected_custom_values' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_selected_custom_values' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_selected_custom_values ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_selected_custom_values'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_selected_custom_values';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_selected_custom_values' a partir del valor en un campo particular.
     */
    public function queryByValues($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_selected_custom_values;
        $cursor = $collection->find( array('values' => $value) );

        return $this->getList( $cursor );
    }

    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_selected_custom_values' a partir del valor en un campo particular
     */
    public function deleteByValues($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_selected_custom_values;
        $collection->remove( array('values' => $value) );

        return;
    }

    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos SelectedCustomValue a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos SelectedCustomValue
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_selected_custom_values' a un objeto de
     * tipo 'SelectedCustomValue'
     *
     * @return SelectedCustomValue
     *         Objeto que representa la tabla 'prv_selected_custom_values'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $selectedCustomValueDTO = new SelectedCustomValueDTO();
        $selectedCustomValueDTO->_id = $row['_id'];
        $selectedCustomValueDTO->id = $row['_id'];
        
		$selectedCustomValueDTO->prvSelectedCustomFieldsId = $row['prvSelectedCustomFieldsId'];
		$selectedCustomValueDTO->prvProvisionersId = $row['prvProvisionersId'];
		$selectedCustomValueDTO->values = $row['values'];

        return $selectedCustomValueDTO;
    }
}
?>
