<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Install 
Install docker

## Run 
docker compose up -d

## Test 
PostmanでREST API「/api/post_csvfileupload」を呼び出すと「https://www.post.japanpost.jp/zipcode/dl/utf/zip/utf_ken_all.zip」からzipファイルを「post-api/storage/app/zips」にダウンロードして、「post-api/storage/app/csv」にunzipします。
その後、unzipした「utf_ken_all.csv」ファイルをMySqlDBに入れていきます。
