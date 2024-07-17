## About CRUD Blog/Posts APIs
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
    4. Database Seeder:
        ◦ A database Seeder was created utilizing factory to create a user instance that was used as the viewer to fulfill requirement 3.
    5. Define and Utilize Relationships:
        ◦ Laravel eloquent was used to define and manage the relationships between the blogs, posts , likes and comments.
    6. Token Middleware:
        ◦ A token middleware was implemented to guard all routes. The value of this token from the request header is vg@123.






