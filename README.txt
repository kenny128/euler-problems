README 

included:
All required files (.php, .css, .js)
this README file
copy of the database (problem.sql)

Front End:
Since the focus of the site isn’t going to showcase my HTML skills and Bootstrap seems to be everywhere, I thought Bootstrap is an acceptable technology to use for the design of the page.

Database results:
Valid database results will be stored in the database, given that the Integer values are within the range set. Values can be found on the "Database Results" tab.

Problem 3:
Since all numbers can be expressed in the factors of prime number, the way this is implemented is by starting from the lowest prime and dividing by the number by the current prime till it is undivisible before proceeding the to next prime. When the number is equal to the current prime the biggest prime factor is found.

E.g. 25344 = 2*2*2*2*2*2*2*2*3*3*11 hence the biggest prime factor is 11

Problem 5:
The lowest common divisor for a series of 3 numbers can be written as lcm(a, lcm(b, c)) hence this problem can be easily solved by finding the lowest common divisor for every number within the range.


Problem 1:
This is solved by finding the sum of every multiples of 3 and 5 from 0-n where n is the input number. This however also includes a set of duplicates for the multiples of 15 (3*5) and hence one set of multiples of 15 is removed from the total sum of multiples of 3 and 5.

Notes
- This implementation is done in PHP where depending on the version it determines the maximum value of an integer.

Assumptions

- In the case of an error, data shouldnt be stored into the database
- Solver only caters for positive and valid whole integers
- only integer characters are allowed as input
- 
- Database authetication and details on the server are:
	- server name: "localhost"
	- user: "root"
	- password: "" (empty)
	- dbname: "problem"
	- table name: "track"
	- database uses a combined key of problem_id, test_number and test_answer
	- problem_id uses int(11)
	- test_number uses bigint(50)
	- test_answer uses bigint(50)
	- total_runs uses int(11)