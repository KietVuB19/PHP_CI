# PHP_Codeigniter
1. Requirements:
- Linux: CentOS 7.9.2009
- Apache/2.4.6
- MySQL: Ver 8.4.0 for Linux on x86 64 (MySQL Community Server - GPL)
- PHP: 8.2.20 (cli)
- Codeigniter: 3.1.9
- Composer: 2.7.6

</br>

2. Setup guide:
- 2.1. Create new project:   
```
composer create-project codeigniter/framework codeigniter 3.1.9
```
- 2.2. Set permission:   
```
sudo chown -R apache:apache /var/www/html/codeigniter   
sudo chmod -R 755 /var/www/html/codeigniter/application/cache   
sudo chmod -R 755 /var/www/html/codeigniter/application/logs    
```
- 2.3. Configure apache (virtual host):
```
sudo nano /etc/httpd/conf.d/codeigniter.conf
```  
- 2.4 Change file codeigniter.conf (file you open on 2.3):   
```
<VirtualHost *:80>
    ServerAdmin root
    ServerName localhost
    DocumentRoot /var/www/html/codeigniter
   <Directory /var/www/html/codeigniter>
    	AllowOverride all
	Allow from all
	Require all granted 
    </Directory>

    Errorlog /etc/httpd/logs/error_log
    CustomLog /etc/httpd/logs/requests.log combined
</VirtualHost>
```
- 2.5 Restart apache
```
sudo systemctl restart httpd  
```
- 2.6 Run project on browser (FireFox)
  + Type http://localhost on browser (you should see the Login homepage)

</br>

3. Function (currently):
- 3.1. Register/Login/Logout with session
    + Register: Duplicate name is not possible, password match
    + Login: Log in fail 5 times in a row will lock the user for 5 mins
- 3.2. Search user by name (for admin)
- 3.3. Change status of an user: (if user status is disable: the user can not log in)
