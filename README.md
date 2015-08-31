# READ ME

 -- Following read.me is created based on expertise more than a month ago, information might be inaccurate
 
 0. Creating the app
   - Creating the android APK through jsfiddle and phoneGap(Cordova)-framework. Full tutorial can be found at the phoneGap website.
 
  ## ALL CONNECTIONS TO DATABASE ARE HARDCODED - CHANGE WHEN SERVER IS SET UP

 1. Setting up the server
   Using the mobile application requires an online Apache-server. Database type; MySQL.
   All online files are found in the ==ONLINE== folder.
    - Create a database on your server
    - Change the data in the config-file (/config/constants)
  
  ## CHANGE ALL HARDCODED LINKS IN THE DATABASE FILES
  
  2. Logging in
   When everything is configured and installed, you have to add an user to the database. Without users available in the User-table, you won't be able to access the application.
   MD5-HASH
