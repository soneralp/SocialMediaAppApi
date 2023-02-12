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

<ul>
  <li><code>GET /api/users</code>: Lists data of all users.</li>
  <li><code>GET /api/users/{id}</code>: Views data of the user with the specified <code>id</code>.</li>
  <li><code>POST /api/users</code>: Creates a new user account.</li>
  <li><code>PUT /api/users/{id}</code>: Updates data of the user with the specified <code>id</code>.</li>
  <li><code>DELETE /api/users/{id}</code>: Deletes the user account with the specified <code>id</code>.</li>
</ul>

<h2>Notice</h2>

<p>Please note that this project is currently in development and not yet completed. The scope of usage may be subject to change as development continues.</p>

<h2>License</h2>

<p>This project is licensed under the MIT License. For more details, please refer to the <code>LICENSE</code> file.</p>
