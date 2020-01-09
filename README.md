# ISAD-251
ISAD 251 Coursework Repository

Server File: http://web.socem.plymouth.ac.uk/ISAD251/ctaylor20/ISAD-251/public/index.php

Admin User logon, Username: *admin*, password: *pass*

Youtube demonstration link: https://www.youtube.com/watch?v=ylXEOteo-fQ

Images used in the application are referenced using the products category to find the folder and the products name to get the correct image.

Screenshots of the application in use can be found within the 'Screenshots' folder. It demostrates the key features of the site on 3 different browsers.
<br><br><b><u>Application Description</u></b>

Overview<br><br>
The application has been developed using PHP and mySQL to create online ordering system for a pub. The application works simply using an online shopping trolley that allows users to add things to an order. The order can then be placed using a table number. Not further user identification system has been implemented.
How to use<br><br>
Standard User:<br><br>
The application can be accessed using the URL submitted within the design document. This will take you to the sites home page. This home page has no functionality at this moment in time but can have material about the pub added to give users more information. The navigation bar at the top of the screen can be used to get to the other pages.<br><br>
The menu page shows the user all the products that are currently available and on the database. Each product has its name, description and price listed on its product card. The add button under each product is used to add that specific item to the trolley.  The items in the trolley can be seen by accessing the trolley page.<br><br>
The trolley page shows all the items that are currently within the user’s trolley. There is currently no way to edit the items shown within the trolley unless it is completely cleared. At the trolley page the user can checkout using their table number and email. The user will be taken to a new page showing their newly created order number. <br><br>
Admin User: <br><br>
The navigation bar features a sign in button to the right. This can be used to take the user to a sign on screen that requests a username and password. This is for admin use, allowing them to log on and make changes to the database from the website. The credentials are: ‘admin’ and ‘pass’, for simplicity purposes. 
<br><br>Once logged in as an admin the navigation bar will now show the option to log out where the sign on button previously was. This will return the user to a standard user. 
As an admin the menus page now shows the products information in editable textboxes. Data can be edited and saved using the save changes button at the bottom of each product card. At the top of the menu page there is now the option to add and remove products. 
Clicking the add product button directs the user to a different page where the required information can be inputted and saved. Removing a product requires no redirection, all that is needed is the product ID; this is displayed within the echo product card also. 
<br><br>


Key Features
1.	Ability to view all products for sale
2.	Ability to place an order for products
3.	Option to change product information 
4.	Option to add a new product 
5.	Option to have a product removed from sale
