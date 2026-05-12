# Alterbase

alterbase is a web-based project leveraging Docker for deployment.
This repository contains all the necessary files to set up, configure, and run the alterbase application.

## Quick Start

Clone the repository and follow these steps to install and run alterbase using Docker:

```sh
# SSH into your server (if remote)
ssh office-nas

# Change to the source directory (update <source_directory> as needed)
cd <source_directory>

# Start the application with Docker Compose
sudo docker compose up -d

# Enter the running container (named "alterbase")
sudo docker exec -it alterbase bash

# Set correct permissions (required for the application to write to these directories)
chown www-data:www-data /var/www/html/htdocs/alterbase/view/stylesheet
chmod 775 /var/www/html/htdocs/alterbase/view/stylesheet

chown www-data:www-data /var/www/html/htdocs/alterbase/system/storage
chmod 775 /var/www/html/htdocs/alterbase/system/storage

exit
```
