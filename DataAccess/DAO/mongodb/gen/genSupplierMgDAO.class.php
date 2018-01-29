<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_suppliers'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genSupplierMgDAO implements SupplierDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_suppliers'.
     *
     * @param Supplier $supplierDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($supplierDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_suppliers;

        $supplierDTO->_id = new MongoID();
        unset($supplierDTO->id);

        $collection->insert($supplierDTO);

        return $supplierDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $clientCompaniesId, $provisionersId Composición de la clave primaria.
     *
     * @return Supplier Objeto que tiene como clave primaria $id
     */
    public function load($clientCompaniesId, $provisionersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_suppliers;

        $keys = array();
		$keys["clientCompaniesId"] = (gettype($clientCompaniesId) == 'string') ? new MongoID($clientCompaniesId) : $clientCompaniesId;
		$keys["provisionersId"] = (gettype($provisionersId) == 'string') ? new MongoID($provisionersId) : $provisionersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_suppliers'
     *
     * @param Supplier $supplierDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_suppliers'
     * @see executeUpdate()
     */
    public function update($supplierDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_suppliers;

        unset($supplierDTO->id);

        $collection->save($supplierDTO);

        $supplierDTO->id = $supplierDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $clientCompaniesId, $provisionersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($clientCompaniesId, $provisionersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_suppliers;

        $keys = array();
		$keys["clientCompaniesId"] = (gettype($clientCompaniesId) == 'string') ? new MongoID($clientCompaniesId) : $clientCompaniesId;
		$keys["provisionersId"] = (gettype($provisionersId) == 'string') ? new MongoID($provisionersId) : $provisionersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_suppliers'.
     *
     * @return array Conjunto de registros de la tabla 'prv_suppliers'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_suppliers;

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
            $sql = 'SELECT * FROM prv_suppliers ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_suppliers LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_suppliers' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_suppliers' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_suppliers ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_suppliers'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_suppliers';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_suppliers' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_suppliers' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Supplier a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Supplier
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_suppliers' a un objeto de
     * tipo 'Supplier'
     *
     * @return Supplier
     *         Objeto que representa la tabla 'prv_suppliers'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $supplierDTO = new SupplierDTO();
        $supplierDTO->_id = $row['_id'];
        $supplierDTO->id = $row['_id'];
        
		$supplierDTO->clientCompaniesId = $row['clientCompaniesId'];
		$supplierDTO->provisionersId = $row['provisionersId'];

        return $supplierDTO;
    }
}
?>
