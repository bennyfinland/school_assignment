<?php
	echo "WEEK 7";
	echo "<br>";
    echo "analysis the requirement and thing about the user interface,web structure";
	echo "<br>";
	echo "<br>";
	
	echo "WEEK 8";
	echo "<br>";
    echo "simple design the index.php(background colour, header, footer, etc)";
	echo "<br>";
	echo "<br>";
	
	echo "WEEK 9";
	echo "<br>";
    echo "desgin index page, navigation bar, image slider which is from the website (http://dev7studios.com/), and download few movie poster from google image";
	echo "<br>";
	echo "the css and jquery plug does not work on IE, but firefox and Google Chrome are fine";
	echo "<br>";
	echo "<br>";
	
	echo "WEEK 10";
	echo "<br>";
 	echo "1. design the about.php (show contact information like email, phone number )";
	echo "<br>";
	echo "2. design the login.php and register.php which is from http://tympanus.net/codrops/2012/03/27/login-and-registration-form-with-html5-and-css3/";
	echo "<br>";
	echo "login.php: use jquery to check the input that	value cannot be null";
	echo "<br>";
	echo "register.php: use jquery to check the input that vlaue cannot be null and check the email format";
	echo "<br>";
	echo "3. design the search engin";
	echo "<br>";
	echo "<br>";
	
	echo "WEEK 11";
	echo "<br>";
 	echo "1. design the index.php (show movie title, movie star and show Highest rated movies)";
	echo "<br>";
	echo "2. design the review.php (show all the comments for this movie)";
	echo "<br>";
	echo "3. design the search function and search.php (show the search results)";
	echo "<br>";
	echo "<br>";
	
	echo "WEEK 12";
	echo "<br>";
 	echo "1.if user login fail, system will record the username and time to db (errormessage)";
	echo "<br>";
	echo "2.check admin login, if username = admin and password = secret, jump to admin.php ";
	echo "<br>";
	echo "3.use a jquery plugin to show a errormessage table (flexigrid) which downloaded from http://flexigrid.info/";	
	echo "<br>";
	echo "<br>";
	
	echo "WEEK 13";
	echo "<br>";
    echo "fixed some bugs and improve html,css,php code, make the code clear";
	echo "review.php: submit button style from http://graemeboy.com/css-buttons/";
	echo "add logout function";
	echo "<br>";
	echo "<br>";
	
	echo "Persona";
	echo "<br>";
	echo "1.	Kate: she is a business woman in a big IT company. She likes movies. She is busy at work those days in order to finish the work on time. When she is away from work, she would like go to the cinema in the holiday. ";
	echo "<br>";
	echo "2.	Dan: he is high school student around 16 years old. He like surfing on the Internet in the free time. He always watches movies with his parents on the weekend. But sometime they do not which movie is good to watch.";
	echo "<br>";
	echo "<br>";
		
	echo "Problem scenario";
	echo "<br>";
	echo "1.	Kate: Due to the busy work, she misses lot of movies which she likes (e.g. Iron Ma 3, Giulio Cesare ). So she buys movie newspaper and asks friends for some feedbacks about the movies. But only can get little information and spend too much time on it which troubles her a lot.";
	echo "<br>";
	echo "2.	Dan: He is going to watching a movie with his parents on a Friday evening. But they do not know which movie is good to watch. So they want to find a way to get some feedback about the movies before they watch.";
	echo "<br>";
	echo "<br>";
	
	echo "Activity scenario";
	echo "<br>";
	echo "1.	Kate: She is very familiar with IT and using it in her work. She use google to search movie review website and she found out she use the search engine to get all the movies which she like. And also the feedbacks.";
	echo "<br>";
	echo "2.	Dan: His told him to use movie review website. From the website, you can get top 5 highest rated movies and all the related information about movies.";
	echo "<br>";
	echo "<br>";
	
	echo "Claim analysis";
	echo "<br>";
	echo"1.	Show top 5 Highest rated movies in the index page";
	echo "<br>";
	echo "Pros:  easy to find most popular movies on the index page";
	echo "<br>";
	echo "Cons:  only 5 movies....";
	echo "<br>";
	echo "2.	Search box";
	echo "<br>";
	echo "Pros:  provide a easy way for user to get the movie";
	echo "<br>";
	echo "Cons:  simple search engine, no search suggest, no advance search function";
	echo "<br>";
	echo "<br>";
	
	echo "Conceptual design";
	echo "<br>";
	echo "1.	Kate: want use the website to search the movie which she missed.";
	echo "<br>";
	echo "Expect from the website: system provide the search engine to search movies.";
	echo "<br>";
	echo "2.	Dan: want user the website to get some feedbacks about the movie and want to know the most popular movies.";
	echo "<br>";
	echo "Expect from the website: system show top 5 most popular and feedbacks about the movie.";
	echo "<br>";
	echo "<br>";
	
	echo "Functional design";
	echo "<br>";
	echo "System provides user login/logout/register, read review, post review. System admin can see all the details of the registered members and all the reviews and all system errors.";
	echo "<br>";
	echo "<br>";
	
	echo "PHYSICAL PRESENTATION ";
	echo "<br>";
	echo "For this website, I choose the black color as the background color and white color for the text. I am pretty sure that user can see the text very clear. There is a navigation bar (login/logout, register, and home page) and search box on the top of the page. The key content and elements are to see because I divided them in different div and used different background color. I also add some description for each input. For example, the input for the search box input, I set the input value to search movies. That user can easily find out this input is use to search movies.";
	echo "<br>";
	echo "<br>";
	
	echo "CONTENT";
	echo "<br>";
	echo "For index page I have a list of movies that include movie title, average user rating, how many feedbacks for this movie. But there is no movie's image, because I cannot find a way to store image information into database. And also show the top 5 most popular movies on the right side of page. For login and register page, I try to make those pages simple and easy to use. All they need to do is to fill the form and click the submit button. For example, for login form after user submit the form System check format for each input, check username availability from database and quick replies to user in the event of any errors. If everything is correct, will jump to Index page automatic and show the username on the top of page.";
	echo "<br>";
	echo "<br>";
	
	echo "INFORMATION ARCHITECTURE";
	echo "<br>";
	echo "I am believe the information structure is good. User can easily get the information which want from the website. The navigation bar and search box can help them to reach the wanted information quickly. For example, users only need to type the movie name on the search box, and then system will show a list of all the things about this movie.";
	echo "<br>";
	echo "<br>";
	
	echo "INTERACTIVITY";
	echo "<br>";
	echo "For example, above the review page, I have used clear labels to show the movie review, include the name of the reviewer, a title, a star rating (0 to 5 stars) and time. Only logined member can see the command form and post new review. If someone want post a review and forgot the title or rate or command, system replies to user in the event of any errors and ask them try again. Error messages are display on a pop-up window. This is done by using JavaScript. If everything is correct, system insert the data into database and refresh this page, then the user can see his review.";
	echo "<br>";
	echo "<br>";
	
	echo "Standard conformance";
	echo "<br>";
	echo "I have already tested all the html and css code on the website (http://validator.w3.org/).";
	echo "<br>";
	echo "<br>";
	
	echo "Accessibility ";
	echo "<br>";
	echo "I used wave http://wave.webaim.org/ to test accessibility. For accessibility test: cannot use a images without 'alt' attribute. When using span the content cannot be empty. When using a text alternative it must be meaningful. The 'title' attribute should be missing or empty when ignoring non-text content. Always need to remember to close tags. If you want to post some data with a link, you have to use &amp (xxx.php?xx=xx&amp;cc=cc). The matching <label> tag must before/after the control.";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	
	
	
	
	
	
	
	
?>