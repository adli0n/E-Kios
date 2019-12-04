<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = "welcome";

//new
$route['index'] = "member/member";
$route['dashboard'] = "member/dashboard";
$route['entry-penjualan'] = "member/menu";
$route['produk'] = "admin/menu";

$route['cetak-invoice'] = "member/menu/cetak_invoice";
$route['view_invoice'] = "member/menu/view_invoice";

$route['view-diskon'] = "admin/diskon";
$route['add-diskon'] = "admin/diskon/simpan";
$route['dell-diskon'] = "admin/diskon/hapus";
$route['upd-diskon'] = "admin/diskon/update";
$route['exp-diskon'] = "admin/diskon/exp";
$route['exp-auto'] = "admin/diskon/exp_auto";

//proses
$route['pengguna'] = "admin/pengguna";
$route['dell-plg'] = "admin/pengguna/hapus";
$route['saving'] = "admin/pengguna/simpan_pelanggan";
$route['upd-plg'] = "admin/pengguna/update";
$route['upd-plg-2'] = "member/member/update_no";
$route['re-pengguna'] = "admin/pengguna/reset_password";

$route['dell-produk'] = "admin/menu/hapus_menu";
$route['add-produk'] = "admin/menu/simpan";
$route['upd-produk'] = "admin/menu/update";

$route['add-kategori'] = "admin/kategori/simpan_kategori";
$route['dell-kategori'] = "admin/kategori/hapus_kategori";

$route['add-menu-diskon'] = "admin/menu/update_menu_diskon";
$route['add-menu-qty'] = "admin/menu/update_menu_qty";

//kategori menu
$route['beranda'] = "member/menu";
$route['hot-promo'] = "member/menu/hot_promo";
$route['makanan'] = "member/menu/makanan";
$route['minuman'] = "member/menu/minuman";
$route['diskon'] = "member/menu/diskon";

$route['add/(:any)'] = "member/menu/add_to_cart/$1";
$route['keranjang-belanja'] = "member/menu/cart";
$route['checkout'] = "member/menu/check_out";
$route['hapus-pesanan/(:any)'] = "member/menu/remove/$1";
$route['hapus-pesanan-2/(:any)'] = "member/menu/remove_link2/$1";
$route['update-pesanan'] = "member/menu/update";


$route['profile'] = "member/member/profile";
$route['login'] = "member/member";
$route['logout'] = "member/member/logout";
$route['auth'] = "member/member/auth_multi_2";

$route['history'] = "admin/history";
$route['detail'] = "admin/history/detail";
$route['konfirmasi'] = "member/konfirmasi";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
