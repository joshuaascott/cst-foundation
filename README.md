# Choisys Technology

## Pre-Requisites

- Docker Desktop
- Git and Gitbash

## Configuration Setup (Production with cPanel)

- Create a subdomain under your primary domain (`Subdomains`) with the values
    - Subdomain
    - Select the root domain
    - Document Root will auto-populate with the `<subdomain>.<domain>`
- Create an empty database from cPanel (`MySQL Database` > `Create Database`)
    - Database Name
    - Database User
    - Database Password
- Open the database from cPanel (`phpMyAdmin` > Select DB > `SQL`)
- Copy the /db/database.sql into the `SQL` tab
- Update the following two lines with the correct values:
    - Line 5:   `-- Host: localhost:3306`
    - Line 21:  ```-- Database: `<database-name>` ```
- *The easiest way to copy the folders is to zip them, upload the file and then click `Extract`*
- Copy the three folders from the `/src` directory to the document home using `File Manager`
- Comment out lines 3 - 6 in the file `src/private/db_connection.php`
- Uncomment lines 9 - 12 in the file `src/private/db_connection.php`
- Update the values in lines 10 -12 in the file `src/private/db_connection.php`
- Change the document root by going to `Subdomains` and edit the `Document Root` with the value:
    - `/<subdomain>.<domain>/html`
- *NOTE: This will take a few minutes to take effect*
- In cPanel, click on `Directory Privacy` to protect the `<site-home>/admin` directory
- Drill down until you find the `admin` directory and click `Edit`
- Create a user login and password for the directory and document for later use
- Associate the `admin` user with the `/admin` directory
- Update the file `admin/.htaccess` as follows
    - Uncomment lines 1 - 4
    - Update the path to the UserAuthFile on line 3:
        - Example: `AuthUserFile "/home/joshuascott/.htpasswds/cst.joshux.website/html/admin/passwd"`
- Create a new email to recieve message from comments and applications
- From cPanel, go to `Email Accounts` > `Create` and do the following:
    - Select the `Domain` (Subdomain) from the drop down
    - Enter a `Username` (such as `careers`)
    - `Set password now` and enter a password
    - Document for later use and then click `Create`
- Open the following file and set value for the newly created email address:
    - Line 55: `src/html/careers/job-apply.php`
        - `$toaddress = "<new-email>";`

## Configuration Setup (Development)

- Copy the contents of `.env.sample` into a new file called `src/html/.env`
- The default values will work as is with the docker environment
- *NOTE: The only no functional feature in the local environment is the mail function*

## Run (Locally)

- Execute the following to start and run locally

    ```bash
    docker-compose up
    ```
- Open a browser and navigate to `http://localhost`
- Execute the following from Git Bash to stop and remove containers

    ```bash
    # Ctrl + C
    ./stop.sh
    ```

## Update Job Postings

*Production Environment*

- Navigate to the following location and enter the `admin` user and password:
    - `https://<site-domain>/admin`

*Development Environment*

- Navigate to the following location (*login not required*)
    - `http://localhost/admin`

## Database Login

*Production Environment*

- Go to the cPanel > `phpMyAdmin` > click on database name

*Development Environment*

- Navigate to the following location:
    - `http://localhost:8001`
- Enter the following username and password (*if not changed in the /src/html/.env*)
    - Username: `cst`
    - Password: `password`
