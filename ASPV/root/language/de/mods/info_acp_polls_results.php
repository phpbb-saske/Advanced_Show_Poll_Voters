<?php
/**
*
* polls_results [German]
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
	'ACP_POLLS_RESULTS_EXPLAIN'			=> 'Hier findest du ausführliche Informationen über alle Umfragen im gesamten Forum. Um eine Liste der Benutzer zu sehen, welche an einer bestimmten Umfrage teilgenommen haben, klicke auf die Zahl der abgegebenen Stimmen bei dieser Umfrage.',
	'ACP_POLL_RESULTS_ENABLE'			=> 'Benutzer die an einer Umfrage teilgenommen haben bei den Ergebnissen anzeigen',
	'ACP_POLLS_RESULTS_TOPIC'			=> 'Thema',
	'ACP_POLLS_RESULTS_POLL'			=> 'Titel der Umfrage',
	'ACP_POLLS_RESULTS_OPTIONS'			=> 'Antwortmöglichkeiten',
	'ACP_POLLS_RESULTS_VOTES'			=> 'Abgegebene Stimmen',
	'ACP_POLLS_RESULTS_USERS'			=> 'Benutzer',
	'ACP_POLL_RESULTS_VERSION' 			=> 'Version',
	'SAVED'								=> 'Die Änderungen waren erfolgreich',
	'acl_f_poll_results'				=> array('lang' => 'Darf sehen, wer für welche Antwortmöglichkeit gestimmt hat', 'cat' => 'polls'),
));

?>