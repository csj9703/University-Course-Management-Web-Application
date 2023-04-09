# CPSC471-Project
Project for the Database Management System course.

# Setup the Project (For Development)

1. [Download XAMPP for your OS](https://www.apachefriends.org/), this will install PHP and MySQL onto your system.
2. Set your **ENVIRONMENT VARIABLE** for PHP.
3. Open the XAMPP control panel, and start the **Apache** service.
4. Go to your XAMPP installation path, and find the folder called "htdocs".
5. Clone the project repository into "htdocs".
6. Now go to "http://localhost/CPSC471-Project/index.php", and test the website out.
    - Student credentials:
        - **E-mail**: john.doe@ucalgary.ca
        - **Password**: password
        - **E-mail**: alice.smith@ucalgary.ca
        - **Password**: alice123
    - Admin credentials
        - **E-mail**: bob.admin@ucalgary.ca
        - **Password**: adminpass
       
# Connecting To The AWS Database (For Development)
1. Download [MySQL Workbench](https://www.mysql.com/products/workbench/) or your choice of MySQL Tool.
2. Connect using the endpoint at the Hostname field: cpsc471-project-db.c3dvoz4qikix.us-west-1.rds.amazonaws.com
    - **Username:** admin
    - **Password:** cpsc471gp48

# Running the Project (For Grading the Project)

1. Unzip the project to a directory.
2. Go to the project directory. (../CPSC471-Project/)
3. Open any terminal at the project directory.
4. Run the command `php -S localhost:8000`.
5. Go to `localhost:8000` to see the web application.
    - Student credentials:
        - **E-mail**: john.doe@ucalgary.ca
        - **Password**: password
        - **E-mail**: alice.smith@ucalgary.ca
        - **Password**: alice123
     - Admin credentials
        - **E-mail**: bob.admin@ucalgary.ca
        - **Password**: adminpass
