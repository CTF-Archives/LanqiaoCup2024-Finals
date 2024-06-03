#!/bin/bash

rm -f /docker-entrypoint.sh

mysqld_safe &

mysql_ready() {
	mysqladmin ping --socket=/run/mysqld/mysqld.sock --user=root --password=root > /dev/null 2>&1
}

while !(mysql_ready)
do
	echo "waiting for mysql ..."
	sleep 3
done

# Check the environment variables for the flag and assign to INSERT_FLAG
if [ "$DASFLAG" ]; then
    INSERT_FLAG="$DASFLAG"
elif [ "$FLAG" ]; then
    INSERT_FLAG="$FLAG"
elif [ "$GZCTF_FLAG" ]; then
    INSERT_FLAG="$GZCTF_FLAG"
else
    INSERT_FLAG="flag{TEST_Dynamic_FLAG}"
fi

echo "Run:insert into flag values('flag','$INSERT_FLAG');"

# 将FLAG写入文件 请根据需要修改
echo $INSERT_FLAG > /flag
chmod 600 /flag

source /etc/apache2/envvars

echo "Running..." &

tail -F /var/log/apache2/* &

/check.sh &

echo "Checking..." &

/usr/sbin/sshd -D &

echo "SSH..." &

exec apache2 -D FOREGROUND