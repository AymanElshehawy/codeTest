# Task Guide

## Test 1 
* First Download Task
* Create Database name "codeTest" if you need to change database credentials go to ``Database.php file`` 
* Second open new terminal inside project
* Run ``php -f script.php 4 5``
* Show result inside terminal
* To show results in HTML open your browser and [click here](http://localhost/codeTest/index.php)

## Test 2
### Questions
* Is the system and export queue working fine before las deployment at 10:30 am?
* After deployment is the export queue only one that was affected?

### Assumptions
* If only export queue was affected check last updates on this module.
* If this module work on cron job check server status.
* There are bugs in last updates of export queue module.
* Preview server logs file.
* Preview System logs file. 

### Actions
* Checkout to last working project in this case you must work on version control like "Git".
* Check database tables related to this problem.
* Preview code of the last updates in export queue module.
* Ask team who working on last updates to trace the problem.
* Can't accept any updates without unit tests. 