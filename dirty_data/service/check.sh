#!/bin/bash

MYSQL_USER="ctf"
MYSQL_PASSWORD="ctf123"

while true; do
    EXISTS=$(mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" -e "SELECT EXISTS(SELECT 1 FROM ctf.news WHERE id = 4 LIMIT 1);" -N)

    if [ "$EXISTS" == "1" ]; then
        sleep 30
    else
        chmod +r /flag
        exit 0
    fi
done
