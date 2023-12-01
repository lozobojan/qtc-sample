This repository contains basic CRUD operations for working with clients. Auth is done using Jetstream scaffold.

To run the app follow the steps below:

- [ ] Clone this repository
- [ ] Run `composer install` command to download and install the dependencies
- [ ] Run `npm install && npm run build` command to download and install JS and CSS files
- [ ] Copy the `.env.example` file into the new `.env` file
- [ ] Run `php artisan key:generate` command to generate a new application key
- [ ] Create a new MySQL database. You can call it a name you want. I suggest `qtc_sample`
- [ ] Link the new database with the app by setting `DB_DATABASE=qtc_sample` in your  `.env` file
- [ ] Run `php artisan migrate --seed` to create tables and populate the data
- [ ] Finally, run the `php artisan serve` to run a local development server
