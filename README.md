# SimpleBlog
Simple blog, without using any external framework
=================================================
after pulling this repository, open http://localhost/phpmyadmin; then import the file **labstructure.sql** This file containes the tables which this application needs to run.


database name "simpleblog"
root directory  "SimpleBlog-master"

Then run the folowing CL with composer
composer dump-auto
======
open your browser and type :
http://localhost/{blogDirectory}
http://localhost/{blogDirectory}/users
http://localhost/{blogDirectory}/categories
http://localhost/{blogDirectory}/posts

======
to see how it works you can add some dummy categories, users, and posts in your database


If you find any errors please let me know. :)
