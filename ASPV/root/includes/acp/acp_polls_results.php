<?php
/**
*
* @package acp
* @version $Id: acp_polls_results.php,v 1.0.0 2010-04-15 00:37:02 Saske1 Exp $
* @copyright (c) 2011 Saske1
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package acp
*/
class acp_polls_results
{
	var $u_action;
	function main($id, $mode)
	{
		global $db, $user, $auth, $template;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		include($phpbb_root_path . 'includes/acp/info/acp_polls_results.' . $phpEx);
		
		$action = request_var('action', '');

		if ($mode != 'index')
		{
			return;
		}

		// Check additional permissions
		switch ($action)
		{
			case "results":
				$topic_id = request_var('poll', 0);

				$sql = 'SELECT *
						FROM ' . TOPICS_TABLE . "
						WHERE topic_id = " . $topic_id;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$topic_title = $row['topic_title'];
				$poll_title = $row['poll_title'];
				$db->sql_freeresult($result);

				$sql = 'SELECT *
						FROM ' . POLL_OPTIONS_TABLE . "
						WHERE topic_id = " . $topic_id;
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$sql2 = 'SELECT *
							FROM ' . POLL_VOTES_TABLE . "
							WHERE poll_option_id = " . $row['poll_option_id'] . "
								AND topic_id = " . $topic_id;
					$result2 = $db->sql_query($sql2);
					$voted_users = '';
					while ($row2 = $db->sql_fetchrow($result2))
					{
						$sql3 = 'SELECT user_id, username, user_colour
								FROM ' . USERS_TABLE . "
								WHERE user_id = " . $row2['vote_user_id'];
						$result3 = $db->sql_query($sql3);
						$row3 = $db->sql_fetchrow($result3);
						$voted_users .= get_username_string('full', $row3['user_id'], $row3['username'], $row3['user_colour']) . ' (' . $row2['vote_user_ip'] . ') ';
						$db->sql_freeresult($result3);
					}
					$db->sql_freeresult($result2);

					$template->assign_block_vars('poll_results', array(
						'POLL_OPTION_TEXT'		=> $row['poll_option_text'],
						'POLL_OPTION_TOTAL'		=> $row['poll_option_total'],
						'VOTED_USERS'			=> $voted_users,
					));
				}
				$db->sql_freeresult($result);

				$template->assign_vars(array(
					'TOPIC_TITLE'		=> $topic_title,
					'POLL_TITLE'		=> $poll_title,
				));
			break;

			default:
				$sql = 'SELECT topic_id, forum_id, topic_first_post_id, topic_title, poll_title, poll_start
						FROM ' . TOPICS_TABLE . "
						WHERE poll_start > 0";
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$sql2 = 'SELECT COUNT(poll_option_id) AS options_count
							FROM ' . POLL_OPTIONS_TABLE . "
							WHERE topic_id = " . $row['topic_id'];
					$result2 = $db->sql_query($sql2);

					$row2 = $db->sql_fetchrow($result2);
					$db->sql_freeresult($result2);
					$options_count = $row2['options_count'];

					$sql2 = 'SELECT poll_option_total
							FROM ' . POLL_OPTIONS_TABLE . "
							WHERE topic_id = " . $row['topic_id'];
					$result2 = $db->sql_query($sql2);

					$poll_total_votes = 0;
					while ($row2 = $db->sql_fetchrow($result2))
					{
						$poll_total_votes += (int) $row2['poll_option_total'];
					}
					$db->sql_freeresult($result2);

					$url = $this->u_action . "&amp;poll={$row['topic_id']}";
					$topic_data = $db->sql_fetchrow($result);
					$template->assign_block_vars('polls', array(
						'TOPIC_TITLE'		=> $row['topic_title'],
						'TOPIC_URL'			=> generate_board_url() . "/viewtopic." . $phpEx . "?f=" . $row['forum_id'] . "&amp;t=" . $row['topic_id'],
						'POLL_TITLE'		=> $row['poll_title'],
						'OPTIONS_COUNT'		=> $options_count,
						'VOTES_TOTAL'		=> $poll_total_votes,
						'U_POLL_RESULTS'	=> append_sid($url . '&amp;action=results'),
					));
				}
				$db->sql_freeresult($result);
			break;
		}
		$this->tpl_name = 'acp_polls_results';
		$this->page_title = 'ACP_POLLS_RESULTS';
		add_form_key('acp_poll_results');
		$user->add_lang('acp/common');
		
		// Version Check
		$config['ASPV_VERSION']         = (isset($config['ASPV_VERSION']))         ? $config['ASPV_VERSION']         : '1.0.0';
		$submit = (isset($_POST['submit'])) ? true : false;
		if ($submit)
		{
			if (!check_form_key('acp_poll_results'))
			{
				trigger_error('FORM_INVALID');
			}

			    set_config('poll_results_enable', request_var('poll_results_enable', 1));

			trigger_error($user->lang['SO_SAVED'] . adm_back_link($this->u_action));
		}
		
		$template->assign_vars(array(
			'S_POLL_RESULTS_ENABLE'      => $config['poll_results_enable'],
			'U_ACTION'    => $this->u_action,
			'ASPV_VERSION'            => $config['ASPV_VERSION'],
			'S_VERSION_UP_TO_DATE'      => $this->shareon_version_compare($config['ASPV_VERSION']),
		));	
	
	}
/**
* Obtains the latest version information
* @param string    $current_version    version information
* @param int       $ttl             Cache version information for $ttl seconds. Defaults to 86400 (24 hours).
*
* @return bool       false on failure.
**/
   function shareon_version_compare($current_version = '', $version_up_to_date = true, $ttl = 86400)
   {
      global $cache, $template;
      
      $info = $cache->get('aspv_versioncheck');

      if ($info === false)
      {
         $errstr = '';
         $errno = 0;

         $info = get_remote_file('www.phpbbsaske.espartan3ds.com', '/foro/aspv', 'aspv.txt', $errstr, $errno);
         if ($info === false)
         {
            $template->assign_var('S_VERSIONCHECK_FAIL', true);
            $cache->destroy('aspv_versioncheck');
         }
      }

      if ($info !== false)
      {
         $cache->put('aspv_versioncheck', $info, $ttl);
         $latest_version_info = explode("\n", $info);

         $latest_version = strtolower(trim($latest_version_info[0]));
         $current_version = strtolower(trim($current_version));
         $version_up_to_date = version_compare($current_version, $latest_version, '<') ? false : true;

         $template->assign_vars(array(
            'U_VERSIONCHECK'   => ($version_up_to_date) ? false : $latest_version_info[1],
         ));
      }

      return $version_up_to_date;
   }
}

?>