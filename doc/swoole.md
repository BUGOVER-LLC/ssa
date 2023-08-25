# Notes

- If you are using [VVV](https://github.com/varying-vagrant-vagrants/vvv/), you can enable xdebug by
  running `vagrant ssh` and then `xdebug_on` from the virtual machine's CLI.

---
![image info](https://repository-images.githubusercontent.com/5133949/13b58180-bc96-11ea-939f-53b1ca16d341)

(sudo apt install libc-ares-dev libcurl4-openssl-dev)

1. sudo pecl install swoole
2. ADD swoole.ini file to php mods-available folder
    - ;configuration for php common module
    - ;priority=20
    - extension=swoole.so
4. create symbolick link for all php versions,
    - sudo ln -s /etc/php/7.4/mods-available/swoole.ini /etc/php/7.3/mods-available/
5. sudo apt install php7.4-swoole
6. sudo phpenmod swoole
7. uncomment swoole.so in php/cli/php.ini file ?

help link

https://github.com/swoole/swoole-src/issues/3952#issuecomment-782765934
****
