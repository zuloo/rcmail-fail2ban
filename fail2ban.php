<?php
/**
 * Roundcube Mail Fail2Ban Plugin
 *
 * @version 1.0-RC
 * @author zuloo [info@zuloo.de]
 * @url https://github.com/zuloo/rcmail-fail2ban/
 * @license GPLv3
 */
class fail2ban extends rcube_plugin
{
  function init()
  {
    $this->add_hook('login_failed', array($this, 'log'));
  }

  function log($args)
  {
    $remote_ip = getenv('REMOTE_ADDR');
    if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
      $xff_ip = array_pop(array_values(explode(',',$_SERVER["HTTP_X_FORWARDED_FOR"])));
      if (filter_var($xff_ip, FILTER_VALIDATE_IP)){
        $remote_ip = $xff_ip;
      }
    }
    rcube::write_log('auth.log', sprintf('FAILED login for %s from %s',$args['user'],$remote_ip));
  }

}

?>
