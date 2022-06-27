## Soccer Tournament Simulation

### It is designed to simulate all matches of 4 teams whose fixtures are determined.

### Here is the command ordered list that you must use to run project locally
```
git clone https://github.com/bartukocakara/laravel-vue-football-tournament-simulation.git
cd laravel-vue-football-tournament-simulation
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed (Before run this please make sure db connection configured right way)
npm install
npm run dev
```
