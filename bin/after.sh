#!/bin/bash
# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# Install phpmyadmin
if  [ ! -d ".etc/phpmyadmin" ] && [ ! -f ".etc/phpmyadmin/index.php" ]; then
  sudo apt-get install unzip
  wget https://files.phpmyadmin.net/phpMyAdmin/5.2.1/phpMyAdmin-5.2.1-all-languages.zip
  unzip phpMyAdmin-5.2.1-all-languages.zip -d ~/ssa/.etc/
  sudo mv ~/ssa/.etc/phpMyAdmin-5.2.1-all-languages ~/ssa/.etc/phpmyadmin
  sudo rm -rf phpMyAdmin-5.2.1-all-languages.zip ~/ssa/.etc/phpMyAdmin-5.2.1-all-languages
  touch /etc/phpmyadmin/.gitkeep
fi

# COPY MYSQL CONFIG
sudo cp -r /home/vagrant/ssa/.etc/mysql/my.cnf /etc/mysql/

# Copy SSL Certificates
sudo cp -r /etc/ssl/certs/ca.homestead.ssa.crt /home/vagrant/ssa/.etc/ssl

# Set PHP version
sudo update-alternatives --set php /usr/bin/php8.3
sudo update-alternatives --set phar /usr/bin/phar8.3
sudo update-alternatives --set phar.phar /usr/bin/phar.phar8.3
sudo phpenmod xdebug

sudo apt install cron -y
sudo apt install php-gmp
sudo apt install php-bcmath
sudo apt install php-igbinary
sudo apt install libc-ares-dev libcurl4-openssl-dev

sudo apt remove --purge php5.*-* -y
sudo apt remove --purge php7.*-* -y
sudo apt remove --purge php8.0-* -y
sudo rm -rf /etc/php/5.* /etc/php/7.* /etc/php/8.0

sudo pecl install yaml
sudo apt install php8.3-yaml php8.3-amqp php8.3-igbinary php8.3-redis

# Redis
sudo add-apt-repository ppa:redislabs/redis -y

# CLAMAV
#sudo apt-get install -y clamav-daemon
#sudo freshclam
#sudo systemctl enable --now clamav-daemon clamav-freshclam
#sudo systemctl enable clamav-daemon

# Install new version beanstalkd, for queue on prod test
wget https://launchpad.net/ubuntu/+archive/primary/+files/beanstalkd_1.12-2_amd64.deb
sudo dpkg -i beanstalkd_1.12-2_amd64.deb
sudo rm -rf beanstalkd_1.12-2_amd64.deb

# NGINX
sudo apt install nginx-extras -y
sudo add-apt-repository ppa:ondrej/nginx -y

if [ -f ".etc/nginx/ssa.loc" ]; then
  sudo cp -r /home/vagrant/ssa/.etc/nginx/ssa.loc /etc/nginx/sites-available/
  sudo cp -r /home/vagrant/ssa/.etc/nginx/ssa.api.loc /etc/nginx/sites-available/
  sudo cp -r /home/vagrant/ssa/.etc/nginx/ssa.phpmyadmin.loc /etc/nginx/sites-available/
fi

if [ -f ".etc/php/php.ini" ]; then
  sudo cp -r /home/vagrant/api/.etc/php/php.ini /etc/php/8.3/fpm/
fi

# SUPERVISOR
pip install --upgrade supervisor
pip install superlance

sudo cp -r /home/vagrant/ssa/.etc/supervisor/queue-base.conf /etc/supervisor/conf.d/
sudo cp -r /home/vagrant/ssa/.etc/supervisor/schedule.conf /etc/supervisor/conf.d/

sudo supervisorctl reread
sudo supervisorctl restart all

sudo apt update -y
sudo DEBIAN_FRONTEND=noninteractive apt upgrade -y

sudo apt autoremove -y
sudo apt autoclean -y

# Project settings commands
cd /home/vagrant/ssa || exit

composer install

php artisan migrate
php artisan optimize:clear
php artisan vendor:publish --tag=log-viewer-assets --force
php artisan l5-swagger:generate
php artisan cache:clear

cd public || exit
unlink storage
ln -s ../storage/app/public storage
