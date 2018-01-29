<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_selected_custom_fields'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genSelectedCustomFieldMgDAO implements SelectedCustomFieldDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_selected_custom_fields'.
     *
     * @param SelectedCustomField $selectedCustomFieldDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($selectedCustomFieldDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_selected_custom_fields;

        $selectedCustomFieldDTO->_id = new MongoID();
        unset($selectedCustomFieldDTO->id);

        $collection->insert($selectedCustomFieldDTO);

        return $selectedCustomFieldDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $id Composición de la clave primaria.
     *
     * @return SelectedCustomField Objeto que tiene como clave primaria $id
     */
    public function load($id) {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_fields;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_selected_custom_fields'
     *
     * @param SelectedCustomField $selectedCustomFieldDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_selected_custom_fields'
     * @see executeUpdate()
     */
    public function update($selectedCustomFieldDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_fields;

        unset($selectedCustomFieldDTO->id);

        $collection->save($selectedCustomFieldDTO);

        $selectedCustomFieldDTO->id = $selectedCustomFieldDTO->_id;
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

        $collection = $db->prv_selected_custom_fields;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_selected_custom_fields'.
     *
     * @return array Conjunto de registros de la tabla 'prv_selected_custom_fields'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_selected_custom_fields;

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
            $sql = 'SELECT * FROM prv_selected_custom_fields ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_selected_custom_fields LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_selected_custom_fields' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_selected_custom_fields' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_selected_custom_fields ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_selected_custom_fields'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_selected_custom_fields';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_selected_custom_fields' a partir del valor en un campo particular.
     */
    public function queryByName($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_selected_custom_fields;
        $cursor = $collection->find( array('name' => $value) );

        return $this->getList( $cursor );
    }

    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_selected_custom_fields' a partir del valor en un campo particular
     */
    public function deleteByName($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_selected_custom_fields;
        $collection->remove( array('name' => $value) );

        return;
    }

    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos SelectedCustomField a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos SelectedCustomField
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_selected_custom_fields' a un objeto de
     * tipo 'SelectedCustomField'
     *
     * @return SelectedCustomField
     *         Objeto que representa la tabla 'prv_selected_custom_fields'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $selectedCustomFieldDTO = new SelectedCustomFieldDTO();
        $selectedCustomFieldDTO->_id = $row['_id'];
        $selectedCustomFieldDTO->id = $row['_id'];
        
		$selectedCustomFieldDTO->name = $row['name'];

        return $selectedCustomFieldDTO;
    }
}
?>
