# Symfony Employment Exchange

_Website to find your dream job and post offers as company._

## Project goal by martin-stepwolf

Personal project to learn [Symfony framework](https://symfony.com/) and show my skills as web developer. 

## Getting Started 🚀

These instructions will get you a copy of the project up and running on your local machine.

### Prerequisites 📋

The programs you need are:

-   [Composer](https://getcomposer.org/download/).
-   Database and a web server whit PHP.

### Installing 🔧

Duplicate the file .env as .env.local and set your credential for the database in:

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```

Then generate the database whit:

```
php bin/console doctrine:migrations:migrate
```

Now run the server:

```
cd public
php -S localhost:8080
```

### Main functionality ⚙️

- In /register you can create an account as normal user.
- To be Administrator, set in the database ["ROLE_ADMIN"] in roles column.
- As Administrator you can create companies whit a normal user as reference(to log in).
- As company you can create offers.
- As normal user you can watch and apply to the offers.

## Authors

-   Martín Campos - _Initial work_ [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/symfony-employment-exchange/issues) and/or [pull requests](https://github.com/martin-stepwolf/symfony-employment-exchange/pulls).

## License

This personal project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).
