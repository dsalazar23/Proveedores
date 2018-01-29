<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_occupations'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genOccupationMgDAO implements OccupationDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_occupations'.
     *
     * @param Occupation $occupationDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($occupationDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_occupations;

        $occupationDTO->_id = new MongoID();
        unset($occupationDTO->id);

        $collection->insert($occupationDTO);

        return $occupationDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $id Composición de la clave primaria.
     *
     * @return Occupation Objeto que tiene como clave primaria $id
     */
    public function load($id) {
        $db = Connection::getDatabase();

        $collection = $db->prv_occupations;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_occupations'
     *
     * @param Occupation $occupationDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_occupations'
     * @see executeUpdate()
     */
    public function update($occupationDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_occupations;

        unset($occupationDTO->id);

        $collection->save($occupationDTO);

        $occupationDTO->id = $occupationDTO->_id;
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

        $collection = $db->prv_occupations;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_occupations'.
     *
     * @return array Conjunto de registros de la tabla 'prv_occupations'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_occupations;

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
            $sql = 'SELECT * FROM prv_occupations ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_occupations LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_occupations' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_occupations' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_occupations ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_occupations'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_occupations';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_occupations' a partir del valor en un campo particular.
     */
    public function queryByActivity($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_occupations;
        $cursor = $collection->find( array('activity' => $value) );

        return $this->getList( $cursor );
    }

    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_occupations' a partir del valor en un campo particular
     */
    public function deleteByActivity($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_occupations;
        $collection->remove( array('activity' => $value) );

        return;
    }

    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Occupation a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Occupation
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_occupations' a un objeto de
     * tipo 'Occupation'
     *
     * @return Occupation
     *         Objeto que representa la tabla 'prv_occupations'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $occupationDTO = new OccupationDTO();
        $occupationDTO->_id = $row['_id'];
        $occupationDTO->id = $row['_id'];
        
		$occupationDTO->activity = $row['activity'];

        return $occupationDTO;
    }
}
?>
