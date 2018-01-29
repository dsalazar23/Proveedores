<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_certifications'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genCertificationMgDAO implements CertificationDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_certifications'.
     *
     * @param Certification $certificationDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($certificationDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_certifications;

        $certificationDTO->_id = new MongoID();
        unset($certificationDTO->id);

        $collection->insert($certificationDTO);

        return $certificationDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $id Composición de la clave primaria.
     *
     * @return Certification Objeto que tiene como clave primaria $id
     */
    public function load($id) {
        $db = Connection::getDatabase();

        $collection = $db->prv_certifications;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_certifications'
     *
     * @param Certification $certificationDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_certifications'
     * @see executeUpdate()
     */
    public function update($certificationDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_certifications;

        unset($certificationDTO->id);

        $collection->save($certificationDTO);

        $certificationDTO->id = $certificationDTO->_id;
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

        $collection = $db->prv_certifications;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_certifications'.
     *
     * @return array Conjunto de registros de la tabla 'prv_certifications'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_certifications;

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
            $sql = 'SELECT * FROM prv_certifications ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_certifications LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_certifications' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_certifications' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_certifications ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_certifications'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_certifications';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_certifications' a partir del valor en un campo particular.
     */
    public function queryByName($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_certifications;
        $cursor = $collection->find( array('name' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByVersion($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_certifications;
        $cursor = $collection->find( array('version' => $value) );

        return $this->getList( $cursor );
    }

    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_certifications' a partir del valor en un campo particular
     */
    public function deleteByName($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_certifications;
        $collection->remove( array('name' => $value) );

        return;
    }

    public function deleteByVersion($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_certifications;
        $collection->remove( array('version' => $value) );

        return;
    }

    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos Certification a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos Certification
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_certifications' a un objeto de
     * tipo 'Certification'
     *
     * @return Certification
     *         Objeto que representa la tabla 'prv_certifications'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $certificationDTO = new CertificationDTO();
        $certificationDTO->_id = $row['_id'];
        $certificationDTO->id = $row['_id'];
        
		$certificationDTO->name = $row['name'];
		$certificationDTO->version = $row['version'];

        return $certificationDTO;
    }
}
?>
