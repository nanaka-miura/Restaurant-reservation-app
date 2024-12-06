# 飲食店予約アプリ（Rese）  
![ReseTop](https://github.com/user-attachments/assets/52cc9aa1-63fa-436c-94b4-2e3fc768b97f)  

## 機能一覧  
・会員登録機能  
・ログイン機能  
・ログアウト機能  
・管理画面  
・バリデーション機能  
・ユーザー情報取得機能  
・飲食店お気に入り機能（追加・削除）  
・評価機能  
・飲食店一覧取得  
・飲食店詳細取得  
・飲食店予約機能（追加・削除）  
・予約変更機能  
・検索機能（キーワード・エリア・ジャンル）  
・リマインダーメール送信機能  
・決済機能  
・QRコード  

## 使用技術
・PHP 8.3.12  
・Laravel 8.83.27  
・MySQL 8.0.26  
・nginx 1.21.1  
・MailHog latest  

## テーブル設計  
![ReseTable_1](https://github.com/user-attachments/assets/e320bd45-f28e-4709-83df-6a13389b33e0)  
![ReseTable_2](https://github.com/user-attachments/assets/c60a2d2a-4478-49bf-9d1f-2845db003949)  
![ReseTable_3](https://github.com/user-attachments/assets/5e030b99-24f3-4031-a36d-94fc445b0e2a)  
![ReseTable_4](https://github.com/user-attachments/assets/124148ca-2675-42ad-8eec-ceec0d80977c)  

## ER図
![er](https://github.com/user-attachments/assets/2f1a3f58-b779-470b-ad4e-4196a1ddf580)  

## 環境構築
Dockerビルド  
1.git clone git@github.com:nanaka-miura/Restaurant-reservation-app.git  
2.docker-compose up -d --build  

Lavaral環境構築  
1.docker-compose exec php bash  
2.composer install  
3.composer require stripe/stripe-php  
4.composer require league/flysystem-aws-s3-v3  
5.cp .env.example .env  
6..envファイルの変更  
　(1)DB_HOSTをmysqlに変更  
　(2)DB_DATABASEをlaravel_dbに変更  
　(3)DB_USERNAMEをlaravel_userに変更  
　(4)DB_PASSをlaravel_passに変更  
　(5)MAIL_FROM_ADDRESSに送信元アドレスを設定  
　(6)STRIPE_PUBLIC_KEY=を設定  
　(7)STRIPE_SECRET_KEY=を設定  
　(8)AWS_ACCESS_KEY_ID=を設定  
　(9)AWS_SECRET_ACCESS_KEY=を設定  
　(10)AWS_DEFAULT_REGION=を設定  
　(11)AWS_BUCKET=を設定  
　(12)AWS_USE_PATH_STYLE_ENDPOINT=を設定  
7.php artisan key:generate  
8.php artisan migrate  
9.php artisan db:seed  
10.php artisan schedule:run  
11.php artisan test  

### ログイン情報  
一般ユーザー  
　id：user1@example.com  
　pass：password  
店舗代表者  
　ログインURL：http://localhost/shop/login  
　id：shop-admin1@example.com  
　pass：password  
管理者  
　ログインURL：http://localhost/admin/login  
　id：amdin1@example.com  
　pass：password  

### URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/  
・MailHog：http://localhost:8025/
