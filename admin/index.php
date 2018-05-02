<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

define( "ProjectName", "admin" );
define( "NC_ADMIN", TRUE );
define( "BUILDCORE", FALSE );
require( dirname( __FILE__ )."/../global.php" );
require( dirname( __FILE__ )."/../config.ini.php" );
require( BasePath."/".ProjectName."/control/control.php" );
if ( BUILDCORE === TRUE && file_exists( BasePath."/cache/setting.php" ) )
{
		if ( !file_exists( RUNCOREPATH ) )
		{
				require( BasePath."/framework/core/runtime.php" );
		}
		else
		{
				require( RUNCOREPATH );
				exit( );
		}
}
require( BasePath."/framework/core/runtime.php" );
?>
