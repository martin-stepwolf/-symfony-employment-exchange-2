# Symfony Employment Exchange

_Website to find your dream job and post offers as company._

## Project goal by martin-stepwolf :goal_net:

Personal project to learn [Symfony framework](https://symfony.com/) and show my skills as web developer. 

## Achievements :star2:

I have worked whit [Laravel](https://laravel.com/), then I knew already about **Composer, ORM, MVC pattern, migration, etc**.
I found some interesting features in this framework as:

- Learn [Twig](https://twig.symfony.com/) and the [Forms](https://symfony.com/doc/current/forms.html).
- Learn the **powerful console**, **creating CRUDs** whit its table and its relation is possible whit almost just commands.
- **Manage the security, routes, entities, controllers etc as Symfony works**.
- Implement design and styles (whit [Sass](https://sass-lang.com/)) as Symfony suggest in its [documentation](https://symfony.com/doc/current/frontend.html).

## Getting Started 🚀

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites 📋

The programs you need are:

-   [Composer](https://getcomposer.org/download/).
-   [Node.js](https://nodejs.org/en/download/).
-   Database and a web server whit PHP.

### Installing 🔧

Duplicate the file .env as .env.local and set your credential for the database in:

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```

Then install the PHP packages.

```
composer install
```

Then install the JavaScript packages with npm.

```
npm install
```

Then generate the database whit:

```
php bin/console doctrine:migrations:migrate
```

## Running the project :computer:

First generate the public files with

```
npm run dev
```

Note: Each time SASS and JavaScript files are updated you need to run the past command, to make it easier run:

```
npm run watch
```

Finally run the serve

```
cd public
php -S localhost:8080
```

### Main functionality ⚙️

- In /register you can create an account as normal user ["ROLE_APPLICANT"].
- To be Administrator, set in the database ["ROLE_ADMIN"] in roles column.
- As Administrator you can create companies whit a normal user as reference(to log in).
- As company ["ROLE_COMPANY"] you can create offers.
- As normal user you can watch and apply to the offers.

## Authors

- Martín Campos - _Main work_ [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/symfony-employment-exchange/issues) and/or [pull requests](https://github.com/martin-stepwolf/symfony-employment-exchange/pulls).

## License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).
