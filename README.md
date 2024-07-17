# About CRUD Blog/Posts APIs
This a simple CRUD Blog/Posts APIs with user interactivity using PHP 8.1^ and Laravel 10.

## API Endpoint Definitions:
    1. Endpoints for Blogs:
        ◦ View All Blogs:an endpoint to fetch all blogs.

        ◦ Create Blog:an endpoint to create a new blog.
          
        ◦ Show Blog:an endpoint to fetch details of a specific blog and its posts.
          
        ◦ Update Blog:an endpoint to update an existing blog
          
        ◦ Delete Blog:an endpoint to delete a blog
          
    2. Endpoints for Posts under a Particular Blog:
        ◦ View All Posts:an endpoint to fetch all posts under a specific blog
          
        ◦ Create Post:an endpoint to create a new post under a specific blog.

        ◦ Show Post:an endpoint to fetch details of a specific post and its likes and comments.

        ◦ Update Post:an endpoint to update an existing post.

        ◦ Delete Post:an endpoint to delete a post.

    3. Viewers can Interact with Blog Posts:
        ◦ Like Post:an endpoint for liking a post.
        ◦ Comment on Post:an endpoint for commenting on a post.

## Exported Postman collections
    1. The exported collection called "CRUD Blog/Posts APIs" can be found in the root directory of the repository
    2. The collection contains the endpoints for each of the tasks specified in the API endpoint definitions 1, 2 and 3.

## Instructions on how to run the project
    Prerequisites
    1. Install PHP 8.1 or higher: Make sure PHP is installed on your system. You can download it from php.net.
    2. Install Composer: Laravel uses Composer for dependency management. You can download it from getcomposer.org.
    3. Install Laravel Installer: Install the Laravel installer globally using Composer:
       composer global require laravel/installer
    4. Git: Ensure Git is installed on your system for cloning repositories.
    5. Postman: Make sure you have Postman installed to import and test API collections.

    Step-by-Step Instructions
    1. Clone the Repository
    Clone the GitHub repository containing the Laravel project and the Postman collections: git clone <repository_url>
    cd <project_directory>
    2. Install Dependencies
    Navigate to your project directory and install PHP dependencies using Composer: composer install
    3. Set Up Environment Variables using the .env file containing the database credentials, API keys, and any other necessary configuration settings. Also, setup the MySQL database with the credentials provided.
    4. Generate Application Key: Generate an application key which is used for encryption and other security aspects: php artisan key:generate
    5. Run Migrations
    Run migrations to create the necessary database tables: php artisan migrate
    6. Seed Database: Use seeders from the project to populate the database with sample data, run:php artisan db:seed
    7. Start the Development Server. Run the Laravel development server: php artisan serve
    This will start the server at http://localhost:8000.
    8. Import Postman Collection
    • Open Postman.
    • Click on "Import" button and select "Import From Link".
    • Enter the URL of the GitHub repository where the Postman collection is stored and import it.
    9. Test APIs
    • Use Postman to test the imported APIs.
    • Make sure to update the API URLs in Postman to point to http://localhost:8000 or wherever the Laravel development server is running.
    
    Additional Steps
    • Authentication: For the APIs authentication, use "Bearer Token". The token to use is vg@123.


## Requirements Addressed
    1. Database Seeder: A database Seeder was created utilizing factory to create a user instance that was used as the viewer to fulfill requirement 3.
    2. Define and Utilize Relationships: Laravel eloquent was used to define and manage the relationships between the blogs, posts , likes and comments.
    3. Token Middleware: A token middleware was implemented to guard all routes. The value of this token from the request header is vg@123.

## Additional Requirements:
    • MVC Pattern: The development followed the MVC (Model-View-Controller) pattern.
    • JSON Responses: All responses are in JSON format.
    • Input Validations: Proper validations was required on all input fields.
    • RESTful APIs: All APIs adhered to RESTful principles.
    • Database Migrations: Migrations were created for all necessary tables. The schema was well-structured.







