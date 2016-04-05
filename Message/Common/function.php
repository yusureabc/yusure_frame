<?php

/**
 * 引入类文件
 * @author Yusure  http://yusure.cn
 * @date   2016-04-02
 * @param  [param]
 * @param  [type]     $class_name [description]
 * @return [type]                 [description]
 */
function import( $class_name )
{
    $class_path = CLASS_PATH . ucwords( $class_name ) . '.class.php';
    if ( ! file_exists( $class_path ) )
    {
        die( $class_name . '类文件不存在！' );
    }
    require_once( $class_path );
}


/**
 * 获取文件后缀名称
 * @author Yusure  http://yusure.cn
 * @date   2016-04-02
 * @param  [param]
 * @param  [type]     $filename [description]
 * @return [type]               [description]
 */
function extname( $filename )
{
    $pathinfo = pathinfo($filename);
    return strtolower($pathinfo['extension']);
}

/**
 * 记录txt日志
 * @author Yusure  http://yusure.cn
 * @date   2016-04-02
 * @param  [param]
 * @param  string     $data [要写入的内容]
 * @param  string     $file [log文件路径]
 */
function write_log( $data = '', $file = 'log.txt' )
{
    $data = date( 'Y-m-d H:i:s', NOW_TIME ) . '　　　　' . $data;
    file_put_contents( $file, var_export( $data, true ).PHP_EOL, FILE_APPEND );
}

/**
 * 返回成功json格式信息
 * @author Yusure  http://yusure.cn
 * @date   2016-04-02
 * @param  [param]
 * @param  [type]     $data [description]
 * @return [type]           [description]
 */
function json_succ( $data )
{
    $out = array();
    $out['status'] = 1;
    $out['info'] = $data;
    exit( json_encode( $out ) );
}

/**
 * 返回错误json格式信息
 * @author Yusure  http://yusure.cn
 * @date   2016-04-02
 * @param  [param]
 * @param  [type]     $data [description]
 * @return [type]           [description]
 */
function json_error( $data )
{
    $out = array();
    $out['status'] = 0;
    $out['info'] = $data;
    exit( json_encode( $out ) );
}

/**
 * 生成URL链接
 * @author Yusure  http://yusure.cn
 * @date   2016-04-04
 * @param  [param]
 * @param  string     $url  [description]
 * @param  array     $vars [description]
 * @return [type]           [description]
 */
function get_url( $url = '', $vars = '' )
{
    global $C;
    $domain = 'http://' . $_SERVER['HTTP_HOST'];
    if ( $C['URL_MODE'] == 1 )
    {
        /*if ( '' === $vars )
        {
            $params = http_build_query( $vars );
            $domain . $_SERVER['SCRIPT_NAME'] . '?' . $url;
        }*/
    }
    else if ( $C['URL_MODE'] == '2' )
    {
        $full_url = $domain . $_SERVER['SCRIPT_NAME'] . '/' . $url;
        $params = '';
        if ( '' !== $vars )
        {
            foreach ( $vars as $k => $v )
            {
                $params = '/' . $k . '/' . $v;
            }
            $full_url   .=   $params;
        }
    }
    return $full_url;
}

/**
 * session各种操作
 * @author Yusure  http://yusure.cn
 * @date   2016-04-04
 * @param  [param]
 * @return [type]     [description]
 */
function session( $name = '', $value = '' )
{
    session_save_path( CACHE_PATH . 'session/' );
    session_start();  
    if ( $value == '' )
    {   // 获取session
        if ( $name == '' )
        {
            return $_SESSION;
        }
        else
        {
            return $_SESSION[$name];
        }
    }
    else if ( is_null( $value ) )
    {   // 删除session
        unset( $_SESSION[$name] );
    }
    else
    {   // 设置session              
        $_SESSION[$name] = $value;
    }
}

function cookies()
{

}


/**
 * 取得随机数
 *
 * @param int $length 生成随机数的长度
 * @param int $numeric 是否只产生数字随机数 1是0否
 * @return string
 */
function random($length, $numeric = 0) {
    $seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
    $seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
    $hash = '';
    $max = strlen($seed) - 1;
    for($i = 0; $i < $length; $i++) {
        $hash .= $seed{mt_rand(0, $max)};
    }
    return $hash;
}