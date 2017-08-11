#!/usr/bin/env bash
echo "Installing MariaDB"
apt-get install -y mariadb-server

echo "Creating vagrant user and vagrant_intro database"
mysql -u root -e "CREATE USER 'vagrant'@'10.0.0.10' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON * . * TO 'vagrant'@'10.0.0.10';
FLUSH PRIVILEGES;
CREATE DATABASE vagrant_intro;"

echo "Updating MySQL bind address in /etc/mysql/mariadb.conf.d/50-server.cnf to 0.0.0.0 to allow external connections."
sudo sed -i "s/.*bind-address.*/\bind-address = 0.0.0.0/" /etc/mysql/mariadb.conf.d/50-server.cnf

echo "Restarting MySQL"
systemctl restart mysql