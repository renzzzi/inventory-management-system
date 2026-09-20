# Inventory Management System: Project Guide

This document explains how the current PHP application is organized and how its files work together.

## Application Style

The project uses a small MVC-style structure:

- **Routes** decide which controller and action should handle a request.
- **Controllers** coordinate the request, application logic, models, and views.
- **Models** communicate with the database.
- **Views** produce the HTML shown in the browser.
- **Configuration** creates shared services such as the database connection.
- **Public files** are the web-facing entry point and static assets.

The application currently uses plain PHP without a framework or Composer bootstrap.

## Request Flow

Every browser request should enter through `public/index.php`:

```text
Browser request
      |
      v
public/index.php
      |
      +--> routes/web.php: match HTTP method and URI
      |
      +--> app/controllers/{Controller}.php
                    |
                    +--> app/models/{Model}.php
                    |          |
                    |          +--> config/database.php --> MySQL
                    |
                    +--> app/views/{view}.php --> HTML response
```

### Step-by-step

1. The web server sends the request to `public/index.php`.
2. `public/index.php` loads `routes/web.php`.
3. The HTTP method and URI are read from `$_SERVER`.
4. The matching route supplies a controller class name and action method.
5. The controller file is loaded and the controller object is created.
6. The requested action is called.
7. The controller may load a model, read or update data, and then include a view.
8. The view outputs HTML directly to the browser.

## Directory and File Responsibilities

### `public/`

This is the web-facing directory. The web server should use it as the document root so application files outside it are not directly exposed.

#### `public/index.php`

This is the front controller and the current application entry point. It:

- loads the route definitions;
- reads the request method and path;
- removes trailing slashes from non-root paths;
- returns a `404` response when no route matches;
- loads the selected controller file;
- returns a `500` response when the controller file or action is missing;
- creates the controller and calls its action.

It does not contain business logic. Its job is request dispatching.

#### `public/css/`

This directory is reserved for CSS files served directly by the web server. It is currently empty.

#### `public/js/`

This directory is reserved for JavaScript files served directly by the web server. It is currently empty.

The current views load Tailwind CSS from the CDN instead of using files in `public/css/`.

### `routes/`

#### `routes/web.php`

This file defines the route table as a PHP array grouped by HTTP method. Each route maps a URI to a controller and action:

```php
'/login' => [
    'controller' => 'AuthController',
    'action' => 'showLogin'
]
```

Current routes:

| Method | URI             | Controller action            | Purpose                     |
| ------ | --------------- | ---------------------------- | --------------------------- |
| `GET`  | `/`             | `HomeController::index`      | Shows the home page         |
| `GET`  | `/login`        | `AuthController::showLogin`  | Shows the login form        |
| `POST` | `/login/submit` | `AuthController::login`      | Processes login credentials |
| `GET`  | `/dashboard`    | `DashboardController::index` | Intended dashboard page     |
| `GET`  | `/logout`       | `AuthController::logout`     | Ends the current session    |
| `GET`  | `/products`     | `ProductController::index`   | Intended products page      |

The route table is configuration data; it does not execute controller logic by itself. `public/index.php` interprets it.

### `app/controllers/`

Controllers are the coordination layer between routes, models, and views.

#### `app/controllers/HomeController.php`

`HomeController::index()` includes `app/views/index.php`, which renders the application home page.

#### `app/controllers/AuthController.php`

This controller handles authentication-related requests:

- `showLogin()` includes the login view.
- `login()` starts a session, reads the submitted email and password, asks the `User` model for the matching user, verifies the password, stores user information in the session, and redirects to `/dashboard` on success.
- On failed login, it sets an error message and includes the login view again.
- `logout()` clears the session, destroys it, and redirects to `/login`.

`AuthController.php` loads `app/models/User.php` with `require_once` because authentication needs database access.

### `app/models/`

Models contain data-access code and hide database queries from controllers.

#### `app/models/User.php`

`User::findByEmail()`:

1. uses the shared `$pdo` connection;
2. prepares a parameterized query against the `users` table;
3. searches for one user by email;
4. returns the user row as an associative array, or `null` when no user is found.

The prepared statement prevents the email value from being inserted directly into SQL.

### `app/views/`

Views are PHP templates that generate the HTML response. They can display values prepared by a controller, but they should not contain database queries or routing logic.

#### `app/views/index.php`

Renders the home page heading for the Inventory Management System.

#### `app/views/auth/login.php`

Renders the login form. The form submits a `POST` request to `/login/submit`, which matches the `AuthController::login()` route. If the controller provides `$error`, the view displays it after escaping it with `htmlspecialchars()`.

### `config/`

#### `config/database.php`

Creates the global `$pdo` PDO connection to the MySQL database named `inventory_ads` on `127.0.0.1` using the `root` user.

It also configures PDO to:

- throw exceptions when database operations fail;
- return query results as associative arrays;
- use UTF-8 (`utf8mb4`) for the connection.

`app/models/User.php` loads this file before using `$pdo`.

For deployment, database credentials should come from environment variables or another protected configuration source rather than being committed directly in this file.

### `storage/`

This directory is intended for application-generated files that should not be treated as source code, such as logs, temporary files, or uploaded files.

#### `storage/logs/`

This is the reserved location for application logs. It is currently empty, and the current PHP files do not write logs there.

## Login Example

The current login flow connects the layers as follows:

```text
GET /login
  -> routes/web.php
  -> AuthController::showLogin()
  -> app/views/auth/login.php

POST /login/submit
  -> routes/web.php
  -> AuthController::login()
  -> User::findByEmail()
  -> config/database.php / MySQL
  -> password_verify()
  -> redirect to /dashboard or redisplay login.php with an error
```

## Current Implementation Notes

- `routes/web.php` contains routes for `DashboardController` and `ProductController`, but those controller files are not currently present in `app/controllers/`. Requests to `/dashboard` or `/products` will therefore produce `Controller not found.` until the controllers are added.
- The successful login flow redirects to `/dashboard`, so a complete login experience also requires `DashboardController::index()` and its view.
- No authentication guard currently protects `/dashboard` or `/products`; route access checks would need to be added to those controllers or to the dispatching layer.
- Sessions are started inside authentication actions. Any future controller that reads session data should start the session before accessing `$_SESSION`.
- The current views use the Tailwind CDN. The `public/css/` and `public/js/` directories are available for local assets later.
- `config/database.php` uses hard-coded development credentials and should be secured before production use.

## How to Run
- go to the correct directory of the project:

cd C:\Desktop\inventory-management-system

- then run the command below:

php -S localhost:8000 -t public

- Why do we need a terminal at all?
Because: php -S localhost:8000 -t public

tells PHP: "Start PHP's built-in development web server, use port 8000, and treat the public folder as the website's root."
