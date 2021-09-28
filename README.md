<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Vue3 Devtool for firefox here
<a href="https://github.com/vuejs/vue-devtools/releases/download/v6.0.0-beta.8/vuejs_devtools_beta-6.0.0.8-an+fx.xpi" target="_blank">Firefox Vue3 Devtool</a>


# Vue3 Devtool for Google chrome here
<a href="https://chrome.google.com/webstore/detail/vuejs-devtools/ljjemllljcmogpfapbkkighbhhppjdbg" target="_blank">Google Chrome Vue3 Devtool</a>


# Add this configurations to Virtual Host to connect Socialite App

`
    <VirtualHost *:443>
        ServerName vueblog.com
        DocumentRoot "C:/xampp/htdocs/vueblog/public/"
        SSLEngine on
        SSLCertificateFile "conf\ssl.crt\server.crt"
        SSLCertificateKeyFile "conf\ssl.key\server.key"
        <Directory "C:/xampp/htdocs/vueblog/public/">
            Options All
            AllowOverride All
        </Directory>
    </VirtualHost>
`
