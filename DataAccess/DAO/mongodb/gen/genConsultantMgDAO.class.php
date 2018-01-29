<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_consultant'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genConsultantMgDAO implements ConsultantDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_consultant'.
     *
     * @param Consultant $consultantDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($consultantDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_consultant;

        $consultantDTO->_id = new MongoID();
        unset($consultantDTO->id);

        $collection->insert($consultantDTO);

        return $consultantDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $prvClientCompaniesId, $prvUsersId Composición de la clave primaria.
     *
     * @return Consultant Objeto que tiene como clave primaria $id
     */
    public function load($prvClientCompaniesId, $prvUsersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_consultant;

        $keys = array();
		$keys["prvClientCompaniesId"] = (gettype($prvClientCompaniesId) == 'string') ? new MongoID($prvClientCompaniesId) : $prvClientCompaniesId;
		$keys["prvUsersId"] = (gettype($prvUsersId) == 'string') ? new MongoID($prvUsersId) : $prvUsersId;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_consultant'
     *
     * @param Consultant $consultantDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_consultant'
     * @see executeUpdate()
     */
    public function update($consultantDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_consultant;

        unset($consultantDTO->id);

        $collection->save($consultantDTO);

        $consultantDTO->id = $consultantDTO->_id;
    }
    
    /**
     * Elimina el registro que tiene clave primariaespecificada desde la 
     * base de datos.
     *
     * @param <type> $prvClientCompaniesId, $prvUsersId Clave primaria compuesta del registro a eliminar.
     * @see executeUpdate()
     */
    public function delete($prvClientCompaniesId, $prvUsersId) {
        $db = Connection::getDatabase();

        $collection = $db->prv_consultant;

        $keys = array();
		$keys["prvClientCompaniesId"] = (gettype($prvClientCompaniesId) == 'string') ? new MongoID($prvClientCompaniesId) : $prvClientCompaniesId;
		$keys["prvUsersId"] = (gettype($prvUsersId) == 'string') ? new MongoID($prvUsersId) : $prvUsersId;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_consultant'.
     *
     * @return array Conjunto de registros de la tabla 'prv_consultant'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_consultant;

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
            $sql = 'SELECT * FROM prv_consultant ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_consultant LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_consultant' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_consultant' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_consultant ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_consultant'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_consultant';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_consultant' a partir del valor en un campo particular.
     */
    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_consultant' a partir del valor en un campo particular
     */
    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Consultant a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Consultant
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_consultant' a un objeto de
     * tipo 'Consultant'
     *
     * @return Consultant
     *         Objeto que representa la tabla 'prv_consultant'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $consultantDTO = new ConsultantDTO();
        $consultantDTO->_id = $row['_id'];
        $consultantDTO->id = $row['_id'];
        
		$consultantDTO->prvClientCompaniesId = $row['prvClientCompaniesId'];
		$consultantDTO->prvUsersId = $row['prvUsersId'];

        return $consultantDTO;
    }
}
?>
