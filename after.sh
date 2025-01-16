#!/bin/bash

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# Install phpmyadmin
if [[ ! -d "./.etc/phpmyadmin/" ]]; then
  sudo apt-get install unzip
  wget https://files.phpmyadmin.net/phpMyAdmin/5.2.1/phpMyAdmin-5.2.1-all-languages.zip
  unzip phpMyAdmin-5.2.1-all-languages.zip -d ~/ssa/.etc/
  sudo mv ~/ssa/.etc/phpMyAdmin-5.2.1-all-languages ~/ssa/.etc/phpmyadmin
  sudo rm -rf phpMyAdmin-5.2.1-all-languages.zip ~/ssa/.etc/phpMyAdmin-5.2.1-all-languages
fi

# Copy SSL Certificates
sudo cp -r /etc/ssl/certs/ca.homestead.ssa.crt /home/vagrant/ssa/.etc/ssl
sudo cp -r /etc/ssl/certs/ca.homestead.ssa.key /home/vagrant/ssa/.etc/ssl

# Copy NGINX config
sudo cp -r /home/vagrant/ssa/.etc/nginx/ssa.loc /etc/nginx/sites-available/

# Copy Supervisor configs
#sudo cp -r /home/vagrant/ssa/.etc/supervisor/memmon.conf /etc/supervisor/conf.d/
sudo cp -r /home/vagrant/ssa/.etc/supervisor/queue-base.conf /etc/supervisor/conf.d/
sudo cp -r /home/vagrant/ssa/.etc/supervisor/swoole-http.conf /etc/supervisor/conf.d/

# Set PHP version
update-alternatives: using /usr/bin/php8.2
update-alternatives: using /usr/bin/php-config8.2
update-alternatives: using /usr/bin/phpize8.2
sudo phpenmod xdebug

# Add PPA repository
sudo add-apt-repository ppa:ondrej/nginx -y
sudo add-apt-repository ppa:redislabs/redis -y

sudo apt update
sudo apt upgrade -y

sudo apt install cron -y
sudo apt install nginx-extras -y

sudo apt install libc-ares-dev libcurl4-openssl-dev -y

pip install --upgrade supervisor
pip install superlance

sudo apt install php-gmp
sudo apt install php-bcmath
sudo apt install php-igbinary

# Install new version beanstalkd, for queue on prod test
wget https://launchpad.net/ubuntu/+archive/primary/+files/beanstalkd_1.12-2_amd64.deb
sudo dpkg -i beanstalkd_1.12-2_amd64.deb
sudo rm -rf beanstalkd_1.12-2_amd64.deb

#cd ~/ssa
#composer config github-oauth.github.com awk -F= '$1 == "APP_URL" {print $2}' .env
#
composer install
yarn install
