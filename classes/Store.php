<?php
namespace FwTest\Classes;

class Store
{
    /**
     * The table name
     *
     * @access  protected
     * @var     string
     */
    protected static $table_name = 'magasin';

    /**
     * The primary key name
     *
     * @access  protected
     * @var     string
     */
    protected static $pk_name = 'magasin_id';

    /**
     * The store name
     *
     * @access  protected
     * @var     string
     */
    protected static $magasin_nom = 'magasin_nom';

    /**
     * The object datas
     *
     * @access  private
     * @var     array
     */
    private $_array_datas = array();
    
    /**
     * The object id
     *
     * @access  private
     * @var     int
     */
    private $id;

    /**
     * The link to the database
     *
     * @access  public
     * @var     object
     */
    public $db;

    /**
     * Product constructor.
     *
     * @param      $db
     * @param      $datas
     *
     * @throws Class_Exception
     */
    public function __construct($db, $datas)
    {
        if (($datas != intval($datas)) && (!is_array($datas))) {
            throw new Class_Exception('The given datas are not valid.');
        }

        $this->db = $db;

        if (is_array($datas)) {
            $this->_array_datas = array_merge($this->_array_datas, $datas);
        } else {
            $this->_array_datas[self::$pk_name] = $datas;
        }
    }

    /**
     * Get the list of store.
     *
     * @param      $db
     * @param      $begin
     * @param      $end
     *
     * @return     array of Store
     */
    public static function getAll($db, $begin = 0, $end = 15)
    {
        $sql_get = "SELECT * FROM " . self::$table_name . " LIMIT " . $begin. ", " . $end;

        $result = $db->fetchAll($sql_get);

        $array_store = [];

        if (!empty($result)) {
            foreach ($result as $store) {
                $array_store[] = new Store($db, $store);
            }
        }

        return $array_store;
    }

    /**
     * Get all store with a filter
     *
     * @param      $db
     * @param      $begin
     * @param      $end
     * @param      $filter
     *
     * @return     array of Store
     */
    public static function getWithFilter($db, $begin = 0, $end = 15, $filter)
    {
        $sql_get_with_filter = "SELECT * FROM " . self::$table_name . " WHERE " . self::$magasin_nom . " LIKE '%" . $filter . "%' LIMIT " . $begin. ", " . $end;
//echo $sql_get_with_filter;
        $result = $db->fetchAll($sql_get_with_filter);

        $array_store = [];

        if (!empty($result)) {
            foreach ($result as $store) {
                $array_store[] = new Store($db, $store);
            }
        }

        return $array_store;
    }

    /**
     * Get all store with a sort
     *
     * @param      $db
     * @param      $begin
     * @param      $end
     * @param      $sort
     *
     * @return     array of Store
     */
    public static function getWithSort($db, $begin = 0, $end = 15, $sort)
    {
        $sql_get_with_sort = "SELECT * FROM " . self::$table_name . " ORDER BY " . self::$magasin_nom . " " . $sort . " LIMIT " . $begin. ", " . $end;
//echo $sql_get_with_sort;die;
        $result = $db->fetchAll($sql_get_with_sort);

        $array_store = [];

        if (!empty($result)) {
            foreach ($result as $store) {
                $array_store[] = new Store($db, $store);
            }
        }

        return $array_store;
    }

    /**
     * Delete a store.
     *
     * @param      $db
     * @param      $idMagasin
     * 
     * @return     bool if succeed
     */
    public static function delete($db, $idMagasin) 
    {
        $sql_delete = "DELETE FROM " . self::$table_name . " WHERE " . self::$pk_name . " = :magasin_id";

        $params = [
            'magasin_id' => $idMagasin
        ];

        return $db->query($sql_delete, $params);
    }

    /**
     * Insert a store.
     * 
     * @param      $db
     * @param      $nomMagasin
     *
     * @return     bool if succeed
     */
    public static function insert($db, $nomMagasin) 
    {
        $sql_insert = "INSERT INTO " . self::$table_name . " (magasin_nom) values (:magasin_name)";
//echo $sql_insert;die;
        $params = [
            'magasin_name' => $nomMagasin
        ];

        return $db->query($sql_insert, $params);
    }

    /**
     * Modify a store.
     * 
     * @param      $db
     * @param      $idMagasin
     * @param      $nomMagasin
     *
     * @return     bool if succeed
     */
    public static function modify($db, $idMagasin, $nomMagasin) 
    {
        $sql_update = "UPDATE " . self::$table_name . " SET magasin_nom = :magasin_name WHERE magasin_id = :magasin_id";
//echo $sql_update;die;
        $params = [
            'magasin_name' => $nomMagasin,
            'magasin_id' => $idMagasin
        ];

        return $db->query($sql_update, $params);
    }

    /**
     * Get the primary key
     *
     * @return     int
     */
    public function getId()
    {
        return $this->_array_datas[self::$pk_name];
    }

    /**
     * Access properties.
     *
     * @param      $param
     *
     * @return     string
     */
    public function __get( $param ) {

        $array_datas = $this->_array_datas;

        // Let's check if an ID has been set and if this ID is validd
        if ( !empty( $array_datas[self::$pk_name] ) ) {

            // If it has been set, then try to return the data
            if ( array_key_exists($param, $array_datas ) ) {
                return $array_datas[$param];
            }

            // Let's dispatch all the values in $_array_datas
            $this->_dispatch();

            $array_datas = $this->_array_datas;

            if ( array_key_exists($param, $array_datas ) ) {

                return $array_datas[$param];

            }
        }

        return false;

    }

    /**
     * @return bool
     */
    private function _dispatch()
    {
        $array_datas = $this->_array_datas;
//var_dump($array_datas);die;
        if (empty($array_datas)) {
            return false;
        }

        $sql_dispatch = "SELECT m.*
            FROM magasin m
            WHERE m.magasin_id = :magasin_id";

        $params = [
            'magasin_id' => $array_datas['magasin_id']
        ];

        $array_store = $this->db->fetchRow($sql_dispatch, $params);

        // If the request has been executed, so we read the result and set it to $_array_datas
        if (is_array($array_store)) {
            $this->_array_datas = array_merge($array_datas, $array_store);
            return true;
        }

        return false;
    }

}