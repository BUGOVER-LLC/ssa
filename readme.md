<h3 style="font-style: italic">
- This project is a starter with a set of packages/components that helps you work with Lumen and Doctrine Orm.
Nothing superfluous, everything else can be easily integrated during the development process, Symfony or Laravel components are already at your discretion.
Easy to start a new project gradually expanding (Front part VueJs (vuetify)).
</h3>

> <p>!CHOOSE WEB SERVER</p>
> There is integration both on PHP-FPM or SWOOLE-PHP (the rest is described in the <b>doc folder).

<p align="center">
<img src="https://steringm.ru/uploads/posts/61a00b6d93fd6.png?v0.12.2" alt="drawing" width="290"/>
<img src=".github/ssa-logo.png" alt="drawing" width="400"/>
</p>
<p align="center">
<img src="https://repository-images.githubusercontent.com/5133949/13b58180-bc96-11ea-939f-53b1ca16d341" alt="drawing" width="400"/>
</p>

<p align="center" style="font-size: 1.5rem;color: darkslategrey">Introduction</p>

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
