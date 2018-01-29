<?php

/**
 * @generated
 * - Clase Generada Automaticamente - NO MODIFICAR MANUALMENTE
 * Esta clase opera sobre la tabla 'prv_users'. - Database MySql. -
 *
 * @package     DataAccess.dao
 * @subpackage  mysql.gen
 * @author      JpBaena13
 * @since       PHP 5
 */
 
 require_once(DATA_ACCESS . DS . 'Autogenerate' . DS . 'AbstractDAO.class.php');
 
class genUserMgDAO implements UserDAOInterface {

    /**
     * Inserta un registro a la tabla 'prv_users'.
     *
     * @param User $userDTO
     *        Objeto a insertar en la base de datos.
     */
    public function insert($userDTO) {

        $db = Connection::getDatabase();
        
        $collection = $db->prv_users;

        $userDTO->_id = new MongoID();
        unset($userDTO->id);

        $collection->insert($userDTO);

        return $userDTO->_id;
    }

    /**
     * Retorna el objeto de dominio que corresponde a la clave primaria
     * compuesta especificada.
     *
     * @param string $id Composición de la clave primaria.
     *
     * @return User Objeto que tiene como clave primaria $id
     */
    public function load($id) {
        $db = Connection::getDatabase();

        $collection = $db->prv_users;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $result = $collection->findOne( $keys );

        return $this->readRow($result);
    }
    
    /**
     * Actualiza el registro especificado en la tabla 'prv_users'
     *
     * @param User $userDTO
     *        Objeto con los datos a actualizar en la tabla 'prv_users'
     * @see executeUpdate()
     */
    public function update($userDTO) {
        $db = Connection::getDatabase();

        $collection = $db->prv_users;

        unset($userDTO->id);

        $collection->save($userDTO);

        $userDTO->id = $userDTO->_id;
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

        $collection = $db->prv_users;

        $keys = array();
		$keys["_id"] = (gettype($id) == 'string') ? new MongoID($id) : $id;

        $collection->remove( $keys );
    }

    /**
     * Retorna todos los registros de la tabla 'prv_users'.
     *
     * @return array Conjunto de registros de la tabla 'prv_users'.
     */
    public function queryAll() {
        $db = Connection::getDatabase();

        $collection = $db->prv_users;

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
            $sql = 'SELECT * FROM prv_users ORDER BY ' . $orderBy . ' ' . $type . ' LIMIT ' . $start . ',' . $pageSize;
        else
            $sql = 'SELECT * FROM prv_users LIMIT ' . $start . ',' . $pageSize;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Retorna todos los registros de la tabla 'prv_users' ordenado por
     * la columna especificada.
     *
     * @param string $orderColumn Nombre de la columna.
     *
     * @return array Conjunto de registros de la tabla 'prv_users' ordenados.
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM prv_users ORDER BY '.$orderColumn;
        $sqlQuery = new SqlQuery($sql);

        return $this->getList($sqlQuery);
    }

    /**
     * Elimina todas las filas de la tabla 'prv_users'
     *
     * @see executeUpdate()
     */
    public function clean() {
        $sql = 'DELETE FROM prv_users';
        $sqlQuery = new SqlQuery($sql);

        return $this->executeUpdate($sqlQuery);
    }

    /*
     * Las siguientes son el conjunto de funciones que permiten obtener registros
     * desde la tabla 'prv_users' a partir del valor en un campo particular.
     */
    public function queryByName($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $cursor = $collection->find( array('name' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByLastname($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $cursor = $collection->find( array('lastname' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByUsername($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $cursor = $collection->findOne( array('username' => $value) );

        return $this->readRow( $cursor );
    }

    public function queryByEmail($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $cursor = $collection->find( array('email' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByPassword($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $cursor = $collection->find( array('password' => $value) );

        return $this->getList( $cursor );
    }

    public function queryByType($value) {
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $cursor = $collection->find( array('type' => $value) );

        return $this->getList( $cursor );
    }

    
    /*
     * Las siguiente son el conjunto de funciones que permiten eliminar registros
     * desde la tabla 'prv_users' a partir del valor en un campo particular
     */
    public function deleteByName($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $collection->remove( array('name' => $value) );

        return;
    }

    public function deleteByLastname($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $collection->remove( array('lastname' => $value) );

        return;
    }

    public function deleteByUsername($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $collection->remove( array('username' => $value) );

        return;
    }

    public function deleteByEmail($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $collection->remove( array('email' => $value) );

        return;
    }

    public function deleteByPassword($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $collection->remove( array('password' => $value) );

        return;
    }

    public function deleteByType($value){
        $db = Connection::getDatabase();
        $collection = $db->prv_users;
        $collection->remove( array('type' => $value) );

        return;
    }

    

    // Los siguiente funciones  son la ejecución de mas bajo nivel para cada
    // una de las consultas creadas anteriormente.
    
    /**
     * Retorna un arreglo de objetos User a partir
     * de los datos especificados en el cursor.
     * 
     * @param  MongoCursor $cursor Conjunto de registros obtenidos desde la base de datos
     * 
     * @return Array Arreglo de objetos User
     */
    protected function getList( $cursor ) {
        $result = array();

        foreach ($cursor as $key ) {
            array_push($result, $this->readRow($key) );
        }

        return $result;
    }
     
    /**
     * Convierte una fila dada desde la tabla 'prv_users' a un objeto de
     * tipo 'User'
     *
     * @return User
     *         Objeto que representa la tabla 'prv_users'
     */
    protected function readRow($row) {
        if (!$row)
            return null;

        $userDTO = new UserDTO();
        $userDTO->_id = $row['_id'];
        $userDTO->id = $row['_id'];
        
		$userDTO->name = $row['name'];
		$userDTO->lastname = $row['lastname'];
		$userDTO->username = $row['username'];
		$userDTO->email = $row['email'];
		$userDTO->password = $row['password'];
		$userDTO->type = $row['type'];

        return $userDTO;
    }
}
?>
