# bookstore-db

My term project for COMP306 (Database Management Systems) course


### Queries for Employees

* Find the bestseller in each store for a given genre
* Find the store that has sold the most books for the given date
* Find which customer spent how much money in each store
* Find all customers and order them by the number of books they purchased
* Find all customers who have been purchasing books since given year
* Find number of books by their publisher and sort them alphabetically by the name of the publisher for a certain store
* Find the e-mail of all employees that works in a store where bookcopy is available

### Queries for Customers

* Find books by author
* Find which stores have a certain book and also show the amount
* Find the most popular author of all stores (by the total number of books sold)

### Constraints

*	Each employee has a unique ID.
*	Each employee has name and email 
*	Each book has to have unique ISBN number.
*	Each book has to have zero or more copies.
*	Each book has to have non-zero price.
*	Each book has to have author and unique name.
*	Each customer has unique ID.
*	Each customer has name and email.
*	Company has more than zero stores.
*	Each store has unique ID.
*	Each store has to have more than one employee assigned by company. 
*	Each store has name and address. 
*	Each store has to log the orders with date, associated book and customer ID.



### Entity & Relationship Diagram

![diagram.png](https://raw.githubusercontent.com/mdogan13/bookstore-db/master/diagram.png)
