# Users API

## This is a simple API built with Symfony. The API stores user data in a MySQL database.

- Create a new user
- Read user details
- Update user details
- Delete user details

## Requirements

### To run this API, you will need:

    PHP 7.4 or later
    Composer
    MySQL 5.7 or later

# Installation

### To install the API, follow these steps:

Clone the repository to your local machine:

`git clone https://github.com/27mfp/users_api.git`

Install the project dependencies using Composer:

`composer install`

Create a .env.local file in the project root directory with the following contents:

`DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/users_api`

Replace db_user and db_password with your MySQL database credentials.

Create the database:

`php bin/console doctrine:database:create`

Run database migrations:

`php bin/console doctrine:migrations:migrate`

Start the Symfony server:

`symfony server:start`

The API should now be accessible at http://localhost:8000.

# Usage

### The API has the following endpoints:

    GET api/users - Get a list of all users
    
This endpoint list all of the users stored on the database.
###    
    POST api/users - Create a new user

This endpoint allows the creation of a new user. The request must include the following parameters:
- name: The name of the user.
- email: The email address of the user.
- birthdate: The birthdate of the user.
- bio: A biografy of the user.
- city: The city of the user.
- phonenumber: The phone number of the user.
###
    GET api/users/search?email={email} - Get a specific user by email

This endpoint allows the searching of a user by email address. The request must include the email address of the user to be searched for in the query parameter email.
- email: The email of the user.
###
    PUT api/users/{email} - Update a specific user by email

This endpoint allows the updating of an existing user. The request must include the following parameters:
- name: The name of the user.
- email: The email address of the user.
- birthdate: The birthdate of the user.
- bio: A biografy of the user.
- city: The city of the user.
- phonenumber: The phone number of the user.
###
    DELETE api/users/search/{email} - Delete a specific user by email

This endpoint allows the deletion of an existing user. The request must include the email address of the user to be deleted.
###

### Requests

To use the API, send HTTP requests to the appropriate endpoint using a tool like curl, Postman, or a web browser. For example, to create a new user using curl, you could run:

    POST /users HTTP/1.1
    Host: example.com
    Content-Type: application/json

    {
        "name": "John Doe",
        "email": "johndoe@example.com",
        "birthdate": "1985-06-15",
        "bio": "A software developer from California",
        "city": "San Francisco",
        "phonenumber": "123456789"
    }

# Conclusion

This API provides a simple way to manage a database of users. The endpoints provided allow users to perform CRUD operations on the database, making it easy to create, read, update, and delete user data.
