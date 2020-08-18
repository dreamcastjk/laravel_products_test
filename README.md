<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### Разворот
```sh
cp .env.example .env   - set your database connection

composer install
php artisan key:generate
php artisan migrate:fresh --seed
```

### Запуск сервера
```sh
php artisan serve
```


### TЗ
Разработать API backend на фреймворке Laravel 7. В качестве БД использовать MySQL, Postgresql. Ожидаемое время выполнения 4 часа. Результат должен быть выложен на github

Требуемый функционал:
Регистрация: ФИО, email (уникальный), телефон (уникальный), пароль, подтверждение пароля. Все поля обязательны. Пароль должен быть не менее 6 символов, только латиница, минимум 1 символ верхнего регистра, минимум 1 символ нижнего регистра, минимум 1 спец символ $%&!:. Телефон должен удовлетворять маске: начинаться с +7 после чего идет 10 цифр.
Авторизация: email или телефон (одно поле), пароль 
Для атворизованных пользователей доступен “каталог товаров”. Товар: название, цена, количество. Свойства (опции) товара: название
Свойства товара должны быть произвольными т е заполняться в БД
Реализовать фильтрацию списка товаров с множественным выбором, например GET /products?properties[свойство1][]=значение1_своства1&properties[свойство1][]=значение2_своства1&properties[свойство2][]=значение1_свойства2.

Методы доступные неавторизованным пользователям: регистрация, авторизация

Методы доступные авторизованным пользователям: список товаров (“каталог товаров”) пагинированных по 40

Идентификация пользователя должна происходить по Bearer токену.
