<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_internacional_location'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genInternacionalLocationMgDAO implements InternacionalLocationDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_internacional_location'.
     *
     * @param InternacionalLocation $internacionalLocationDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($internacionalLocationDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_internacional_location;

        $internacionalLocationDTO->_id = new MongoID();
        unset($internacionalLocationDTO->id);

        $collection->insert($internacionalLocationDTO);

        return $internacionalLocationDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $countriesId, $providersId Composición de la clave primaria.
     *
     * @return InternacionalLocation Objeto que tiene como clave primaria $id
     */
    public function load($countriesId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_internacional_location;

        $keys = array();
		$keys["countriesId"] = (gettype($countriesId) == 'string') ? new MongoID($countriesId) : $countriesId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_internacional_location'
     *
     * @param InternacionalLocation $internacionalLocationDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_internacional_location'
     * @see executeUpdate()
     */
    public function update($internacionalLocationDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_internacional_location;

        unset($internacionalLocationDTO->id);

        $collection->save($internacionalLocationDTO);

        $internacionalLocationDTO->id = $internacionalLocationDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $countriesId, $providersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($countriesId, $providersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_internacional_location;

        $keys = array();
		$keys["countriesId"] = (gettype($countriesId) == 'string') ? new MongoID($countriesId) : $countriesId;
		$keys["providersId"] = (gettype($providersId) == 'string') ? new MongoID($providersId) : $providersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_internacional_location'.
     *
     * @return array Conjunto de registros de la tabla 'prv_internacional_location'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_internacional_location;

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
            $sql = 'SELECT * FROM prv_internacional_location ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_internacional_location LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_internacional_location' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_internacional_location' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_internacional_location ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_internacional_location'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_internacional_location';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_internacional_location' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_internacional_location' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos InternacionalLocation a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos InternacionalLocation
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_internacional_location' a un objeto de
     * tipo 'InternacionalLocation'
     *
     * @return InternacionalLocation
     *         Objeto que representa la tabla 'prv_internacional_location'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $internacionalLocationDTO = new InternacionalLocationDTO();
        $internacionalLocationDTO->_id = $row['_id'];
        $internacionalLocationDTO->id = $row['_id'];
        
		$internacionalLocationDTO->countriesId = $row['countriesId'];
		$internacionalLocationDTO->providersId = $row['providersId'];

        return $internacionalLocationDTO;
    }
}
?>
