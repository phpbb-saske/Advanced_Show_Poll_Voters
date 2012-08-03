<?php
/**
*
* @package acp
* @version $Id: acp_polls_results.php,v 1.0.0 2010-04-15 01:04:43 FladeX Exp $
* @copyright (c) 2010 FladeX
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package module_install
*/
class acp_polls_results_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_polls_results',
			'title'		=> 'ACP_POLLS_RESULTS',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'index'	=> array('title' => 'ACP_POLLS_RESULTS_INDEX_TITLE', 'auth' => 'acl_a_board', 'cat' => array('ACP_BOARD_CONFIGURATION')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}

?>