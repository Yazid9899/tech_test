# Patient API Documentation

This API allows you to perform CRUD (Create, Read, Update, Delete) operations on patient records.

## Getting Started
To get started with this patient API, follow these steps:

1. Database Setup: Run the MySQL query to generate the database table and insert the dummy data. Make sure to set up the database connection in the config/config file.

2. Start the Dummy Server: To start the dummy server, navigate to the terminal directory and execute the following command:
```bash
$(which php) -S localhost:8000 -t ./ .htrouter.php
```
## Endpoints

### 1. List Patients

- **URL**: `/patients`
- **Method**: `GET`
- **Description**: Get a list of all patients.
- **Response**:
  - `200 OK`: Successfully retrieved the list of patients.
  - `404 Not Found`: No patients found.

### 2. Get Patient by ID

- **URL**: `/patients/{id}`
- **Method**: `GET`
- **Description**: Get patient details by ID.
- **Response**:
  - `200 OK`: Successfully retrieved patient details.
  - `404 Not Found`: Patient not found.

### 3. Create Patient

- **URL**: `/patients`
- **Method**: `POST`
- **Description**: Create a new patient record.
- **Request Body** (Raw JSON):
  ```json
  {
    "name": "John Doe",
    "sex": "Male",
    "religion": "Christian",
    "phone": "081234567890",
    "address": "123 Main St",
    "nik": "1234567890123456"
  }


### 4. Update Patient by ID

- **URL**: `/patients/{id}`
- **Method**: `PUT`
- **Description**: Update an existing patient record by ID.
- **Request Body** (Raw JSON):
  ```json
  {
    "name": "Updated Name",
    "sex": "Female",
    "religion": "Muslim",
    "phone": "082345678901",
    "address": "456 Elm St",
    "nik": "7890123456123456"
  }
  ```
- **Response**:
  - `200 OK`: Patient updated successfully.
  - `404 Not Found`: Patient not found.
  - `500 Internal Server Error`: Failed to update patient.

### 5. Delete Patient by ID

- **URL**: `/patients/{id}`
- **Method**: `DELETE`
- **Description**: Delete a patient record by ID.
- **Response**:
  - `200 OK`: Patient deleted successfully.
  - `404 Not Found`: Patient not found.
  - `500 Internal Server Error`: Failed to delete patient.
```