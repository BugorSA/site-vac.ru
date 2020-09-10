# Сайт-опрос
Небольшой сайт для записи заявок с сайта и дальнейшей их выдачи
##### Использованы следующие технологии:
* PHP 7
* Symfony
* Doctrine
* MySql
* JQuery
* Bootstrap

##### Описание проекта:
Клиент заполняет форму в три этапа которые физически находятся на одной странице, 
при прохождении каждого этапа данные проверяются в front-end 
на заполненность и/или на корректность данных, при прохождении 
проверки интерфейс этапа скрывается и показывается новый . 
После данные отправляются асинхронным запросом на Backend где повторно валидируются, 
проверенные данные собираются в обьект который отправляется через ORM в БД.
При передаче в качестве GET параметра  auth_key=junior_test пользователю 
выводиться JSON с сохраненными в БД записями.

##### Скриншоты:
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/bf/71cf5a627372cc4ffd6e7f81c3c394bf.jpeg)](https://fastpic.ru/view/112/2020/0910/71cf5a627372cc4ffd6e7f81c3c394bf.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/13/7cb7be5531a6c2659ee5432e5082d313.jpeg)](https://fastpic.ru/view/112/2020/0910/7cb7be5531a6c2659ee5432e5082d313.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/98/f22dd5cada424df9dd6b987ffef2a798.jpeg)](https://fastpic.ru/view/112/2020/0910/f22dd5cada424df9dd6b987ffef2a798.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/3e/e5ef4aa20e8df16a5c1bd38d4a2e913e.jpeg)](https://fastpic.ru/view/112/2020/0910/e5ef4aa20e8df16a5c1bd38d4a2e913e.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/84/ceb0a2e88b8ff62191646d8c326b4a84.jpeg)](https://fastpic.ru/view/112/2020/0910/ceb0a2e88b8ff62191646d8c326b4a84.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/76/c410b50b75756850762d4251041b7f76.jpeg)](https://fastpic.ru/view/112/2020/0910/c410b50b75756850762d4251041b7f76.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/2d/940616ac039fde519525099962b4c82d.jpeg)](https://fastpic.ru/view/112/2020/0910/940616ac039fde519525099962b4c82d.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/5b/6098e38c1dda0238fd32914c14adbb5b.jpeg)](https://fastpic.ru/view/112/2020/0910/6098e38c1dda0238fd32914c14adbb5b.png.html)
* [![FastPic.Ru](https://i112.fastpic.ru/thumb/2020/0910/51/0772a93997015d471f9764dda957d051.jpeg)](https://fastpic.ru/view/112/2020/0910/0772a93997015d471f9764dda957d051.png.html)