<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_actions'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genActionMgDAO implements ActionDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_actions'.
     *
     * @param Action $actionDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($actionDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_actions;

        $actionDTO->_id = new MongoID();
        unset($actionDTO->id);

        $collection->insert($actionDTO);

        return $actionDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $occupationsId, $providersId Composición de la clave primaria.
     *
     * @return Action Objeto que tiene como clave primaria $id
     */
    public function load($occupationsId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_actions;

        $keys = array();
		$keys["occupationsId"] = (gettype($occupationsId) == 'string') ? new MongoID($occupationsId) : $occupationsId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_actions'
     *
     * @param Action $actionDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_actions'
     * @see executeUpdate()
     */
    public function update($actionDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_actions;

        unset($actionDTO->id);

        $collection->save($actionDTO);

        $actionDTO->id = $actionDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $occupationsId, $providersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($occupationsId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_actions;

        $keys = array();
		$keys["occupationsId"] = (gettype($occupationsId) == 'string') ? new MongoID($occupationsId) : $occupationsId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_actions'.
     *
     * @return array Conjunto de registros de la tabla 'prv_actions'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_actions;

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
            $sql = 'SELECT * FROM prv_actions ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_actions LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_actions' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_actions' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_actions ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_actions'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_actions';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_actions' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_actions' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Action a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Action
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_actions' a un objeto de
     * tipo 'Action'
     *
     * @return Action
     *         Objeto que representa la tabla 'prv_actions'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $actionDTO = new ActionDTO();
        $actionDTO->_id = $row['_id'];
        $actionDTO->id = $row['_id'];
        
		$actionDTO->occupationsId = $row['occupationsId'];
		$actionDTO->providersId = $row['providersId'];

        return $actionDTO;
    }
}
?>
