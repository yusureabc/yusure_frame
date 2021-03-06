<?php
/**
 * Model 模型类
 * @author  Yusure   http://yusure.cn
 */
class Model
{
    /* 数据库链接句柄 */
    protected $dbLink = NULL;

    /**
     * Model 构造方法，连接数据库
     * @author Yusure  http://yusure.cn
     * @date   2016-03-22
     * @param  [param]
     */
    public function __construct( $table )
    {
        global $C;
        $this->dbLink = mysql_connect(
            $C['DB_HOST'],
            $C['DB_USER'],
            $C['DB_PWD']
        ) or exit( mysql_error() ) ;
        mysql_select_db( $C['DB_NAME'], $this->dbLink ) or exit( mysql_error() );
        mysql_query( "SET NAMES {$C{'DB_CHARSET'}}" );
        $this->table = $C['DB_PREFIX'] . $table;
    }

    /**
     * 添加数据
     * @author Yusure  http://yusure.cn
     * @date   2016-04-01
     * @param  [param]
     * @param  [type]     $data [description]
     */
    public function add( $data )
    {
        ! is_array( $data ) && die( '请使用数组方式操作数据！' );
        $field = $value = '';
        foreach ( $data as $k => $v )
        {
            $field .= ',' . $k;
            $value .= ',' . "'" . $v . "'";
        }
        $field = substr( $field, 1 );
        $value = substr( $value, 1 );
        $sql = "INSERT INTO {$this->table} ($field) VALUES ($value)";
        $this->query( $sql );
        return mysql_insert_id();
    }

    /**
     * 获取一条记录
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_info( $condition = '', $field = '*' )
    {
        if ( is_array( $condition ) )
        {
            $con_str = '';
            foreach ( $condition as $k => $v )
            {
                $con_str .= 'AND ' . $k . ' = ' . "'{$v}' ";
            }
            $condition = substr( $con_str, 3 );           
        }
        else if ( is_string( $condition ) )
        {

        }
        $sql = "SELECT {$field} FROM {$this->table} WHERE {$condition}";
        $sql_res = $this->query( $sql );
        return mysql_fetch_assoc( $sql_res );        
    }

    /**
     * 获取列表
     * @author Yusure  http://yusure.cn
     * @date   2016-04-05
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_list( $condition, $field, $order = '' )
    {
        if ( is_array( $condition ) )
        {
            $con_str = '';
            foreach ( $condition as $k => $v )
            {
                $con_str .= 'AND ' . $k . ' = ' . "'{$v}' ";
            }
            $condition = substr( $con_str, 3 );           
        }
        else if ( is_string( $condition ) )
        {

        }
        $sql = "SELECT {$field} FROM {$this->table} WHERE {$condition}";
        if ( $order )
        {
            $sql .= ' ORDER BY ' . $order;
        }
        $sql_res = $this->query( $sql );
        while ( $result = mysql_fetch_array( $sql_res ) )
        {
            $list[] = $result;
        }
        return $list;
    }

    /**
     * 执行SQL
     * @author Yusure  http://yusure.cn
     * @date   2016-03-22
     * @param  [param]
     * @param  [type]     $sql [SQL语句]
     * @return [type]          [description]
     */
    public function query( $sql )
    {
        return mysql_query( $sql );
    }

    /**
     * 返回结果集
     * @author Yusure  http://yusure.cn
     * @date   2016-03-22
     * @param  [param]
     * @param  [type]     $res  [description]
     * @param  string     $type [description]
     * @return [type]           [description]
     */
    public function fetch( $res, $type = 'array' )
    {
        $fetch_func = $type == 'array' ? 'mysql_fetch_array' : 'mysql_fetch_object';
        return $fetch_func( $res );
    }
} 
    
?>