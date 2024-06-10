# PHP_Codeigniter
1. Requirements:
- Linux: CentOS 7.9.2009
- Apache/2.4.6 (CentOS)
- MySQL: Ver 8.4.0 for Linux on x86 64 (MySQL Community Server - GPL)
- PHP: 8.2.20 (cli)
- Codeigniter: 3.1.9
- Composer: 2.7.6
<br><br>
2. Setup guide:
- 2.1. Create new project:   
  + composer create-project codeigniter/framework codeigniter 3.1.9
- 2.2. Set permission:   
  + sudo chown -R apache:apache /var/www/html/codeigniter   
  + sudo chmod -R 755 /var/www/html/codeigniter/application/cache   
  + sudo chmod -R 755 /var/www/html/codeigniter/application/logs    
- 2.3. Configure apache (virtual host):  
  + sudo nano /etc/httpd/conf.d/codeigniter.conf  
- 2.4 Change file codeigniter.conf (file you open on 2.3):   
```
<VirtualHost *:80>
    ServerAdmin admin@example.com
    DocumentRoot /var/www/html/project_name

    <Directory /var/www/html/project_name>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog /var/log/httpd/project_name_error.log
    CustomLog /var/log/httpd/project_name_access.log combined
</VirtualHost>
```
- 2.5 Restart apache  
  + sudo systemctl restart httpd  
- 2.6 Run project on browser (FireFox)
  + Type http://localhost on browser
<br><br>
3. Function (currently):
- Register/Login/Logout with session
- Search user by name
