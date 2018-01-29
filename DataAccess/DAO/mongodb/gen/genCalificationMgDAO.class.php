<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_califications'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genCalificationMgDAO implements CalificationDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_califications'.
     *
     * @param Calification $calificationDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($calificationDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_califications;

        $calificationDTO->_id = new MongoID();
        unset($calificationDTO->id);

        $collection->insert($calificationDTO);

        return $calificationDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $certificationsId, $providersId Composición de la clave primaria.
     *
     * @return Calification Objeto que tiene como clave primaria $id
     */
    public function load($certificationsId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_califications;

        $keys = array();
		$keys["certificationsId"] = (gettype($certificationsId) == 'string') ? new MongoID($certificationsId) : $certificationsId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_califications'
     *
     * @param Calification $calificationDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_califications'
     * @see executeUpdate()
     */
    public function update($calificationDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_califications;

        unset($calificationDTO->id);

        $collection->save($calificationDTO);

        $calificationDTO->id = $calificationDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $certificationsId, $providersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($certificationsId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_califications;

        $keys = array();
		$keys["certificationsId"] = (gettype($certificationsId) == 'string') ? new MongoID($certificationsId) : $certificationsId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_califications'.
     *
     * @return array Conjunto de registros de la tabla 'prv_califications'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_califications;

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
            $sql = 'SELECT * FROM prv_califications ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_califications LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_califications' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_califications' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_califications ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_califications'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_califications';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_califications' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_califications' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Calification a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Calification
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_califications' a un objeto de
     * tipo 'Calification'
     *
     * @return Calification
     *         Objeto que representa la tabla 'prv_califications'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $calificationDTO = new CalificationDTO();
        $calificationDTO->_id = $row['_id'];
        $calificationDTO->id = $row['_id'];
        
		$calificationDTO->certificationsId = $row['certificationsId'];
		$calificationDTO->providersId = $row['providersId'];

        return $calificationDTO;
    }
}
?>
