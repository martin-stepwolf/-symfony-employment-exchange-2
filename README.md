# Symfony Job Board ![Status](https://img.shields.io/badge/status-no_longer_maintained-orange) ![Passing](https://img.shields.io/badge/build-passing-green) ![Docker build](https://img.shields.io/badge/docker_build-passing-green)

_Website to find your dream job and post offers as company._

### Project goal by mascam97

Personal project to learn [Symfony framework](https://symfony.com/).

Due to this project does not have testing and needs some upgrades, is no longer maintained.

### Achievements :star2:

As PHP Developer (with experience in Laravel) I achieved:

- Learn [Twig](https://twig.symfony.com/) and the [Forms](https://symfony.com/doc/current/forms.html).
- Implemented entities, their relationship and CRUD (all with almost only commands).
- Implemented authentication and register modules.
- Managed the security, routes, entities, controllers etc.
- Implemented design and styles (with [Sass](https://sass-lang.com/) - [documentation](https://symfony.com/doc/current/frontend.html)).
- Implemented [Fixtures](https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html) to fill the database with fake data.
- Implemented docker compose for a better environment.

---

## Getting Started 🚀

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites 📋

The programs you need are:

-   [Docker](https://www.docker.com/get-started).
-   [Docker compose](https://docs.docker.com/compose/install/).

### Installing 🔧

Note: The database configuration are defined in .env, and it's used in docker-compose, if you want to personalize it create a copy from .env to .env.local and/or create a docker-compose.override.yml:

First create the image (php:7.4-composer-npm), the volume for the database (laravel-vue-intranet_mysql) and run the services (php, nginx and mysql):

```
docker-compose up
```

Note: You can run the last command in the background with `docker-compose up -d`.

Now you have all the environment ready, for the next commands you need to be inside the app container with:

```
docker-compose exec app /bin/bash
```

Then install the dependencies.

```
composer install
npm install
```

Then generate the database

```
php bin/console doctrine:migrations:migrate
```

Finally, load the fake set of data into the database:

```
php bin/console doctrine:fixtures:load
```

---

## Running the project :computer:

### CSS files

Each time SASS files are updated you need to run:

```
npm run dev
```

To make it automated run:

```
npm run watch
```

And now you have all the environment in the port 8000.

Note: Use `exit` command to exit from the container, `docker-compose down` to delete the containers and `docker volume rm symfony-job-board_mysql` to delete the database volume.

---

## Functionality ⚙️

- In /register you can create an account as normal user ["ROLE_APPLICANT"].
- There is a user with ROLE_ADMIN, its email is `admin@sjb.com` and password `symfony`.
- As Administrator you can create companies with a normal user as reference(to log in).
- As company ["ROLE_COMPANY"] you can create offers.
- As normal user you can watch and apply to offer.
- There is a user with some application, his email is `user@sjb.com` and password `symfony`.

---

### Authors

- Martín S. Campos - [mascam97](https://github.com/mascam97)

### Contributing

You're free to contribute to this project by submitting [issues](https://github.com/mascam97/symfony-job-board/issues) and/or [pull requests](https://github.com/mascam97/symfony-job-board/pulls).

### License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

### References :books:

- [Tutorial Laravel with Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04)
- [Docker course](https://platzi.com/clases/docker/)
- [SASS course](https://platzi.com/clases/sass/)
