# Aplikasi Kelola Barang Berbasis Website

![20240104_170022](https://github.com/sukalaper/toko-sabun-berbasis-website/assets/65320033/9dc2b09b-4fd1-4a88-8c1f-c671b9fb8ec1)

Selamat datang di dokumentasi dan proyek sumber terbuka ini!

Aplikasi ini dirancang untuk membantu para pengusaha setingkat [UMKM](https://www.gramedia.com/literasi/umkm/) dalam mengelola stok barang dengan lebih efisien. 
Aplikasi ini menyediakan solusi sederhana namun efektif untuk pemantauan inventaris dan untuk mengelola bisnis.

## Fitur Tersedia
* **Halaman Administrator**: 
  * Buat pengguna agar data Anda lebih aman.

* **Pantau Stok**:
  * Lacak stok, keluar dan masuk barang dengan mudah.

* **Penambahan, Penghapusan Dan Pengeluaran Barang**: 
  * Kelola inventaris dengan menambahkan atau menghapus barang.
  * Diskon.

* **Laporan Stok**: 
  * Lihat laporan stok yang dapat di *export* dalam bentuk `.pdf` maupun `.xlsx` untuk pemantauan yang lebih baik.

* **Notifikasi Stok**: 
  * Setiap halaman dilengkapi dengan panduan untuk mengoperasikan tiap-tiap halaman.
  * Jika stok kurang dari (<) 5 maka muncul notifikasi bahwa stok barang tersebut menipis.
  * Harga jual barang tidak boleh kurang dari (<) harga modal.


## Ingin Menggunakan? 
### Prasyarat

Pastikan Anda memiliki lingkungan pengembangan yang sudah diatur sebelumnya.

### Instalasi
1. Lakukan *clone* repositori ini: 
   
   `git clone https://github.com/sukalaper/toko-sabun-berbasis-website.git`

2. Salin proyek hasil *clone*: 

   `$ sudo cp -r toko-sabun-berbasis-website/ /opt/lampp/htdocs/`

3. Buka perambaan dan arahkan ke `localhost/phpmyadmin`.

4. Buat database baru dengan nama `toko-sabun` kemudian *import* database yang ada pada `toko-sabun-berbasis-website/database/toko-sabun.sql` ke `toko-sabun`. 

5. Ganti alamat peramban menjadi `localhost/toko-sabun`. 

6. Nama pengguna dan kata sandi untuk masuk adalah: 

   `Username/email: sukalaper@space.com`<br><br>
   `Password: 123456`

## Lisensi
Proyek ini dilisensikan di bawah MIT.

## Kontribusi
Saya menyambut kontribusi sekecil apapun dari komunitas.

## Terimakasih Kepada
1. [Mazer](https://zuramai.github.io/mazer/), untuk template yang luar biasa. 
2. [Richard's Lab](https://youtube.com/@RichardsLab?feature=shared), untuk logika *backend* yang telah saya implementasi ke proyek ini. 

## Belikan Saya Kopi? 
Alhamdulillah, saya sudah cukup minum kopi. Bagaimana jika bantuan atau setidaknya support atas proyek ini saya alihkan ke saudara kita yang membutuhkan disana? Berapapun nominalnya akan sangat berarti. [Kunjungi tautan ini untuk menuju pahala Anda](https://kitabisa.com/campaign/kemanusiaanuntukpalestinabangkit/story).
