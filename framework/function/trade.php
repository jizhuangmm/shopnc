<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

function orderStateInfo( $state_code )
{
		$lang = Language::getlangcontent( );
		$lang_string = "";
		$state_code = intval( $state_code );
		switch ( $state_code )
		{
		case 0 :
				$lang_string = $lang['has_been_canceled'];
				return $lang_string;
		case 10 :
				$lang_string = $lang['pending_payment'];
				return $lang_string;
		case 11 :
				$lang_string = $lang['pending_recive'];
				return $lang_string;
		case 20 :
				$lang_string = $lang['paid'];
				return $lang_string;
		case 30 :
				$lang_string = $lang['shipped'];
				return $lang_string;
		case 40 :
				$lang_string = $lang['completed'];
				return $lang_string;
		case 50 :
				$lang_string = $lang['to_be_confirmed'];
				return $lang_string;
		case 60 :
				$lang_string = $lang['to_be_shipped'];
				return $lang_string;
		}
		$lang_string = $lang['completed'];
		return $lang_string;
}

function getCreditArr( $credit )
{
		if ( $GLOBALS['setting_config']['creditrule'] != "" )
		{
				$credit_arr = unserialize( $GLOBALS['setting_config']['creditrule'] );
		}
		$max_credit = 0;
		if ( !empty( $credit_arr ) || is_array( $credit_arr ) )
		{
				foreach ( $credit_arr as $k => $v )
				{
						if ( !empty( $v ) )
						{
								if ( is_array( $v ) )
								{
										foreach ( $v as $son_k => $son_v )
										{
												if ( $son_v[0] <= $credit && $credit <= $son_v[1] )
												{
														return array(
																"grade" => $k,
																"songrade" => $son_k
														);
												}
												$max_credit = $son_v[1];
										}
								}
						}
				}
		}
		if ( $max_credit < $credit )
		{
				return array( "grade" => "crown", "songrade" => 5 );
		}
		return array( );
}

if ( !defined( "InShopNC" ) )
{
		exit( "Access Invalid!" );
}
?>
