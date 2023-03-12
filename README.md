<h1>Laravel Social Media API</h1>

<p>This project is a social media API developed using the Laravel framework. The API allows users to manage their social media accounts and read data from these accounts.</p>

<h2>Installation</h2>

<p>Follow these steps to install the project:</p>

<ol>
  <li>Clone or download the project as a zip file.</li>
  <li>Go to the project directory and run the command <code>composer install</code> from the command line.</li>
  <li>Create the <code>.env</code> file and set up the database connection settings.</li>
  <li>Run the command <code>php artisan migrate</code> from the command line to create the database tables.</li>
  <li>To run the API, run the command <code>php artisan serve</code> from the command line.</li>
</ol>

<h2>Usage</h2>

<p>The API is designed in a RESTful structure for managing user accounts and reading data. The following endpoints are available:</p>

<h1>API Documentation</h1>

<p>This API provides the following endpoints:</p>

<h2>Authentication</h2>

<h3>POST /api/login</h3>

<p>Logs in the user with the given credentials and returns a JWT token.</p>

<h4>Request</h4>

<ul>
  <li>email (string, required): User's email address</li>
  <li>password (string, required): User's password</li>
</ul>

<h4>Response</h4>

<ul>
  <li>200 OK: Returns the JWT token in the response body.</li>
  <li>401 Unauthorized: If the email or password is incorrect.</li>
</ul>

<h3>POST /api/register</h3>

<p>Registers a new user with the given information.</p>

<h4>Request</h4>

<ul>
  <li>name (string, required): User's name</li>
  <li>email (string, required): User's email address</li>
  <li>password (string, required): User's password</li>
  <li>password_confirmation (string, required): User's password confirmation.</li>
</ul>

<h4>Response</h4>

<ul>
  <li>201 Created: Returns the newly created user in the response body.</li>
  <li>422 Unprocessable Entity: If the input is invalid.</li>
</ul>

<h3>GET /api/logout</h3>

<p>Logs out the authenticated user and invalidates the JWT token.</p>

<h4>Response</h4>

<ul>
  <li>200 OK: Returns a success message.</li>
</ul>

<h2>Posts</h2>

<h3>GET /api/posts</h3>

<p>Returns a list of all posts.</p>

<h4>Response</h4>

<ul>
  <li>200 OK: Returns a list of all posts in the response body.</li>
</ul>

<h3>POST /api/posts/create</h3>

<p>Creates a new post.</p>

<h4>Request</h4>

<ul>
  <li>title (string, required): Post title.</li>
  <li>content (string, required): Post content.</li>
</ul>

<h4>Response</h4>

<ul>
  <li>201 Created: Returns the newly created post in the response body.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
</ul>

<h3>POST /api/posts/delete</h3>

<p>Deletes a post.</p>

<h4>Request</h4>

<ul>
  <li>id (integer, required): ID of the post to delete.</li>
</ul>

<h4>Response</h4>

<ul>
  <li>200 OK: Returns a success message.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
  <li>403 Forbidden: If the user is not authorized to delete the post.</li>
</ul>

<h3>POST /api/posts/update</h3>

<p>Updates a post.</p>

<h4>Request</h4>

<ul>
  <li>id (integer, required): ID of the post to update.</li>
  <li>title (string, optional): Updated post title </li>
  </li>
  <li>content (string, optional): Updated post content.</li>
</ul>
<h4>Response</h4>
<ul>
  <li>200 OK: Returns the updated post in the response body.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
  <li>403 Forbidden: If the user is not authorized to update the post.</li>
</ul>
<h2>Comments</h2>
<h3>POST /api/posts/comments</h3>
<p>Returns a list of all comments for a given post.</p>
<h4>Request</h4>
<ul>
  <li>id (integer, required): ID of the post to retrieve comments for.</li>
</ul>
<h4>Response</h4>
<ul>
  <li>200 OK: Returns a list of all comments for the given post in the response body.</li>
</ul>
<h3>POST /api/comments/create</h3>
<p>Creates a new comment for a given post.</p>
<h4>Request</h4>
<ul>
  <li>post_id (integer, required): ID of the post to create the comment for.</li>
  <li>content (string, required): Comment content.</li>
</ul>
<h4>Response</h4>
<ul>
  <li>201 Created: Returns the newly created comment in the response body.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
</ul>
<h3>POST /api/comments/delete</h3>
<p>Deletes a comment.</p>
<h4>Request</h4>
<ul>
  <li>id (integer, required): ID of the comment to delete.</li>
</ul>
<h4>Response</h4>
<ul>
  <li>200 OK: Returns a success message.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
  <li>403 Forbidden: If the user is not authorized to delete the comment.</li>
</ul>
<h3>POST /api/comments/update</h3>
<p>Updates a comment.</p>
<h4>Request</h4>
<ul>
  <li>id (integer, required): ID of the comment to update.</li>
  <li>content (string, optional): Updated comment content.</li>
</ul>
<h4>Response</h4>
<ul>
  <li>200 OK: Returns the updated comment in the response body.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
  <li>403 Forbidden: If the user is not authorized to update the comment.</li>
</ul>
<h2>Likes</h2>
<h3>POST /api/posts/like</h3>
<p>Likes a post.</p>
<h4>Request</h4>
<ul>
  <li>id (integer, required): ID of the post to like.</li>
</ul>
<h4>Response</h4>
<ul>
  <li>200 OK: Returns a success message.</li>
  <li>401 Unauthorized: If the user is not authenticated.</li>
  <li>403 Forbidden: If the user is not authorized to like the post.</li>
</ul>


<h2>Notice</h2>

<p>Please note that this project is currently in development and not yet completed. The scope of usage may be subject to change as development continues.</p>

<h2>License</h2>

<p>This project is licensed under the MIT License. For more details, please refer to the <code>LICENSE</code> file.</p>
