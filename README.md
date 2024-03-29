# Student_Management_System
One can perform all CRUD operations in the front end and the data will be saved in php Myadmin database.
This code is a PHP script that manages a database of student laptops. It allows users to perform various actions through forms:
Add new student: When a user submits the "Insert" form, the script retrieves student information like name, registration number, and contact details. It then inserts this data into a "laptop" table in a MySQL database.
Search student: If the user submits the "Search" form with a registration number, the script searches the database for a matching record. If found, it displays the student's details like name, branch, and contact information.
Delete student: The "Delete" form allows users to remove a student record by entering the registration number. The script finds the record and deletes it from the database.
Update student: With the "Update" form, users can modify existing student information. They provide the registration number and updated details like name, branch, and contact details. The script then updates the corresponding record in the database.
The code ensures a secure connection to the database and provides informative messages about the success or failure of each operation.
