<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

class seccode
{

		public $code = NULL;
		public $width = 150;
		public $height = 60;
		public $background = 1;
		public $adulterate = 1;
		public $scatter = 0;
		public $color = 1;
		public $size = 0;
		public $shadow = 1;
		public $animator = 0;
		public $fontpath = "";
		public $datapath = "";
		public $includepath = "";
		public $fontcolor = NULL;
		public $im = NULL;

		public function display( )
		{
				if ( function_exists( "imagecreate" ) && function_exists( "imagecolorset" ) && function_exists( "imagecopyresized" ) && function_exists( "imagecolorallocate" ) && function_exists( "imagechar" ) && function_exists( "imagecolorsforindex" ) && function_exists( "imageline" ) && function_exists( "imagecreatefromstring" ) && ( function_exists( "imagegif" ) || function_exists( "imagepng" ) || function_exists( "imagejpeg" ) ) )
				{
						$this->image( );
				}
				else
				{
						$this->bitmap( );
				}
		}

		public function image( )
		{
				$bgcontent = $this->background( );
				$this->im = imagecreatefromstring( $bgcontent );
				if ( $this->adulterate )
				{
						$this->adulterate( );
				}
				$this->giffont( );
				if ( $this->scatter )
				{
						$this->scatter( $this->im );
				}
				if ( function_exists( "imagepng" ) )
				{
						header( "Content-type: image/png" );
						imagepng( $this->im );
				}
				else
				{
						header( "Content-type: image/jpeg" );
						imagejpeg( $this->im, "", 100 );
				}
				imagedestroy( $this->im );
		}

		public function background( )
		{
				$this->im = imagecreatetruecolor( $this->width, $this->height );
				$backgrounds = $c = array( );
				if ( $this->background && function_exists( "imagecreatefromjpeg" ) && function_exists( "imagecolorat" ) && function_exists( "imagecopymerge" ) && function_exists( "imagesetpixel" ) && function_exists( "imageSX" ) && function_exists( "imageSY" ) )
				{
						if ( $handle = @opendir( $this->datapath."background/" ) )
						{
								while ( $bgfile = @readdir( $handle ) )
								{
										if ( preg_match( "/\\.jpg\$/i", $bgfile ) )
										{
												$backgrounds[] = $this->datapath."background/".$bgfile;
										}
								}
								@closedir( $handle );
						}
						if ( $backgrounds )
						{
								$imwm = imagecreatefromjpeg( $backgrounds[array_rand( $backgrounds )] );
								$colorindex = imagecolorat( $imwm, 0, 0 );
								$c = imagecolorsforindex( $imwm, $colorindex );
								$colorindex = imagecolorat( $imwm, 1, 0 );
								imagesetpixel( $imwm, 0, 0, $colorindex );
								$c[0] = $c['red'];
								$c[1] = $c['green'];
								$c[2] = $c['blue'];
								imagecopymerge( $this->im, $imwm, 0, 0, mt_rand( 0, 200 - $this->width ), mt_rand( 0, 80 - $this->height ), imagesx( $imwm ), imagesy( $imwm ), 100 );
								imagedestroy( $imwm );
						}
				}
				if ( !$this->background && !$backgrounds )
				{
						$i = 0;
						for ( ;	$i < 3;	++$i	)
						{
								$start[$i] = mt_rand( 200, 255 );
								$end[$i] = mt_rand( 100, 150 );
								$step[$i] = ( $end[$i] - $start[$i] ) / $this->width;
								$c[$i] = $start[$i];
						}
						$i = 0;
						for ( ;	$i < $this->width;	++$i	)
						{
								$color = imagecolorallocate( $this->im, $c[0], $c[1], $c[2] );
								imageline( $this->im, $i, 0, $i, $this->height, $color );
								$c[0] += $step[0];
								$c[1] += $step[1];
								$c[2] += $step[2];
						}
						$c[0] -= 20;
						$c[1] -= 20;
						$c[2] -= 20;
				}
				ob_start( );
				if ( function_exists( "imagepng" ) )
				{
						imagepng( $this->im );
				}
				else
				{
						imagejpeg( $this->im, "", 100 );
				}
				imagedestroy( $this->im );
				$bgcontent = ob_get_contents( );
				ob_end_clean( );
				$this->fontcolor = $c;
				return $bgcontent;
		}

		public function adulterate( )
		{
				$linenums = $this->height / 10;
				$i = 0;
				for ( ;	$i <= $linenums;	++$i	)
				{
						$color = $this->color ? imagecolorallocate( $this->im, mt_rand( 0, 255 ), mt_rand( 0, 255 ), mt_rand( 0, 255 ) ) : imagecolorallocate( $this->im, $this->fontcolor[0], $this->fontcolor[1], $this->fontcolor[2] );
						$x = mt_rand( 0, $this->width );
						$y = mt_rand( 0, $this->height );
						if ( mt_rand( 0, 1 ) )
						{
								$w = mt_rand( 0, $this->width );
								$h = mt_rand( 0, $this->height );
								$s = mt_rand( 0, 360 );
								$e = mt_rand( 0, 360 );
								
								for ($j = 0;$j < 3;	++$j)
												imagearc( $this->im, $x + $j, $y, $w, $h, $s, $e, $color );

						}
						else
						{
								$xe = mt_rand( 0, $this->width );
								$ye = mt_rand( 0, $this->height );
								imageline( $this->im, $x, $y, $xe, $ye, $color );
								$j = 0;
								for ( ;	$j < 3;	++$j	)
								{
										imageline( $this->im, $x + $j, $y, $xe, $ye, $color );
								}
						}
				}
		}

