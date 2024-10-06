# Menggunakan image PHP resmi
FROM php:8.0-apache

# Menyalin file aplikasi ke dalam container
WORKDIR /var/www/html
COPY . .

# Expose port yang digunakan
EXPOSE 80

# Command untuk menjalankan server Apache
CMD ["apache2-foreground"]
