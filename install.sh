# Script to automate the installation process

# Install PHP dependencies
docker-compose exec app composer install
# Install JavaScript dependencies
docker-compose exec app npm install
# Create the tables and fake data in the database
docker-compose exec app php bin/console doctrine:migrations:migrate
docker-compose exec app php bin/console doctrine:fixtures:load
# Generate the JavaScript and CSS files from Vue and SASS files
docker-compose exec app npm run dev
