# wordpress-unzip
This script extracts the wordpress zip file on a web server. 
Why are we using that way?
Instead of copying all the extracted files (2838 files and 313 folders) via ftp - that might take a long time, because for each file you send a request and get back a response - , we are just copy one file - the wordpress.zip - that will take a while as well but will be shorter that the first approach. After we have copied the file we can run the zip.php script on the server that will extract the files on server site in normally less than 10 seconds.  

# Usage
copy the: 

- zip.php
- wordpress.zip 

into the document root folder where wordpress will run later on.

Please make sure that the zip file itself dous not contain the wordpress folder as below:

wordpress.zip
- ---- wordpress <-- that is wrong!!!!!!
- -------- wp-admin
- -------- wp-content
- -------- wp-includes
- -------- index.php
- -------- ... others

It must contain the folder and scripts as below:

wordpress.zip
- -------- wp-admin
- -------- wp-content
- -------- wp-includes
- -------- index.php
- --------  ... others

After you copied the files, point to your domain with /zip.php like (https://www.your-domain.de/zip.php)
When all went fine you should be redirected to the WordPress installation folder. 
The original wordpress.zip file has been renamed to wordpress.zip.processed and can be deleted as well as the zip.php file.

Any improvements are welcome! I am still loooking for a script that would extract the files from the originally "wordpress" folder within the originally wordpress.zip to the document root.
