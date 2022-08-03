# laravel-docker-dev-env

This repository contains the basic configuration for dockerize a complete local environment for Laravel projects

### Content:
- NGINX 1.19 container to handle HTTP requests
- PHP 8.0.10 container to host your Symfony application
- MySQL 8.0 container to store databases

(feel free to update any version in `Dockerfiles` and ports in `docker-compose.yml`)

## Cmd Makefile
- `make build` to build the containers
- `make start` to start the containers
- `make stop` to stop the containers
- `make restart` to restart the containers
- `make prepare` to install dependencies with composer (once the project has been created)
- `make ssh-be` to SSH into the application container

### Installation:
- Run `make build` to create all containers
- Enter the PHP container with `make ssh-be`
- Install your favourite Laravel version with `composer create-project laravel/laravel example-app`
- Move the content to the root folder with `mv example-app/* . && mv project/.env .`. This is necessary since Composer won't install the project if the folder already contains data.
- Copy the content from `example-app/.gitignore` and paste it in the root's folder `.gitignore`
- Remove `example-app` folder (not needed anymore)
- Navigate to `localhost:1000` so you can see the Laravel welcome page :)

Happy coding!

## Contributing
Thank you for considering contributing! If you find an issue, or have a better way to do something, feel free to open an issue, or a PR.

## License
This repository is open-sourced software licensed under the MIT license.
