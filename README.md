<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

git clone
git clone https://github.com/ArakawaN/umarche
git clone -b ブランチ名 https://github.com/ArakawaN/umarche

##インストール後
public/images フォルダ内に
sample1.png ~ sample6.png として
保存しています

php artisan storage:link で storage フォルダにリンク後,

storage/app/public/products フォルダ内に
保存すると表示されます。
product フォルダは適宜作成してください。

ショップの画像も表示する場合には、
storage/app/public/shops フォルダを作成し、
画像を保存して下さい

php artisan migrate:fresh --seed

決済の処理として Stripe を利用しています。
また、メール処理として mailtrap を使用しています

必要な場合は、.env に追記して下さい。

メール処理には、キューを使用しています。
必要は場合は,php artisan queue:work を起動して下さい。
