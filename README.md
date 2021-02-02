
# Mini-Framwork

  

Welcome to a mini-framework developed in PHP using MVC

  

Our main goal is to develop an application method in which you can build web applications more quickly and efficiently for. For this, we use an MVC method

  

# How to use

  

If this is your first time using a mini-framework, you need to understand that this framework is not as complete as full-stack frameworks like Laravel or Symphony. Now that you are aware of it, are you ready to start developing? So let's go!

  

The first thing you need to understand about this mini-framework is that it is completely open source, this means that, if you are not satisfied with some part of the code you are free to make any changes so that it can accommodate your needs.

  

## Routes

In this mini-framework we use a standard route system, known as GET routes and HTTP protocol POST routes, you can better understand this protocol by looking at the table below

| ROUTE | HTTP | RESPONSE 
|--|--|--|
| /home | GET | Return the main page from your website. 
| /login | GET | Return login page from your website. 
| /register | POST | Receive parameters such as username and password to create a record in your database 


So, where can we find our routes? You can find directions from your website at 

```
MyProject/app/http/web.php
```

  
In this file you will find something like
```php
$this->get('/', function(){
	echo "Hello World!";
});
```
or

```php
$this->get('/', "HomeController@index");
```
<br/>
In the first example, you find a method called GET being used by the "$this" instance, but what does that mean? well, you must remember that right above we show you a table in which you represent the two methods of creating routes used in our project, in this case, we can see the GET route being used, right after that, you can see that it is being used as a second parameter an function, this function represents what we want the site to do when the user accesses the "/" route that we passed as the first parameter, if you use these settings, when entering your site, the user will see how the route main message ("/") a reply message ("Hello World").
<br/> 
In the second example, we can see something completely different, in this second example we use a Controller to manage our functions for the "/" route, so that you can understand how this works, read the article below

## Controllers

(coming soon)

