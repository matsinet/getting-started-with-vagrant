#!/usr/bin/env bash
echo "Installing Apache, PHP & MariaDB client"
apt-get install -y apache2 libapache2-mod-php php php-mcrypt php-curl php-mysql php-xdebug mariadb-client-core-10.0

echo "Creating Apache html folder soft link"
rm -rf /var/www/html
ln -fs /vagrant /var/www/html

echo "Enabling mod_rewrite"
a2enmod rewrite

echo "Adding xDebug configuration"
cat <<- EOF >> /etc/php/7.0/mods-available/xdebug.ini
xdebug.remote_enable=1
xdebug.remote_port=9000
xdebug.remote_connect_back=1
xdebug.idekey=PHPSTORM
EOF

echo "Restarting Apache"
systemctl restart apache2