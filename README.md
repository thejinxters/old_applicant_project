Customer Paradigm Candidate Project|
------------------------------------

Part I. Abstract Model (Subjects tested: OO Concepts, MySQL CRUD, Object-relational mapping)
In this folder you will find
	- Contact.php 
	- contacts.sql
	- contact_test.php
You will be building the abstract class that Contact extends from (currently named AbstractModel)
You will need to:
1) Import contacts.sql into a mysql database
2) Write AbstractModel.php
	- REQUIRED METHODS
		* public function save()
		* public function load($id)
		* public function delete($id)
		* public function getData($key=false)
		* public function setData($arr, $value=false)
	- YOU WILL NEED TO MAKE DATABASE CALLS IN THESE METHODS. Please use one of the following adapters:
		- PDO
		- MySQL
		- MySQLi
3) ensure contacts_test.php runs correctly (the expected output is in the file) - this is basically a unit test

**NOTES**
You do not need to make AbstractModel work with composite keys. (Assume all models extending from this table use a single primary key)



=========================================================================================
Part II Framework (Subjects tested: MVC, Framework Exposure)
Using the framework of your choice, incorporate the abstract model into a simple application.

Application guidelines:
1) Must have the following web page:
	- myapp/contact/view?id=[some_id]	* Should display all of the contact's information with the given id. 
2) Must use the Contact model shown above to load the record. 
