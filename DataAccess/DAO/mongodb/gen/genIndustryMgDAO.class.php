<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_industry'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genIndustryMgDAO implements IndustryDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_industry'.
     *
     * @param Industry $industryDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($industryDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_industry;

        $industryDTO->_id = new MongoID();
        unset($industryDTO->id);

        $collection->insert($industryDTO);

        return $industryDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $categoriesId, $providersId Composición de la clave primaria.
     *
     * @return Industry Objeto que tiene como clave primaria $id
     */
    public function load($categoriesId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_industry;

        $keys = array();
		$keys["categoriesId"] = (gettype($categoriesId) == 'string') ? new MongoID($categoriesId) : $categoriesId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_industry'
     *
     * @param Industry $industryDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_industry'
     * @see executeUpdate()
     */
    public function update($industryDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_industry;

        unset($industryDTO->id);

        $collection->save($industryDTO);

        $industryDTO->id = $industryDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $categoriesId, $providersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($categoriesId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_industry;

        $keys = array();
		$keys["categoriesId"] = (gettype($categoriesId) == 'string') ? new MongoID($categoriesId) : $categoriesId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_industry'.
     *
     * @return array Conjunto de registros de la tabla 'prv_industry'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_industry;

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
            $sql = 'SELECT * FROM prv_industry ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_industry LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_industry' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_industry' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_industry ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_industry'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_industry';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_industry' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_industry' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Industry a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Industry
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_industry' a un objeto de
     * tipo 'Industry'
     *
     * @return Industry
     *         Objeto que representa la tabla 'prv_industry'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $industryDTO = new IndustryDTO();
        $industryDTO->_id = $row['_id'];
        $industryDTO->id = $row['_id'];
        
		$industryDTO->categoriesId = $row['categoriesId'];
		$industryDTO->providersId = $row['providersId'];

        return $industryDTO;
    }
}
?>
