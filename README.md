## About the project

Pet-demo is a simple app written in php laravel which allows to browse and edit resources provided at the https://petstore.swagger.io/ API.

## How to run
You can run the app by running the command:
"php artisan serve"

## App overview
You can browse pets by their status using the links provided above the list:
![obraz](https://github.com/user-attachments/assets/5c549a27-7654-4b73-9832-26eeb4e63e09)
The result is paginated with each page containing maximum 10 items.

You can edit or delete any given item by clicking the corresponding button next to the item.

Additionally you can add a new item via the "New pet" link.


## About the implementation
All controllers the app is using are defined in the ApiController class. The app is using 2 views "data.blade.php" for displaying the items and "form.blade.php" which provides the form to add/edit pets.
