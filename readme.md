<h4 style="font-style: revert">
This project is a starter with a set of packages/components that helps you work with Lumen and VueJs (Vuetify), and easy to start a new project gradually expanding
</h4>

<p align="center">
<img src=".github/ssa-logo.png" alt="drawing" width="400"/>
</p>

<p align="center" style="font-size: 1.5rem;color: darkslategrey">
Introduction
</p>

. Starting
-
---

- Install VirtualBox in your system
- composer install
- php vendor/bin/homestead make
- vagrant up
- :smirk: Have a good working day

### App part

- yarn watch (for real worked ass https with domain)
- yarn server (for localhost run your app)

HTTPS on Chrome && Firefox
-
---
. Chrome
-

- Settings
- Privacy and Security
- Security
- Manage device certificates
- Authorities
- Import ssl certificate on path your project, ssa/.etc/ssl/ca.homestead.ssa.crt

. Firefox
-

- Settings
- Privacy & Security
- Certificates
- View Certificates
- Authorities
- Import ssl certificate on path your project, ssa/.etc/ssl/ca.homestead.ssa.crt

---
![image info](https://repository-images.githubusercontent.com/5133949/13b58180-bc96-11ea-939f-53b1ca16d341)

(sudo apt install libc-ares-dev libcurl4-openssl-dev libbrotli-dev libzstd-dev liburing-dev)
1. sudo pecl install swoole-5.1.6
2. ADD swoole.ini file to php mods-available folder
    - ;configuration for php common module
    - ;priority=20
    - extension=swoole.so
4. create symbolick link for all php versions,
    - sudo ln -s /etc/php/8.3/mods-available/swoole.ini /etc/php/8.4/mods-available/
5. sudo apt install php8.3-swoole
6. sudo phpenmod swoole
7. uncomment swoole.so in php/cli/php.ini file ?

help link
