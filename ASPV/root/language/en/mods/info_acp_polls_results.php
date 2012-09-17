<?php
/**
*
* polls_results [English]
*
* @package language
* @version $Id: polls_results.php,v 1.0.0 2010/04/15 19:52:58 Saske Exp $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_POLLS_RESULTS_INDEX_TITLE'		=> 'Advanced Show Poll Voters',
	'ACP_POLLS_RESULTS'					=> 'Advanced Show Poll Voters',
	'ACP_POLLS_RESULTS_EXPLAIN'			=> 'Here you can find detailed information about all polls in the entire forum. To see a list of users who have voted in a particular poll, click on the number of responses in front of the desired poll.',
	'ACP_POLL_RESULTS_ENABLE'			=> 'Show voters near poll results in topic',
	'ACP_POLLS_RESULTS_TOPIC'			=> 'Topic',
	'ACP_POLLS_RESULTS_POLL'			=> 'Poll Title',
	'ACP_POLLS_RESULTS_OPTIONS'			=> 'Options',
	'ACP_POLLS_RESULTS_VOTES'			=> 'Votes',
	'ACP_POLLS_RESULTS_USERS'			=> 'Users',
	'ACP_POLL_RESULTS_VERSION' 			=> 'Version',
	'SAVED'								=> 'The changes have been successfully',
));

?>