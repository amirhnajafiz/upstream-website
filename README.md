# Up-Stream

This is the implementation of a full website based on PHP MVC.

Using MySql database to create a website.

And Bootstrap4 for front-end.


## Start 
First install xampp and open phpmyadmin.<br />
We need to create a database and rewrite the configurations in <b>/database/Database.php</b>.
Import the <i>create.sql</i> file in your database in phpmyadmin.

Then install composer. After that clone the project and enter this command:
```shell
composer update
```

After that enter the following command to create the server:
```shell
php -S [IP][PORT] -t '/src/' 
```

I recommand to use IP: 127.0.0.1 and Port 8080

And there it is, now your are good to go.
