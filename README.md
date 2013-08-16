Customer Paradigm Candidate Project
===================================


### Part I. Abstract Model


**Subjects tested: OO Concepts, MySQL CRUD, Object-relational mapping**

In this folder you will find

    Contact.php
    contacts.sql
    contact_test.php

You will be building the abstract class that Contact should extend from (currently named AbstractModel)

You will need to:

1. Import contacts.sql into a MySQL database

2.  Write AbstractModel.php with the following methods

        public function save()
        public function load($id)
        public function delete($id)
        public function getData($key=false)
        public function setData($arr, $value=false)
    
    **Note**: Make sure your abstract model isn't hard coded to only use the contacts table! You do not need to make AbstractModel work with composite keys—Assume all models extending from this table use a single primary key.

    You will need to make database calls in these methods. Use one of the following adapters:

        PDO
        MySQL
        MySQLi

3. Ensure contacts_test.php runs correctly (the expected output is in the file)—this is basically a unit test.


=========================================================================================
### Part II. Framework

**Subjects tested: MVC, Framework Exposure**

Using the framework of your choice, incorporate the abstract model into a simple application.

**Application guidelines**:

1. Create a web page for viewing contacts (e.g. <code>myapp/contact/view?id=[some_id]</code> or <code>myapp/contact/view/[some_id]</code>). This page should display all of the contact's information for the given id.

2. Use the Contact model shown above to load the record.


=========================================================================================
### Part III. GitHub

1. Commit your changes to your forked repository and issue a pull request to this repository.

Good luck!