		public function scatter( &$obj, $level = 0 )
		{
				$rgb = array( );
				$this->scatter = $level ? $level : $this->scatter;
				$width = imagesx( $obj );
				$height = imagesy( $obj );
				$j = 0;
				for ( ;	$j < $height;	++$j	)
				{
						$i = 0;
						for ( ;	$i < $width;	++$i	)
						{
								$rgb[$i] = imagecolorat( $obj, $i, $j );
						}
						$i = 0;
						for ( ;	$i < $width;	++$i	)
						{
								$r = rand( 0 - $this->scatter, $this->scatter );
								imagesetpixel( $obj, $i + $r, $j, $rgb[$i] );
						}
				}
		}

		public function giffont( )
		{
				$seccode = $this->code;
				$seccodedir = array( );
				if ( function_exists( "imagecreatefromgif" ) )
				{
						$seccoderoot = $this->datapath."gif/";
						$dirs = opendir( $seccoderoot );
						while ( $dir = readdir( $dirs ) )
						{
								if ( !( $dir != "." ) && !( $dir != ".." ) && !file_exists( $seccoderoot.$dir."/9.gif" ) )
								{
										$seccodedir[] = $dir;
								}
						}
				}
				$widthtotal = 0;
				$i = 0;
				for ( ;	$i <= 3;	++$i	)
				{
						$this->imcodefile = $seccodedir ? $seccoderoot.$seccodedir[array_rand( $seccodedir )]."/".strtolower( $seccode[$i] ).".gif" : "";
						if ( !empty( $this->imcodefile ) || file_exists( $this->imcodefile ) )
						{
								$font[$i]['file'] = $this->imcodefile;
								$font[$i]['data'] = getimagesize( $this->imcodefile );
								$font[$i]['width'] = $font[$i]['data'][0] + mt_rand( 0, 6 ) - 4;
								$font[$i]['height'] = $font[$i]['data'][1] + mt_rand( 0, 6 ) - 4;
								if ( 0 < $this->width / 5 - $font[$i]['width'] )
								{
										$tt = mt_rand( 0, $this->width / 5 - $font[$i]['width'] );
								}
								else
								{
										$tt = mt_rand( $this->width / 5 - $font[$i]['width'], 0 );
								}
								$font[$i]['width'] += $tt;
								$widthtotal += $font[$i]['width'];
						}
						else
						{
								$font[$i]['file'] = "";
								$font[$i]['width'] = 8 + mt_rand( 0, $this->width / 5 - 5 );
								$widthtotal += $font[$i]['width'];
						}
				}
				$x = mt_rand( 1, $this->width - $widthtotal );
				$i = 0;
				for ( ;	$i <= 3;	++$i	)
				{
						if ( $this->color )
						{
								$this->fontcolor = array(
										mt_rand( 0, 255 ),
										mt_rand( 0, 255 ),
										mt_rand( 0, 255 )
								);
						}
						if ( $font[$i]['file'] )
						{
								$this->imcode = imagecreatefromgif( $font[$i]['file'] );
								if ( $this->size )
								{
										$font[$i]['width'] = mt_rand( $font[$i]['width'] - $this->width / 20, $font[$i]['width'] + $this->width / 20 );
										$font[$i]['height'] = mt_rand( $font[$i]['height'] - $this->width / 20, $font[$i]['height'] + $this->width / 20 );
								}
								if ( 0 < $this->height - $font[$i]['height'] )
								{
										$y = mt_rand( 0, $this->height - $font[$i]['height'] );
								}
								else
								{
										$y = mt_rand( $this->height - $font[$i]['height'], 0 );
								}
								if ( $this->shadow )
								{
										$this->imcodeshadow = $this->imcode;
										imagecolorset( $this->imcodeshadow, 0, 0, 0, 0 );
										imagecopyresized( $this->im, $this->imcodeshadow, $x + 1, $y + 1, 0, 0, $font[$i]['width'], $font[$i]['height'], $font[$i]['data'][0], $font[$i]['data'][1] );
								}
								imagecolorset( $this->imcode, 0, $this->fontcolor[0], $this->fontcolor[1], $this->fontcolor[2] );
								imagecopyresized( $this->im, $this->imcode, $x, $y, 0, 0, $font[$i]['width'], $font[$i]['height'], $font[$i]['data'][0], $font[$i]['data'][1] );
						}
						else
						{
								$y = mt_rand( 0, $this->height - 20 );
								if ( $this->shadow )
								{
										$text_shadowcolor = imagecolorallocate( $this->im, 0, 0, 0 );
										imagechar( $this->im, 5, $x + 1, $y + 1, $seccode[$i], $text_shadowcolor );
								}
								$text_color = imagecolorallocate( $this->im, $this->fontcolor[0], $this->fontcolor[1], $this->fontcolor[2] );
								imagechar( $this->im, 5, $x, $y, $seccode[$i], $text_color );
						}
						$x += $font[$i]['width'];
				}
		}

