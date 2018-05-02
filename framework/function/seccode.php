<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function makeSeccode( $nchash )
{
		$seccode = random( 6, 1 );
		$seccodeunits = "";
		$s = sprintf( "%04s", base_convert( $seccode, 10, 24 ) );
		$seccodeunits = "BCEFGHJKMPQRTVWXY2346789";
		if ( $seccodeunits )
		{
				$seccode = "";
				$i = 0;
				for ( ;	$i < 4;	++$i	)
				{
						$unit = ord( $s[$i] );
						$seccode .= 48 <= $unit && $unit <= 57 ? $seccodeunits[$unit - 48] : $seccodeunits[$unit - 87];
				}
		}
		setnccookie( "seccode".$nchash, encrypt( strtoupper( $seccode )."\t".( time( ) - 180 )."\t".$nchash, MD5_KEY ) );
		return $seccode;
}

function checkSeccode( $nchash, $value )
{
		
		list( $checkvalue, $checktime, $checkidhash ) = explode( "\t", decrypt( cookie( "seccode".$nchash ), MD5_KEY ) );
		
		$org_code= str_cut(decrypt( cookie( "seccode".$nchash ), MD5_KEY ), 4);
                $org_code=strtolower($org_code);
                $value=strtolower($value);
		return $org_code == $value;
}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
