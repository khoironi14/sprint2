Cara Installasi Website
1. Lakukan git clone
2. buat database dengan nama bebas
3. Rename .env.example menjadi .env lalu lakukan konfigurasi dengan mengubah nama db_databse sesuai yang dibuat dan pastikan db_username dan db_password sesuai
4. Lakukan php artisan migrate untuk membuild table ke dalam database
5. jalankan projectnya dengan perintah php artisan serve
6. jalankan php artisan command:registrasi untuk mendaftarkan email dan password ke tabel user
7. lakukan login menggunakan postman method post url http://localhost:port/api/login, dengan memasukkan key email dan password pada tab body yang valuenya email=admin@admin.com password 12345678
8. jika login berhasil silahkan copy token agar token bisa digunakan untuk akses api data provinsi dan kota
9. untuk mengakses api data provinsi masukkan url http://localhost:port/api/search/provinces?id&=1 dengan method get dan masuk ke tab Authorization dan pilih type bearer token dan masukkan token disebelahnya, yang didapatkan pada waktu login
10. untuk mengakses api data kota masukkan url http://localhost:port/api/search/cities?id&=1 dengan method get dan masuk ke tab Authorization dan pilih type bearer token dan masukkan token disebelahnya, yang didapatkan pada waktu login