		public function bitmap( )
		{
				$numbers = array(
						"B" => array( "00", "fc", "66", "66", "66", "7c", "66", "66", "fc", "00" ),
						"C" => array( "00", "38", "64", "c0", "c0", "c0", "c4", "64", "3c", "00" ),
						"E" => array( "00", "fe", "62", "62", "68", "78", "6a", "62", "fe", "00" ),
						"F" => array( "00", "f8", "60", "60", "68", "78", "6a", "62", "fe", "00" ),
						"G" => array( "00", "78", "cc", "cc", "de", "c0", "c4", "c4", "7c", "00" ),
						"H" => array( "00", "e7", "66", "66", "66", "7e", "66", "66", "e7", "00" ),
						"J" => array( "00", "f8", "cc", "cc", "cc", "0c", "0c", "0c", "7f", "00" ),
						"K" => array( "00", "f3", "66", "66", "7c", "78", "6c", "66", "f7", "00" ),
						"M" => array( "00", "f7", "63", "6b", "6b", "77", "77", "77", "e3", "00" ),
						"P" => array( "00", "f8", "60", "60", "7c", "66", "66", "66", "fc", "00" ),
						"Q" => array( "00", "78", "cc", "cc", "cc", "cc", "cc", "cc", "78", "00" ),
						"R" => array( "00", "f3", "66", "6c", "7c", "66", "66", "66", "fc", "00" ),
						"T" => array( "00", "78", "30", "30", "30", "30", "b4", "b4", "fc", "00" ),
						"V" => array( "00", "1c", "1c", "36", "36", "36", "63", "63", "f7", "00" ),
						"W" => array( "00", "36", "36", "36", "77", "7f", "6b", "63", "f7", "00" ),
						"X" => array( "00", "f7", "66", "3c", "18", "18", "3c", "66", "ef", "00" ),
						"Y" => array( "00", "7e", "18", "18", "18", "3c", "24", "66", "ef", "00" ),
						"2" => array( "fc", "c0", "60", "30", "18", "0c", "cc", "cc", "78", "00" ),
						"3" => array( "78", "8c", "0c", "0c", "38", "0c", "0c", "8c", "78", "00" ),
						"4" => array( "00", "3e", "0c", "fe", "4c", "6c", "2c", "3c", "1c", "1c" ),
						"6" => array( "78", "cc", "cc", "cc", "ec", "d8", "c0", "60", "3c", "00" ),
						"7" => array( "30", "30", "38", "18", "18", "18", "1c", "8c", "fc", "00" ),
						"8" => array( "78", "cc", "cc", "cc", "78", "cc", "cc", "cc", "78", "00" ),
						"9" => array( "f0", "18", "0c", "6c", "dc", "cc", "cc", "cc", "78", "00" )
				);
				foreach ( $numbers as $i => $number )
				{
						$j = 0;
						for ( ;	$j < 6;	++$j	)
						{
								$a1 = substr( "012", mt_rand( 0, 2 ), 1 ).substr( "012345", mt_rand( 0, 5 ), 1 );
								$a2 = substr( "012345", mt_rand( 0, 5 ), 1 ).substr( "0123", mt_rand( 0, 3 ), 1 );
								mt_rand( 0, 1 ) == 1 ? array_push( &$numbers[$i], $a1 ) : array_unshift( &$numbers[$i], $a1 );
								mt_rand( 0, 1 ) == 0 ? array_push( &$numbers[$i], $a1 ) : array_unshift( &$numbers[$i], $a2 );
						}
				}
				$bitmap = array( );
				$i = 0;
				for ( ;	$i < 20;	++$i	)
				{
						$j = 0;
						for ( ;	$j <= 3;	++$j	)
						{
								$bytes = $numbers[$this->code[$j]][$i];
								$a = mt_rand( 0, 14 );
								array_push( &$bitmap, $bytes );
						}
				}
				$i = 0;
				for ( ;	$i < 8;	++$i	)
				{
						$a = substr( "012345", mt_rand( 0, 2 ), 1 ).substr( "012345", mt_rand( 0, 5 ), 1 );
						array_unshift( &$bitmap, $a );
						array_push( &$bitmap, $a );
				}
				$image = pack( "H*", "424d9e000000000000003e0000002800000020000000180000000100010000000000600000000000000000000000000000000000000000000000FFFFFF00".implode( "", $bitmap ) );
				header( "Content-Type: image/bmp" );
				echo $image;
		}

}

?>
