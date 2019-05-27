sudo yum update -y

sudo rpm --import /etc/pki/rpm-gpg/RPM-GPG-KEY*
sudo yum -y install epel-release

sudo yum install -y nano
sudo yum install -y yum-utils

# Install MariaDB
# ---------------
sudo yum -y install mariadb-server mariadb
sudo systemctl start mariadb.service
sudo systemctl enable mariadb.service

mysql -u root -e "CREATE DATABASE IF NOT EXISTS wp"
mysql -u root -e "GRANT ALL PRIVILEGES ON wp.* TO 'wp'@'localhost' IDENTIFIED BY 'password'"
mysql -u root -e "FLUSH PRIVILEGES"

# install httpd
# ---------------
sudo yum install httpd -y

# Install MariaDB
# ---------------
#sudo yum -y install mariadb-server mariadb
#sudo systemctl start mariadb.service
#sudo systemctl enable mariadb.service

#sudo rpm -Uvh https://repo.mysql.com/mysql57-community-release-el7-11.noarch.rpm
#sudo yum install -y mysql-community-server

echo "install repo mysql 8.0"
wget https://repo.mysql.com/mysql80-community-release-el7-1.noarch.rpm
sudo yum localinstall mysql80-community-release-el7-1.noarch.rpm

echo "verify mysql success install"

sudo yum repolist enabled | grep "mysql.*-community.*"

sudo yum-config-manager --disable mysql57-community
sudo yum-config-manager --enable mysql56-community

sudo service mysqld start

#sudo yum --enablerepo=mysql80-community install -y mysql-community-server 

grep "A temporary password" /var/log/mysqld.log

sudo systemctl start mysqld.service

mysql -u root -e "CREATE DATABASE IF NOT EXISTS wp"
mysql -u root -e "GRANT ALL PRIVILEGES ON wp.* TO 'wp'@'localhost' IDENTIFIED BY 'password'"
mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'user'@'localhost' IDENTIFIED BY 'pass'"
mysql -u root -e "FLUSH PRIVILEGES"

sudo systemctl restart mysqld.service

sudo yum -y install unzip

# Install php
# ------------------
sudo yum -y install php php-mysql
sudo systemctl restart httpd.service

# Install phpMyAdmin

sudo yum install epel-release -y
sudo yum install -y phpmyadmin

touch /etc/httpd/conf.d/phpMyAdmin.conf
host_phpmyadmin=$(cat <<EOF
Alias /phpMyAdmin /usr/share/phpMyAdmin
Alias /phpmyadmin /usr/share/phpMyAdmin

<Directory /usr/share/phpMyAdmin/>
        # Apache 2.4
        <IfModule mod_authz_core.c>
          <RequireAny>   
            # Require ip 192.168.33.1
            # Require ip ::1
            Require all granted
          </RequireAny>
        </IfModule>
        <IfModule !mod_authz_core.c>
          #  Apache 2.2
          Order Deny,Allow
        #   Deny from All
        #   Allow from 192.168.33.1
        #   Allow from ::1
            Require all granted
        </IfModule>
</Directory>
EOF
)

echo "${host_phpmyadmin}" > /etc/httpd/conf.d/phpMyAdmin.conf

sudo systemctl start httpd.service
sudo systemctl enable httpd.service

# sudo firewall-cmd --permanent --zone=public --add-service=http 
# sudo firewall-cmd --permanent --zone=public --add-service=https
# sudo firewall-cmd --reload

mv /etc/httpd/conf.d/welcome.conf /etc/httpd/conf.d/welcome.conf.bak

touch /etc/httpd/conf.d/www.conf
host_www=$(cat <<EOF
ServerName localhost

LoadModule deflate_module /usr/local/apache2/modules/mod_deflate.so
LoadModule proxy_module /usr/local/apache2/modules/mod_proxy.so
LoadModule proxy_fcgi_module /usr/local/apache2/modules/mod_proxy_fcgi.so
LoadModule rewrite_module libexec/apache2/mod_rewrite.so

<VirtualHost *:80>
    # Proxy .php requests to port 9000 of the php-fpm container
    # ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://php:9000/usr/share/httpd/www/$1

    DocumentRoot "/usr/share/httpd/www"
    <Directory /usr/share/httpd/www/>
        DirectoryIndex index.php index.html welcome.php
        Options Indexes FollowSymLinks
        AllowOverride All
        Allow from all
        Require all granted
    </Directory>
    
    # Send apache logs to stdout and stderr
    # CustomLog /proc/self/fd/1 common
    # ErrorLog /proc/self/fd/2
</VirtualHost>
EOF
)

echo "${host_www}" > /etc/httpd/conf.d/www.conf

mkdir /usr/share/httpd/www
sudo chmod +x /usr/share/httpd/www

sudo systemctl restart httpd.service
