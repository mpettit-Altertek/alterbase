# alterbase

#install script
```
ssh office-nas
...

cd <source_directory>

sudo docker compose up -d
sudo docker exec -it alterbase bash

chown www-data:www-data /var/www/html/htdocs/alterbase/view/stylesheet
chmod 775 /var/www/html/htdocs/alterbase/view/stylesheet
chown www-data:www-data /var/www/html/htdocs/alterbase/system/storage
chmod 775 /var/www/html/htdocs/alterbase/system/storage
exit
```