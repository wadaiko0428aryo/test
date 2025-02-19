# test


## 環境構築


### Docker ビルド


1. プロジェクトを移動するディレクトリへ移動

2. git clone git@github.com:wadaiko0428aryo/test.git

3. cd test

4. code .  

5. DockerDesktop アプリを立ち上げる

6. docker-compose up -d --build

7. docer-compose exec php bash

8. composer install

9. cp .env.example .env

10. アプリケーションキーの作成
    php artisan key:generate

11. マイグレーションの実行
    php artisan migrate

12. シーディングの実行
    php artisan db:seed




## 使用技術(実行環境)


- PHP8.3.0

- laravel8.83.27

- Mysql8.0.26


## ER図
   https://github.com/wadaiko0428aryo/test/blob/main/src/.drawio.png
## URL

- 開発環境：http://localhost/weight_logs

- phpMyAdmin:：http://localhost:8080/
