# Usar la imagen oficial de MariaDB
FROM mariadb:latest

# Configurar las variables de entorno para el usuario root
ENV MARIADB_ROOT_PASSWORD=m1_s3cr3t

# Exponer el puerto 3306
EXPOSE 3306
