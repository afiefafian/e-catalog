<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/laravel-l-slant.png" width="48">
  <img src="https://vuejs.org/images/logo.png" width="40">
</p>
<h3 align="center">Aplikasi E-Catalog</h3>


## Status
On Development (ada bug)
#### On Progress
- [x] Fix dropdown kota/kab ketika edit data
- [x] Fix Landing page css produk item
- [ ] Tambah detail produk landing page
- [ ] Tambah detail supplier landing page
- [ ] Animasi loading produk

## Demo
link : [catalog](https://e-catalog.afiefafian.com/) | [web admin](https://e-catalog.afiefafian.com/admin)  
username : 'admin@admin.com'  
password : secret

## Tentang
Aplikasi web admin dan landing page untuk menampilkan data produk.  
Sudah dilengkapi dengan data dummy sehingga dapat langsung di test

## Minimum Requirement
- PHP 7.1 keatas
- MySQL / MariaDB
- NPM

## Cara Install
1. Clone `git clone https://github.com/afiefafian/e-catalog.git`
2. `cd e-catalog`
3. `composer install`
4. `npm install`
4. `cp .env.example .env`
5. `php artisan key:generate`
6. `chmod -R 755 storage bootstrap/cache`
7. Create database di lokal
8. Konfigurasi database  di file `.env` 
9. `php artisan migrate:fresh --seed`
10. `php artisan serve`
11. Selesai.

## Assets
- icon  
  - [Icon Webadmin](https://www.flaticon.com/free-icon/catalogue_1466313#term=catalog)
  - [Icon User](https://www.flaticon.com/free-icon/user_149071)
- svg pattern  
  - [heropatterns](https://www.heropatterns.com/)

## Contributing
Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## License
The Laravel framework is open-sourced software licensed under the [MIT license](LICENSE).
