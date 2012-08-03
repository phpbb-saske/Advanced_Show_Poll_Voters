<?php
/**
*
* polls_results [Spanish]
*
* @package language
* @version $Id: polls_results.php,v 1.0.0 2010/04/15 19:52:58 Saske1 Exp $
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
	'ACP_POLLS_RESULTS_EXPLAIN'			=> 'Aquí usted puede encontrar información detallada sobre todas las encuestas en todo el foro. Para ver una lista de usuarios que han votado en una encuesta, haga clic sobre el número de respuestas frente a la encuesta deseada.',
	'ACP_POLL_RESULTS_ENABLE'			=> 'Habilitar / Deshabilitar Ver ¿Quién Ha votado en las encuestas?',
	'ACP_POLLS_RESULTS_TOPIC'			=> 'Tema',
	'ACP_POLLS_RESULTS_POLL'			=> 'Titulo de la Encuesta',
	'ACP_POLLS_RESULTS_OPTIONS'			=> 'Opciones',
	'ACP_POLLS_RESULTS_VOTES'			=> 'Votos',
	'ACP_POLLS_RESULTS_USERS'			=> 'Usuarios',
	'ACP_POLL_RESULTS_VERSION' 			=> 'Versión',
	'SAVED'								=> 'Los cambios se han realizado con éxito',
));

?>