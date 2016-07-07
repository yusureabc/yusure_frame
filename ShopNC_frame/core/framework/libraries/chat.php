<?php
/**
 * chat
 */
defined('IN_B2B2C') or exit('Access Invalid!');

class Chat {
	public static function getChatHtml($layout){
		$web_html = '';
		if ($layout != 'layout/msg_layout.php'){
			$config_file = BASE_ROOT_PATH.DS.'chat'.DS.'config'.DS."config.ini.php";
			require_once $config_file;
			$avatar = getMemberAvatar($_SESSION['avatar']);
			$nchash = getNchash();
			$formhash = Security::getTokenValue();
			$css_url = CHAT_TEMPLATES_URL;
			$app_url = APP_SITE_URL;
			$chat_url = CHAT_SITE_URL;
			$node_url = NODE_SITE_URL;
			$shop_url = SHOP_SITE_URL;
			$base_avatar=UPLOAD_SITE_URL."/".ATTACH_AVATAR.DS;
			
			$web_html = <<<EOT
					<link href="{$css_url}/css/chat.css" rel="stylesheet" type="text/css">
					<link href="{$css_url}/css/home_login.css" rel="stylesheet" type="text/css">
					<div style="clear: both;"></div>
					<div id="web_chat_dialog" style="display: none;float:right;">
					</div>
					<a id="chat_login" href="javascript:void(0)" style="display: none;"></a> 
					<script type="text/javascript">
					var APP_SITE_URL = '{$app_url}';
					var CHAT_SITE_URL = '{$chat_url}';
					var SHOP_SITE_URL = '{$shop_url}';
					var connect_url = "{$node_url}";
					
					var layout = "{$layout}";
					var act_op = "{$_GET['act']}_{$_GET['op']}";
					var user = {};
					var member_avatar='';
					$.getJSON(SITEURL+'/index.php?act=index&op=user_session&jsoncallback=?', function(result){
						if(result['is_login'] >0){
							user['u_id'] = result['member_id'];
							user['u_name'] = result['member_name'];
							user['s_id'] = result['store_id'];
							user['s_name'] = result['store_name'];
							if(result['avatar']) {
								user['avatar'] = "{$base_avatar}"+result['avatar'];
							} else {
								user['avatar'] = "{$avatar}";
							}
						} else {
							user['u_id'] = "{$_SESSION['member_id']}";
							user['u_name'] = "{$_SESSION['member_name']}";
							user['s_id'] = "{$_SESSION['store_id']}";
							user['s_name'] = "{$_SESSION['store_name']}";
							user['avatar'] = "{$avatar}";
						}
					});
					
					$("#chat_login").nc_login({
					  action:'/index.php?act=login',
					  nchash:'{$nchash}',
					  formhash:'{$formhash}'
					});
					</script>
EOT;
			if (defined('APP_ID') && APP_ID != 'shop'){
				$web_html .= '<script type="text/javascript" src="'.RESOURCE_SITE_URL.'/js/perfect-scrollbar.min.js"></script>';
				$web_html .= '<script type="text/javascript" src="'.RESOURCE_SITE_URL.'/js/jquery.mousewheel.js"></script>';
			}
			$web_html .= '<script type="text/javascript" src="'.RESOURCE_SITE_URL.'/js/jquery.charCount.js" charset="utf-8"></script>';
			$web_html .= '<script type="text/javascript" src="'.RESOURCE_SITE_URL.'/js/jquery.smilies.js" charset="utf-8"></script>';
			$web_html .= '<script type="text/javascript" src="'.CHAT_RESOURCE_URL.'/js/user.js" charset="utf-8"></script>';
			$web_html .= '<script type="text/javascript" src="'.CHAT_RESOURCE_URL.'/js/jquery.jplayer.min.js" charset="utf-8"></script>';

			$web_html .= <<<EOT
					<script language="javascript">
					$(function(){
						$("#jquery_jplayer_1").jPlayer({
							ready: function () {
								$(this).jPlayer("setMedia", {
									mp3: CHAT_SITE_URL+"/resource/message.mp3",
									autoPlay:false,
								});
							},
							swfPath: CHAT_SITE_URL+"/resource/js",
							supplied: "mp3"
						});
					});
					</script>
EOT;
			$web_html .= '<div id="jquery_jplayer_1" class="jp-jplayer"></div>';			
		}
		return $web_html;
	}
}
?>