# Database Structure and Relationships
This document provides a detailed overview of the database setup used for managing contacts in this project.

## Database: contact
**Table: contacts**
The contacts table holds the necessary information for each contact. At present, this table functions independently without any linked tables.

**Columns**:
id (INT, AUTO_INCREMENT, PRIMARY KEY): Unique identifier for each entry.
prenom (VARCHAR(50)): Contact's first name.
nom (VARCHAR(50)): Contact's last name.
age (INT): Age of the contact.
pays (VARCHAR(50)): Country where the contact resides.
email (VARCHAR(100)): Contact's email address.
telephone (VARCHAR(15)): Contact's phone number.

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50),
    nom VARCHAR(50),
    age INT,
    pays VARCHAR(50),
    email VARCHAR(100),
    telephone VARCHAR(15)
);

**Relationships**
At this stage, the contacts table stands alone. No foreign key relationships are established. The current design can be expanded in the future to accommodate more complex connections if required, such as linking contacts with organizations or categories.
