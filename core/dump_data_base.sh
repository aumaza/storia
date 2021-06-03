#!/usr/local/bin/bash

fecha=`date +%d-%m-%Y`
archivo="storia-$fecha.sql"
mysqldump --user=storia --password=storia storia > $archivo
mv $archivo sqls/backup/
echo -e "Database Backing Up Successfully \n File storage Successfully"

