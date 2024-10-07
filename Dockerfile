# Menggunakan image PHP resmi
FROM php:8.0-apache

# Instal ekstensi mysqli
RUN docker-php-ext-install mysqli

# Menyalin file aplikasi ke dalam container
WORKDIR /var/www/html
COPY . .

# Mengatur ServerName untuk menghindari pesan peringatan
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port yang digunakan
EXPOSE 80

# Command untuk menjalankan server Apache
CMD ["apache2-foreground"]
