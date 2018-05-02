<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

interface BaseDb
{

		public abstract function connect( );

		public static function getInstance( );

		public static function query($sql);

		public static function select($param, $obj_page = "");

		public static function insert($table_name, $insert_array = array( ));

		public static function insertAll($table_name, $insert_array = array( ));

		public static function update($table_name, $update_array = array( ), $where = "");

		public static function delete($table_name, $where = "");
                
		public static function getLastId( );

		public static function getRow($param);

		public static function replace($table_name, $replace_array = array());

		public static function startTrans( );

		public static function completeTrans( );

		public static function rollbackTrans( );

		public static function getQueryNum( );

		public static function showTables( );

		public static function showTableStatus( );

		public static function showCreateTable($table);

		public static function showColumns($table);

		public static function getServerInfo( );

		public static function parseKey($key);

		public static function parseValue($value);

		public static function debug($sql);

}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
