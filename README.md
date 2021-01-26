# Symfony Job Board

_Website to find your dream job and post offers as company._

## Project goal by martin-stepwolf :goal_net:

Personal project to learn [Symfony framework](https://symfony.com/) and show my skills as web developer. 

## Achievements :star2:

I have worked with [Laravel](https://laravel.com/), then I knew already about **Composer, ORM, MVC pattern, migration, etc**.
I found some interesting features in this framework as:

- Learn [Twig](https://twig.symfony.com/) and the [Forms](https://symfony.com/doc/current/forms.html).
- Learn the **powerful console**, **creating CRUDs** with its table and its relation is possible with almost just commands.
- **Manage the security, routes, entities, controllers etc as Symfony works**.
- Implement design and styles (with [Sass](https://sass-lang.com/)) as Symfony suggest in its [documentation](https://symfony.com/doc/current/frontend.html).
- Use [Fixtures](https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html) to fill the database with fake data.
- Implement docker and docker compose for a better environment.

## Getting Started 🚀

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites 📋

The programs you need are:

-   [Docker](https://www.docker.com/get-started).
-   [Docker compose](https://docs.docker.com/compose/install/).

### Installing 🔧

Note: The database configuration are defined in .env, and its used in docker-compose, if you want to personalize it create a copy from .env to .env.local and/or create a docker-compose.override.yml:

First create the image (php:7.4-composer-npm) and run the services (php, nginx and mysql):

```
docker-compose up
```

Note: The next steps can be automated bu running

```
sh ./installation.sh
```

Then install the dependeces.

```
docker-compose exec app composer install
docker-compose exec app npm install
```

Then generate the database

```
docker-compose exec app php bin/console doctrine:migrations:migrate
```

Finally load the fake set of data into a database:

```
docker-compose exec app php bin/console doctrine:fixtures:load
```

## Running the project :computer:

Each time SASS and JavaScript files are updated you need to run:

```
docker-compose exec app npm run dev
```

To make it automated run:

```
docker-compose exec app npm run watch
```

And now you have all the environment, the nginx server is in the port 8000 (e.g http://127.0.0.1:8000/).

### Main functionality ⚙️

- In /register you can create an account as normal user ["ROLE_APPLICANT"].
- To be Administrator, set in the database ["ROLE_ADMIN"] in roles column.
- As Administrator you can create companies with a normal user as reference(to log in).
- As company ["ROLE_COMPANY"] you can create offers.
- As normal user you can watch and apply to the offers.

## Authors

- Martín Campos - [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/symfony-job-board/issues) and/or [pull requests](https://github.com/martin-stepwolf/symfony-job-board/pulls).

## License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

## References :books:

- [Tutorial Laravel with Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04)
- [Docker course](https://platzi.com/clases/docker/)
- [SASS course](https://platzi.com/clases/sass/)
