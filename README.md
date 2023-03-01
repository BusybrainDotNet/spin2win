# spin2win Project
  spin2win 

### Changelog

#### V 1.0.0
Initial Release

#### Requirenment 
PHP >= 5.6

### Author
[Oluniyi Benjamin] (www.github.com/BusyBrainDotNet/)

### Setup

First you need to clone this framework package.

### Framework git clone https://github.com/BusyBrainDotNet/bytecode-mvc.git

Or you can download this package from github.

Then you must setup database and base url in file .env

You should also declare your App Name in the .env file. 
Call the set_app_name()

### Route

You can add static and dynamic routing using $router->get() in file app/configs/routes.php. $router->get() have two parameters first for url and second for the controller with two indexes, first index for class controller name and second index for method controller.

For example you can see the code below.

// static route
$router->get('/static', [HomeController::class, 'index']);

// dynamic route using curly brackets
$router->get('/foo/{bar}', [HomeController::class, 'foo']);

### Model

First you need add namespace App\Models for your Model and then you must inheritance class from Config\Model.
Model Propeties

$db_table is to access database table.

$primary_key is to point to primary key of table row with the default id.

$fillable list of table rows to be insert or update

### Model Method

If you want to access a Controller you can add with ModelFactory::controller('ModelFilename')->function().

ModelFactory have a static method that is controller() with one parameters of model file name and must be chaining with method in file.

Model File in Config Folder Contains Methods

create() is for insert a new data to database and have one parameters for data which to insert.

all() is for read all data from database.

get() is for read specified data from database and have two parameters. First parameters is for select rows data which to show, second parameters is for add a basic where clause to the query.

update() is for update the data from database and have two parameters. First parameters is for data which to be updated, second parameters is for specified primary key.

delete() is for delete the data to database and have one parameters for specified primary key.

### Views

First you need to make a HTML document with extension .php.

If you want to access the data from controller you only have to access with the variable name from key of array data.

For example you can see the code below.

// controller
$data['foo'] = 'bar';
$this->view('home', $data);

// view
<h1>$foo</h1>

### Controller

First you need add namespace App\Controllers for your controller and then you must inheritance class from Config\Controller.

Then you need to display with view you can add with $this->view('home', $data).

If you want to access a model you can add with ModelFactory::model('name')->all().

ModelFactory have a static method that is model() with one parameters of database model name and must be chaining with method of model like get(), create(), all(), update() and delete().


### Helpers

The helpers file in the Config folder helps you with custom/added functionalities.


### Database Setup

Run http://localhost/dbtest to set up database automacally

### End