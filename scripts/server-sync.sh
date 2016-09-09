#!/bin/bash

ssh root@mporn.rbran.com -p 222 'cd /var/www && git pull && mysql -u root -p < etc/bd.sql'