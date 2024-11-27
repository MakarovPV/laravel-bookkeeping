# Бухгалтерская книга

Проект по учёту финансов. В проекте реализован подсчёт доходов и расходов с возможностью фильтрации данных по любой дате. 
Все данные наглядно представлены в виде графиков и диаграмм.

##Технологии
- Backend: PHP, Laravel.
- Frontend: JavaScript, JQuery, HTML, CSS, Blade.
- База данных: MySQL.
- Тестирование: PHPUnit.
- Контейнеризация: Docker.

## Запуск приложения

Запустите следующую команду из корневой директории проекта.

```
docker-compose up -d; docker exec project_app sh -c "composer install && cp .env.example .env && php artisan load:all"
```
