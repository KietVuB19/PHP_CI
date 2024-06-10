# PHP_Codeigniter
1. Requirements:
- Linux: CentOS 7.9.2009
- Apache/2.4.6 (CentOS)
- MySQL: Ver 8.4.0 for Linux on x86 64 (MySQL Community Server - GPL)
- PHP: 8.2.20 (cli)
- Codeigniter: 3.1.9
- Composer: 2.7.6


2. Setup guide:
- 2.1. Create new project: <br />
  composer create-project codeigniter/framework codeigniter 3.1.9
- 2.2. Set permission: <br />
  sudo chown -R apache:apache /var/www/html/codeigniter
  sudo chmod -R 755 /var/www/html/codeigniter/application/cache
  sudo chmod -R 755 /var/www/html/codeigniter/application/logs  
- 2.3. Configure apache (virtual host):<br />
  sudo nano /etc/httpd/conf.d/codeigniter.conf
- 2.4 Change file codeigniter.conf (file you open on 2.3): <br />
  <VirtualHost *:80><br />
    ServerAdmin root<br />
    ServerName localhost<br />
    DocumentRoot /var/www/html/codeigniter<br />
    <Directory /var/www/html/codeigniter><br />
        AllowOverride All<br />
        Allow from all<br />
        Require all granted<br />
    </Directory><br />
    ErrorLog /var/log/httpd/codeigniter_error.log<br />
    CustomLog /var/log/httpd/codeigniter_access.log combined<br />
</VirtualHost><br />

- 2.5 Restart apache<br />
sudo systemctl restart httpd<br />
- 2.6 http://localhost (on browser to open)<br />

  
4. Function (currently):
- Register/Login/Logout with session
- Search user by name
