<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_purpose'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genPurposeMgDAO implements PurposeDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_purpose'.
     *
     * @param Purpose $purposeDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($purposeDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_purpose;

        $purposeDTO->_id = new MongoID();
        unset($purposeDTO->id);

        $collection->insert($purposeDTO);

        return $purposeDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $productsId, $providersId Composición de la clave primaria.
     *
     * @return Purpose Objeto que tiene como clave primaria $id
     */
    public function load($productsId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_purpose;

        $keys = array();
		$keys["productsId"] = (gettype($productsId) == 'string') ? new MongoID($productsId) : $productsId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_purpose'
     *
     * @param Purpose $purposeDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_purpose'
     * @see executeUpdate()
     */
    public function update($purposeDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_purpose;

        unset($purposeDTO->id);

        $collection->save($purposeDTO);

        $purposeDTO->id = $purposeDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $productsId, $providersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($productsId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_purpose;

        $keys = array();
		$keys["productsId"] = (gettype($productsId) == 'string') ? new MongoID($productsId) : $productsId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_purpose'.
     *
     * @return array Conjunto de registros de la tabla 'prv_purpose'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_purpose;

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
            $sql = 'SELECT * FROM prv_purpose ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_purpose LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_purpose' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_purpose' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_purpose ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_purpose'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_purpose';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_purpose' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_purpose' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Purpose a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Purpose
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_purpose' a un objeto de
     * tipo 'Purpose'
     *
     * @return Purpose
     *         Objeto que representa la tabla 'prv_purpose'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $purposeDTO = new PurposeDTO();
        $purposeDTO->_id = $row['_id'];
        $purposeDTO->id = $row['_id'];
        
		$purposeDTO->productsId = $row['productsId'];
		$purposeDTO->providersId = $row['providersId'];

        return $purposeDTO;
    }
}
?>
