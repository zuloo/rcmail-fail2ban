# RoundCube Mail (1.0-RC) Fail2Ban Plugin

RoundCube Mail Fail2Ban Plugin is a small plugin that will display a failed login attempts in auth.log within your Roundcube log-folder.

This plugin dose not install or run Fail2Ban, but only provides the program with the needed log entries. Fail2Ban needs to be setup and running independent of this plugin and will watch roundcubes logs for failed logins.

  
## Download

The current version is 1.0-RC released on February, 10. 2014.

You can also clone the project with [Git][1] by running:

<pre>$ git clone https://github.com/zuloo/rc-plugin-fail2ban fail2ban</pre> 


  
## Dependencies

[RoundCube][2] 1.0-RC


## Installing

1.  Place this plugin folder into the RoundCube plugins directory (roundcube/plugins/)
2.  Add fail2ban to $rcmail_config['plugins'] in your RoundCube config

**Note:** When downloading this plugin from [github][3] you will need to create a directory called fail2ban and place fail2ban.php in there.
You may also run '**git clone git://github.com/zuloo/rcmail-fail2ban.git fail2ban**' from the plugins directory.

  
## Setting Up

**fail2ban/jail.conf:**

<pre>[rcmail]
enabled  = true
port     = http,https
filter   = rcmail
action   = iptables-multiport[name=rcmail, port="http,https"]
logpath  = /var/www/htdoc/roundcube/logs/auth.log</pre>


**fail2ban/filter.d/rcmail.conf:**

<pre>[Definition]
failregex = FAILED login for .* from &lt;HOST&gt;$
ignoreregex =</pre>

  
## License

This plugin is licensed under the [GPLv3][4]. A copy of the license also comes with every copy download.

<pre>This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see &lt;http://www.gnu.org/licenses/>.</pre>

  
<a id=Authors name=Authors></a> 
## Authors

[zuloo][5] (info@zuloo.de)

 [1]: http://git-scm.com
 [2]: http://github.com/mattrude/rc-plugin-fail2ban
 [3]: https://github.com/zuloo/rcmail-fail2ban
 [4]: http://www.gnu.org/licenses/gpl-3.0.txt
 [5]: http://zuloo.de/
