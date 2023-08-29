


# About Test

You will need to write a program that downloads all the items in https://www.pornhub.com/files/json_feed_pornstars.json (the feed is updated daily) and cache images within each asset. To make it efficient, it is desired to only call the URLs in the JSON file only once. Demonstrate, by using a framework of your choice, your software architectural skills. How you use the framework will be highly important in the evaluation.

How you display the feed and how many layers/pages you use is up to you, but please ensure that we can see the complete list and the details of every item. You will likely hit some road blocks and errors along the way, please use your own initiative to deal with these issues, it’s part of the test.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Solution

Created a project to satisfy the above issues.

##Technologies uses:

* Docker
* PHP 8.1
* NGINX
* MYSQL
* Laravel 10 Framework 
* (used NodeJs with Vite but not added in Docker because the viewing part was not that crucial)
* 
## Install

* clone repository
* copy the .env.example into a .env file
* in a terminal execute commands:
    >docker-compose --build
  > 
    >docker-compose up -d
  > 
    >docker exec --workdir /var/www aylo.test.app ./installer.sh
  > 
* after that please wait a bit because the import started and do not close the terminal until it finishes
* after a couple of seconds when you see in terminal some items were added go to

   >http://localhost:8099/
* also to see the DB beeing populated go to   
   >http://localhost:8888/



