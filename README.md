# Image sorter

##### If you ever need to quickly sort some images into two folders use this app.

###### Using this app you can sort images into 2 folders with ease. It is also very easy to add another folder.
#

#### Requirements
- PHP
- Composer
- Git


#### How to use?
##### Run these commands in the working directory. 
#
```sh
git clone https://github.com/nlondrovic/image-sorter
cd image-sorter
cp .env.example .env
composer update
php artisan key:generate
php artisan serve
Create folders pending, saved and discarded in folder public/assets/images
```

##### The app will be started locally on ```http://localhost:8000```
