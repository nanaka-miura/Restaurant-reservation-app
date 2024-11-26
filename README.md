# 飲食店予約アプリ（Rese）  
## 環境構築
Dockerビルド  
1.git clone git@github.com:nanaka-miura/Restaurant-reservation-app.git  
2.docker-compose up -d --build  

Lavaral環境構築  
1.docker-compose exec php bash  
2.composer install  
3.composer require stripe/stripe-php  
4.cp .env.example .env  
5..envファイルの変更  
　(1)DB_HOSTをmysqlに変更  
　(2)DB_DATABASEをlaravel_dbに変更  
　(3)DB_USERNAMEをlaravel_userに変更  
　(4)DB_PASSをlaravel_passに変更  
　(5)MAIL_FROM_ADDRESSに送信元アドレスを設定  
　(6)STRIPE_PUBLIC_KEY=を設定  
　(7)STRIPE_SECRET_KEY=を設定  
6.php artisan key:generate  
7.php artisan migrate  
8.php artisan db:seed  
9.php artisan test  

### ログイン情報  
一般ユーザー  
　id：user1@example.com  
　pass：password  
店舗代表者  
　id：shop-admin1@example.com  
　pass：password  
管理者  
　id：amdin1@example.com  
　pass：password  
 
## 使用技術
・PHP 8.3.12  
・Laravel 8.83.27  
・MySQL 8.0.26  
・nginx 1.21.1  
・MailHog latest  

## ER図
![er](https://github.com/user-attachments/assets/f2209625-4d9b-40a6-91b1-310d55e9fb29)  


### URL
・開発環境：http://localhost/  
・本番環境：
・phpMyAdmin：http://localhost:8080/  
・MailHog：http://localhost:8025/
