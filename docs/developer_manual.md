------------------
*Local System Setup*
------------------

Server Setup:

Downlod XAMPP on your computer. When this application is finished downloading, you can run server side web applications through this channel.

Running the Application:

Download the Github repository. Navigate to the /www folder in the AMPPS folder. Drop the application files in this folder. On the browser, type in www.localhost/(application name) to run the application locally.

File Structure:

We made index.php, ToDoItem.php, and get-data.php on the same directory level so that index.php has easier access to the files that handle talking to the database. We put excessive php files in a file called php. Scripts are stored  in a file called js, which index.php uses to remove and dynamically add To Do Items. The stylesheet is on the same level as index.php.

Libraries:

For Javascript, we used jQuery to remove, add, submit, and display data in the database. AJAX was the primary method used to submit data. Data was retrieved using php. For CSS, we used Bootstrap and Popper.js to make the top navigation bar. Last, we used a library called Stopwatch.js to make allow each To Do Item to have its own timer.

------------
*Remote Setup*
------------

Server Setup:

We used the iSchool VCL as our remote server. The iSchool VCL uses a paid for instance of an Amazon Web Services console. Downloaded Apache2, MySQL, and MyPHPAdmin to get started on the remote server.

Versioning:

To update the live version on the remote server, we used an application called WinSCP to drag and drop files from your local machine onto the remote server. Whenever we wanted to hot deploy the most current working version of our application, we pushed the changes onto the remote master branch on Github, checked out the master branch, and then dragged and dropped the files using WinSCP.

Database Setup:

We used PhpMyAdmin to set up the MySQL database on the remote server. We did it this way because the ToDoItem.php and get-data.php files can have direct access to these files through localhost.

Server: localhost
Username: root
Password: password

Test connection: ToDoItem.php and get-data.php should not throw an error message regarding connecting to database.

Database Structure:

We used one table for our application. This table had 4 columns. The columns consisted of an ID (primary key), TO_DO_NAME, TAG_NAME, and TIME_TAKEN. Data will be retreived and inserted into the table this way.
