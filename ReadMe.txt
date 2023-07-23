Welcome to LaravelRestaurant App:


To run the App please copy .env.example to .env.


Update DB_PORT, DB_PASSWORD, DB_HOST, DB_USERNAME AND DB_PASSWORD




Use Makefile to run the app, Open a file named Makefile and go to the system terminal :
* Run  the following commands
   * “make composer” - installs all composer dependencies
   * “make tables” - creates all migrations
   * “make seed” - executes all the seeders to add faker data into the DB
   * “make test” - executes all the test cases 
   * “make app-serve” - Serves application


Afer Application serves on url 127.0.0.1:8000/ , Use following curl APIs created:


Create Products: 


curl --location --request POST '127.0.0.1:8000/api/create/product' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6IlNTSVVzTmdhQmtWcWVhNU5McllBaUE9PSIsInZhbHVlIjoiL2R1SHUrVk9mTjNFYVlVLzgwdFUzZTNlaDZISEtmV3h2Q0MvRHF4MGF3MDNuTUhqSnZpWXBaeVlrOTlsMklnYmJ4Q2tXVUxhOVQxdEtQelY5SHNEamNXRlZwaGhYTDZ5K2V1R0o4ZHlWNGoxVVFtNXZmWUQrN1Q4NFpKWU8yQjMiLCJtYWMiOiIxN2Y0MGU4YWExNDY2OTk3NTA5YmFlMzQzMzkwYzliYjMxZTM1OTU5MTIwOWFlYzc0YjE0YWU2ZWQyZWNkYTIzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJ6YW9lQWpQQTFJN2g2c0dGOGFnWEE9PSIsInZhbHVlIjoiNkRzT3Z1UTh2cmp6UHlZamx4QlJRaTFnV3ZuN0RHbHg5R3ZWcnQ5a1ViNVJVK3BXZEhKV3E3SXpqa0pITElhTTY5cW5DdThENmFMZW1vbWx2SXp6SE1tN2dhYm8rL3hTaDNSWHdiOHc5WUdFS3llblBZajJSZTAzc0FzVzhUSkIiLCJtYWMiOiI2NTQzOGI2NjQxNzgwY2RlODAwM2Q3NDg4YjY0MTcxYWU4MjgzZjA2MjdlYjBmYjA4ZDQ4MDJlZjRmOWIwYzdjIiwidGFnIjoiIn0%3D' \
--data-raw '{
   "products" :[{
           "name" : "sandwich",
           "ingredients" : {
               "onion" : "20g",
               "meat" : "100g",
               "cheese": "20g",
               "olives" : "20g"
           }
       },
       {
           "name" : "burger",
           "ingredients" : {
               "onion" : "20g",
               "meat" : "100g",
               "cheese": "20g",
               "tamato" : "10g"
           }
       },
       {
           "name" : "Pizza",
           "ingredients" : {
               "onion" : "20g",
               "meat" : "100g",
               "cheese": "400g",
               "carrot" : "20g",
               "herbs" : "15g"
           }
       }
   ]
}'




Create Ingredient Inventory: 


curl --location --request POST '127.0.0.1:8000/api/create/ingredient-inventory' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6IlNTSVVzTmdhQmtWcWVhNU5McllBaUE9PSIsInZhbHVlIjoiL2R1SHUrVk9mTjNFYVlVLzgwdFUzZTNlaDZISEtmV3h2Q0MvRHF4MGF3MDNuTUhqSnZpWXBaeVlrOTlsMklnYmJ4Q2tXVUxhOVQxdEtQelY5SHNEamNXRlZwaGhYTDZ5K2V1R0o4ZHlWNGoxVVFtNXZmWUQrN1Q4NFpKWU8yQjMiLCJtYWMiOiIxN2Y0MGU4YWExNDY2OTk3NTA5YmFlMzQzMzkwYzliYjMxZTM1OTU5MTIwOWFlYzc0YjE0YWU2ZWQyZWNkYTIzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJ6YW9lQWpQQTFJN2g2c0dGOGFnWEE9PSIsInZhbHVlIjoiNkRzT3Z1UTh2cmp6UHlZamx4QlJRaTFnV3ZuN0RHbHg5R3ZWcnQ5a1ViNVJVK3BXZEhKV3E3SXpqa0pITElhTTY5cW5DdThENmFMZW1vbWx2SXp6SE1tN2dhYm8rL3hTaDNSWHdiOHc5WUdFS3llblBZajJSZTAzc0FzVzhUSkIiLCJtYWMiOiI2NTQzOGI2NjQxNzgwY2RlODAwM2Q3NDg4YjY0MTcxYWU4MjgzZjA2MjdlYjBmYjA4ZDQ4MDJlZjRmOWIwYzdjIiwidGFnIjoiIn0%3D' \
--data-raw '{
   "onion": 10,
   "meat" : 20,
   "cheese" : 5,
   "olives" : 2,
   "tamato" : 10,
   "corn" : 20,
   "herbs" : 10
}'




Create Orders:


curl --location --request POST '127.0.0.1:8000/api/create/order' \
--header 'Content-Type: application/json' \
--data-raw '{
   "product_id": 1,
   "quantity" : 10
}'