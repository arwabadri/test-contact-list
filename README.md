# Contact List Management Application
This application allows users to manage a list of contacts. It supports basic CRUD operations and includes a search feature to filter contacts by various fields.

## Features

**Add Contacts:** Enter contact details such as name, age, country, email, and phone number.

**View Contacts:** Display all contacts in a table format with sorting options.

**Edit Contacts:** Modify existing contact details.

**Delete Contacts:** Remove contacts from the list.

**Search:** Filter contacts in real-time based on any field (name, email, etc.).


## Technologies Used

**Frontend:** HTML, CSS, JavaScript

**Backend:** PHP (MySQLi)

**Database:** MySQL

**Server:** EasyPHP (or another local server like XAMPP)


## Setup Instructions

**Database Setup:**

1. Create a database named contacts_db.
2. Refer to the DATABASE.md file for the table structure and SQL commands.

**Configure Database Connection:**

Open connexion.php and update the database credentials.

**Run the Application:**

1. Place the files in your server's web directory.
2. Access the application through http://localhost/project-directory.


## File Overview

**connexion.php**: Manages the connection to the MySQL database.

**home.php**: Main file displaying the contact list and handling search functionality.

**insert_contact.php**: Handles the logic for adding new contacts to the database.

**modify_contact.php**: Handles contact updates.

**delete_contact.php**: Manages contact deletions.

**DATABASE.md**: Contains detailed information about the database structure.

**styles.css**: Basic styling for the user interface.


## Usage

**Adding Contacts**: Use the insert-contact.php form to submit new contact information.

**Editing Contacts**: Click "Modifier Contact" to update details.

**Deleting Contacts**: Click "Supprimer Contact" to remove a contact.

**Searching Contacts**: Use the search bar to filter contacts.


## Security Notes

**SQL Injection**: Use prepared statements in future versions to secure against SQL injection.

**Data Validation**: Ensure proper validation both on the client and server side.


## License

This project is under the MIT License.
