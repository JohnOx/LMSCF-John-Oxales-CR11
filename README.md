# CFLMS-Oxales-CodeReview11

Third Backend Project
# Adopt-a-pet

***EXERCISE, EXERCISE, EXERCISE***

Hello, fellow Visitor!

You may enter through register.php! You can create your own credentials if like, but you can use some testcredentials to proceed faster!

You may login as:

customer: test@test.at pw:112233
admin: admin@admin.at pw:123456
super: super@admin.at pw:999999

There is still a lot to do and to improve! Feel free to expand my exercise or give me some useful inputs how I can improve it!

              ------------------------------------------------------------------------------------------------------------------------------------

Project description:
 
You love animals and think it is time to adopt one. You like all sorts of animals: small animals, large animals, you may even like reptiles and birds and may be open to adopting animals of any age. All animals have a photo and live in a specific location. 

What all the animals have in common is a location. A location should hold information about the city, ZIP-code, address (single line like “Praterstrasse 23”).

All animals have a location, an age, an image, a name, a description, a type(small/large) and hobbies.

Senior animals are older than 8 years old.


For the regular points of this CodeReview, you need to create a structure using PHP and MySQL that will display the relevant data of the small, large and senior animals. Your Github repository should be called LMSCF-yourfirstname-yourlastName-CR11

Basic points
- Create a database (cr11_yourname_petadoption) and add sufficient test data (at least 4 small animals, 4 large animals and 4 seniors) 

- Retrieve the information from the database.

- Display all animals on the home page.

- Display all small and big animals on a single web page (general.php).      

- Display all senior animals on a single web page (senior.php).

- Create a registration and login system.

- Create separate sessions for normal users and administrators. 

- Create an admin panel. Only the admin is able to create, update and delete data (small animals, large animals, seniors etc.) within the admin panel. The normal user will be able to see everything that was created for this website, without having administrative privileges in changing the data. 

Bonus points
- Try to add super admin access, that can see a list of users and he can delete them.

- Create a live search field that when you already type one letter in this field, it will search your database for any results (using Ajax)
