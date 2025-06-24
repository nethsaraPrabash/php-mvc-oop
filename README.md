# BLOG APPLICATION

This is a simple blog application using PHP and with mysql as the database and some third party libraries for configuration purposes.

## Project Structure

```
php-crud-app
├── app
│   ├── Controllers      # Contains controller classes for handling user requests
│   ├── Models           # Contains model classes representing the data structure
│   ├── Services         # Contains service classes for business logic
│   └── Views            # Contains view files for rendering the user interface
├── core
│   ├── Controller.php   # Base controller class for other controllers to extend
│   ├── Database.php     # Manages database connections and queries
│   ├── Route.php        # Handles routing logic for the application
│   └── View.php         # Handles rendering of views
├── public
│   ├── index.php        # Entry point of the application
│   ├── css              # Directory for CSS files
│   ├── js               # Directory for JavaScript files
│   └── uploads          # Directory for storing uploaded files
└── README.md            # Documentation for the project
```