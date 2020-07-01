# wishlist App
 <br> Features:
 <br>
 Customer views  :<br>
   - Can create Wishlist of products<br>
   - Login & Register  <br>
   - Register<br>
   - Export Csv File though command line (CLI)
  
 <br>Consumers views : 
 To access Consumer Login 
 ``
 - Can Create its Own Products and Own Wishlist 
 - Login and Register 
 - Export Csv File though command line (CLI)
 
 Super Admin 
 - Can Manage users also
  
 Both Customer and Consumer has different  views and Templates Used Admin Lte for Consumer Dashboard 
 
 Used  Php framework :
 - Laravel 7
 - php version:7.3 <br>
 
 Note: Don't use php 7.4 for this project because it has some bugs which will abort the artisan functions
## Installation:
- `git clone https://github.com/nareshbabunuli/wishlist.git`

  - `cd wishlist`  (Project Folder)
  - `composer install`
<br> Used Laradock  for Containerization 
  - `cd dock`
  - `docker-compose up -d nginx mysql phpmyadmin workspace`
  
    - site       : `http://localhost/`
    - phpmyadmin : `http://localhost:8081/`
         <br> - Server:`mysql`, username:`default`, password :`secret`
            <br>(You can find these credential in .env files)
  
     - Go to database the folder, you will find wishlist.sql file in dump folder import it into a database using phpmyadmin
     
     Done  :) you can run the application  
     
     Also you can export (Customer & Consumer's) wishlist using command line 
     <br>
     Go to the project folder in workspace bash in docker GUI 
       - `php artisan export:wishlist`
       <br>
       Options will shown      
       0 - Customers Wishlist
       <br>
       1 - Consumers Wishlist 
<br>


For any  quires you can ping me My Email:nareshbabu.nuli@gmail.com
    
 
 
 
 
