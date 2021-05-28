#!/bin/bash
/#!/usr/local/bin/bash

fecha=`date +%d-%m-%Y`
archivo="backup_nodata_storia-$fecha.sql"
mysqldump --user=root --password=slack142 --no-data storia > $archivo
mv $archivo core/sqls/
echo -e "Database Backing Up Successfully \n File storage Successfully"

