# Демо проект "Калькулятор займа".

Текст задания в файле задание.txt

###### Подъём проекта:
При установленном в системе composer:
```
git clone https://gitlab.com/clown.geo/calc.git calc 
cd calc 
composer install 
cd public 
php -S localhost:8888 -t ./ index.php
```

###### Проверка

Например, доступен тестовый запрос:

```
curl -X POST \
  http://localhost:8888 \
  -H 'Content-Type: application/json' \
  -H 'Postman-Token: ea8eb006-cdff-4ded-b85a-b18a786c544c' \
  -H 'cache-control: no-cache' \
  -d '{
 "loan": {
  "base": 10000,
  "date": "2018-07-27 10:20:37",
  "percent": 0.02,
  "duration": 30
 },
 "payments": [
  { "amount": 5000.00, "date": "2018-07-28 12:35:22" },
  { "amount": 1000, "date": "2018-07-29 23:55:08" },
  { "amount": 500, "date": "2018-07-29 23:55:08" },
  { "amount": 3956.16, "date": "2018-08-04 00:05:01" }
 ],
 "atDate": "2018-08-06 12:00:00"
}'
```

###### Подробная информация о расчёте

Чтобы вывести подробную информацию, 
укажите в теле запроса параметр **"detail": true** 


###### TODO
переименовать Exceptions
