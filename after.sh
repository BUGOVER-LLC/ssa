#!/bin/bash

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
#
# If you have user-specific configurations you would like
# to apply, you may also create user-customizations.sh,
# which will be run after this script.

# If you're not quite ready for the latest Node.js version,
# uncomment these lines to roll src to a previous version

# Remove current Node.js version:
#sudo apt-get -y purge nodejs
#sudo rm -rf /usr/lib/node_modules/npm/lib
#sudo rm -rf //.etc/apt/sources.list.d/nodesource.list

# Install Node.js Version desired (i.e. v13)
# More info: https://github.com/nodesource/distributions/blob/master/README.md#debinstall
#curl -sL https://deb.nodesource.com/setup_13.x | sudo -E bash -
#sudo apt-get install -y nodejs

sudo apt update
sudo apt upgrade

sudo cp /etc/ssl/certs/ca.homestead.ssa.crt /home/vagrant/ssa/.etc/ssl
sudo cp /etc/ssl/certs/ca.homestead.ssa.key /home/vagrant/ssa/.etc/ssl

sudo cp -r /home/vagrant/ssa/.etc/nginx/ssa.api.loc /etc/nginx/sites-available/
sudo cp -r /home/vagrant/ssa/.etc/nginx/ssa.loc /etc/nginx/sites-available/

sudo cp -r /home/vagrant/ssa/.etc/supervisor/queue-base.conf /etc/supervisor/conf.d/
sudo cp -r /home/vagrant/ssa/.etc/supervisor/swoole-http.conf /etc/supervisor/conf.d/
