FROM php:8.0-apache

# 制作者信息
LABEL auther_template="CTF-Archives"

# Apache 初始化
RUN a2enmod rewrite

# 安装必要的软件包
RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list && \
    # apk add --update --no-cache tar apache mysql mysql-client bash
    apt update && \
    apt install -y default-mysql-client default-mysql-server openssh-server

# 配置mysql
RUN docker-php-source extract && \
    docker-php-ext-install pdo_mysql mysqli && \
    docker-php-source delete && \
    mysql_install_db --user=mysql --datadir=/var/lib/mysql && \
    sh -c 'mysqld_safe &' && \
    sleep 5s && \
    mysqladmin -uroot password 'root'

# 复制mysql配置文件
COPY ./config/docker-php-ext-mysqli.ini /usr/local/etc/php/conf.d
COPY ./config/docker-php-ext-pdo_mysql.ini /usr/local/etc/php/conf.d

# 复制web项目源码
COPY src /var/www/html

# 重新设置源码路径的用户所有权
RUN chown -R www-data:www-data /var/www/html

# 复制数据库配置文件
COPY ./data/db.sql /var/db.sql

# 拷贝容器入口点脚本
COPY ./service/docker-entrypoint.sh /docker-entrypoint.sh
COPY ./service/check.sh /check.sh
RUN chmod +x /docker-entrypoint.sh
RUN chmod +x /check.sh

# 配置数据库数据
RUN sh -c 'mysqld_safe &' \
    && sleep 5s \
    && mysqladmin -uroot password '123456' \
    && mysql -e "source /var/db.sql;" -uroot -p123456 \
    && mysql -e "CREATE USER 'ctf'@'%' IDENTIFIED BY 'ctf123';" -uroot -p123456 \
    && mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'ctf'@'%' WITH GRANT OPTION;" -uroot -p123456

# 设置shell的工作目录
WORKDIR /var/www/html

# [可选]指定对外暴露端口，对于GZCTF等平台，强制EXPOSE可能会造成非预期端口泄露，请酌情启用
EXPOSE 80
EXPOSE 22

# 安装SSH服务并配置
RUN mkdir /var/run/sshd
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd
RUN echo "export VISIBLE=now" >> /etc/profile
RUN useradd -m -s /bin/bash ctf
RUN echo 'ctf:ctf123' | chpasswd

# 设置nginx日志保存目录
VOLUME ["/var/log/nginx"]

# 设置容器入口点
ENTRYPOINT [ "/docker-entrypoint.sh" ]
