# leave-tracker



```bash
# clone
git clone

#copy the .env.example content and make a .env file 
cd .env.example .env

#install composer
composer install

#install npm
npm install

#generate app key
php artisan key:generate

#run the command
./vendor/bin/sail up -d

#migrate and seed the data
./vendor/bin/sail artisan migrate:fresh --seed

#for the root permission run this command in the terminal of docker laravel.test container
chown -R sail:sail storage

#run this command
npm run dev

#got to the login page


#run this if faced permission issues for log file
chmod -R 775 storage


#run this command for running queue
./vendor/bin/sail artisan queue:work

```

