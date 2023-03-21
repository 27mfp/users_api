# User Management API

This API allows users to manage a database of users.

## Objective

The objective of this project is to provide an API that allows users to perform CRUD (Create, Read, Update, Delete) operations on a database of users.

# Endpoints

## The following endpoints are available:

### List all users

    GET /api/users
    This endpoint returns a list of all users in the database.

### Create a new user

    POST /api/users
    This endpoint allows the creation of a new user. The request must include the following parameters:

    name: The name of the user.
    email: The email address of the user.

### Update an existing user

    PUT /api/users/{user}
    PATCH /api/users/{user}
    This endpoint allows the updating of an existing user. The request must include the following parameters:

    name: The name of the user.
    email: The email address of the user.

### Delete a user

    DELETE /api/users/{email}
    This endpoint allows the deletion of an existing user. The request must include the email address of the user to be deleted.

### Search for a user

    GET /api/users/search?email={email}
    This endpoint allows the searching of a user by email address. The request must include the email address of the user to be searched for in the query parameter email.

# Conclusion

This API provides a simple way to manage a database of users. The endpoints provided allow users to perform CRUD operations on the database, making it easy to create, read, update, and delete user data.
