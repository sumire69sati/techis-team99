## アプリケーション名
「商品管理システム」
## アプリケーション概要  
アパレルショップの商品管理・従業員管理を行うシステムです。  
店員は一般ユーザーとしてアカウント登録され、ショップのアパレル商品一覧を確認できます。  
店長などの責任者は管理者権限を付与され、商品一覧画面の閲覧に加え、商品の登録削除・ユーザーの管理と一般ユーザーへの管理者権限付与が出来ます。

## URL
https://test-team99.herokuapp.com

## テスト用アカウント
 メールアドレス:saitou@gmail.com  
 パスワード:mk5<ha2re
                
## 利用方法
一般ユーザー:  
アカウント登録をすると、一般ユーザーとして登録され、ログインすると商品一覧画面が閲覧できます。  
商品一覧画面では、商品の一覧を確認でき、詳細ボタンを押すと商品詳細が確認できます。  
またキーワード検索を行うと全商品の中から該当する物を絞り、表示されます。  
管理者ユーザー:  
ログインすると商品一覧画面や商品登録画面、ユーザー一覧画面が閲覧できます。  
一般ユーザーが管理者から管理者権限を付与されると、管理者ユーザーとなります。  
管理者ユーザーの商品一覧画面は商品詳細やキーワード検索に加え、編集ボタンが表示され、商品詳細を更新することが出来ます。  
商品登録画面では新たに追加したい商品の登録や登録されている商品の削除が出来ます。  
ユーザー一覧画面ではアカウント登録されたユーザーの一覧が表示され、それぞれのユーザーに対し管理者権限の付与やユーザー情報の更新・削除が出来ます。

## 目指した課題解決  
トレンドの入れ替わりが早いアパレル商品の管理作業や従業員管理作業にかかる時間を短縮させ、接客等、人がしないといけない業務に時間を割き、売り上げを上げやすい環境を作ること、またショップ開店時間外の作業を減らし店員の残業を減らすことを目指しました。  

## 洗い出した要件定義

| 優先順位(高:3 中:2 低:1) | 機能 | 目的 | 詳細 | ストーリー |  
| :--- | :---: | ---: | :--- | :---: | 
| 3 | ユーザー管理機能 | 一般・管理者ユーザーの管理 | トップページはログイン画面とし、画面下にアカウント登録画面のリンクを表示する。ログイン時はログアウトボタンを表示する。 | 商品管理システムを利用するユーザーはログインもしくは新規登録する必要がある | 
| 3 | 管理者権限の付与機能 | 重要な作業は管理者ユーザーのみ利用出来るようにする | ログインするとトップページのメニューにユーザー一覧を表示する。ユーザー一覧画面の各ユーザー情報の右端に編集ボタンを表示する。編集ページに遷移し権限付与のチェックボックスを表示する| 商品管理システムの商品登録削除やユーザー管理等の重要な作業は管理者ユーザーのみが利用できるようにする |                  
| 3 | 商品一覧機能 | 登録された商品一覧を見る | 商品コード・種別・商品名・更新日などを表示する | 一般ユーザー管理者ユーザーどちらも商品一覧と商品詳細を閲覧出来る |
| 1 | 商品検索機能 | 商品一覧の中から条件に合う商品を探しやすくする為| キーワード入力で検索可能にする | 検索キーワードを入れて、条件に合った商品を絞って表示する |
| 3 | 商品登録削除機能 | 商品の登録更新削除を行う | 商品名やカテゴリ選択詳細情報を記入欄と登録ボタンや選択した商品を削除するためのゴミ箱ボタンを表示する | 新規登録商品の商品名やカテゴリ選択詳細情報を記入し登録する。商品を選択し、削除する |
| 3 | ユーザー一覧機能 | TD | TD | TD |                 
| 3 | ユーザー管理機能 | TD | TD | TD |  
| 3 | ユーザー管理機能 | TD | TD | TD |                 
| 3 | ユーザー管理機能 | TD | TD | TD |
| 3 | ユーザー管理機能 | TD | TD | TD |  
                 
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
