# SNS-PROJECT

This project is a combination of Vite, React, and Laravel, which allows you to build modern web applications with a fast frontend development experience using Vite and React, and a powerful backend API using Laravel.

## Getting Started

To get started with this project, follow the instructions below.

### Prerequisites

Make sure you have the following software installed on your machine:

- Node.js (version 14 or above)
- NPM (Node Package Manager)
- Composer
- PHP (version 7.4 or above)
- Laravel (version 8 or above)
- MySQL or any other compatible database

### Installation

1. Clone this repository to your local machine:

   ```shell
   git clone https://github.com/SamiAGOURRAM/Artisans.git
   ```

2. Navigate to the project's root directory:

   ```shell
   cd project-name
   ```

3. Install the frontend dependencies. Run the following command:

   ```shell
   npm install
   ```

4. Install the backend dependencies. Run the following command:

   ```shell
   composer install
   ```

5. Update the `.env` file with your database credentials and other configuration settings.

6. Run the database migrations to create the necessary tables:

   ```shell
   php artisan migrate
   ```

7. Start the development server:

   ```shell
   npm run dev
   ```

   This will compile the frontend assets and start the Vite development server.

8. Start the Laravel development server in a separate terminal window:

    ```shell
    php artisan serve
    ```

    The Laravel server will be accessible at `http://localhost:8000`.

9. Visit `http://localhost:3000` in your browser to see the application running.

## Changing Configurations

The project's configuration files can be found in the following locations:

- **Vite configuration**: The Vite configuration file `vite.config.js` is located in the project's root directory. You can modify this file to change Vite-specific settings such as server ports, build paths, etc.

- **React configuration**: React-specific configurations can be found in the `src` directory. You can modify the `src/App.js` file to change the main React application.

- **Laravel configuration**: Laravel configurations can be found in the `config` directory. You can modify the `config/database.php` file to change the database configuration, and the `.env` file for environment-specific settings.

Make sure to restart the respective servers (Vite and Laravel) after making changes to the configuration files for the changes to take effect.

## Contributing

If you want to contribute to this project, please follow these steps:

1. Fork this repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes.
4. Push the branch to your forked repository.
5. Open a pull request with a detailed description of your changes.

## License

This project is licensed under the [MIT License](LICENSE). Feel free to use and modify it according to your needs.

## Acknowledgments

- This project was built using Vite, React, and Laravel, which are powerful frameworks for modern web development.
- Thanks to the open-source community for providing excellent documentation and resources.
