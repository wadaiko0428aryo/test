# test


## 環境構築


### Docker ビルド


1. ![]git clone git@github.com:GithubEmipon/mogitate.git

2. DockerDesktop アプリを立ち上げる

3. docker-compose up -d --build

4. アプリケーションキーの作成
php artisan key:generate

5. マイグレーションの実行
php artisan migrate

6. シーディングの実行
php artisan db:seed

7. シンボリックリンクの実行
php artisan storage :link


## 使用技術(実行環境)


- PHP8.3.0

- laravel8.83.27

- Mysql8.0.26


## ER図
ER図
## URL

- 開発環境：http://localhost/products

- phpMyAdmin:：http://localhost:8080/
