Trip_Sort
=========

Description:

An unordered stack of boarding passes are given, and this application sorts them out. Main logic lies in the fact that journey starts on each following boarding pass at the same location where it ended in each preceding boarding pass. 

Tools Used:

Linux Os, 
Eclipse IDE,
PHPUnit, 
Php-doc, 
OOD, 
Quick Sort. 

Why I used PHPUnit? 

PHPUnit is the standard; most frameworks use it (like Zend Framework (1&2), Cake, Agavi, even Symfony is dropping their own Framework in Symfony 2 for phpunit). PHPUnit is integrated in every PHP IDE I know like Eclipse, Netbeans, Zend Studio, PHPStorm and works nicely. 
PHPUnit works fine with every continuous integration server since it outputs all standard log files for code coverage and test reports. While this is not a big problem to start with once you stop "just testing" and start developing software (Yes that statement is provocative :) Don't take it too seriously). PHPUnit is actively maintained, stable and works great for every codebase, every scenario and every way you want to write your tests.

Which sorting method I preferred?

usort is a PHP predefined function and will sort an array by its values using a user-supplied comparison function. If the array to be sorted needs to be sorted by some non-trivial criteria, this function should be used. usort uses Quicksort. It is known, that Quicksort has expected complexity of O(N log N), and Quicksort is used more than Mergesort (worst case O(N log N)) because constants are smaller and it requires no extra memory and is easy to avoid Quicksort running on the worst case. 

First I thought to use usort and grab the advantages it has, but then I wrote my own custom function that gave me more control over the code and complexity. Also using usort might involve added complexity due to callback functions and internal hidden functionality.  

Application:

Generally application is written with easily readeable variable names and less comments. I am inspired by Code Complete by Steve McConnell, and it 
helps me a lot to humanize the code, making less effort. It has made documentation suffer a little that was created by php-doc though. 

How to Run?

There is an implementation file in the root, that can be run straight away to check the working of application. 

Structure:

Has three major parts, 
1) Docs, contains all documentation.
2) src, contains all application files.
3) tests, contains all test files. 

In src folder there is a autoload.php script, that helps automatically loading dependency files. 

Inside src folder there is api folder that contains SortedJourneyNs namespace. The ability to refer to an external fully qualified name with an alias, or importing, is an important feature of namespaces. 

In SortedJourneyNs namespace are code files that makes the application. 

How to Test?

PHPUnit should be installed before running any tests.
There is a test folder, in which there are different files that contain tests. Each file has the same name as the file to be tested added by a 
trailing 'Test' string.  

1) To run all tests at once, 
	phpunit --bootstrap src/autoload.php tests
2) To run specfic test files, 
	phpunit --bootstrap src/autoload.php tests/<file-name>
	e.g; to run tests in SortJourneyTest 
	phpunit --bootstrap src/autoload.php tests/SortJourneyTest

