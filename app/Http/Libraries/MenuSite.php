<?php
namespace App\Http\Libraries;
/**
 *
 */
class MenuSite
{
  static function classActive($menu){
    $menuActive['mn_beranda'] = 'none';
    $menuActive['mn_selayang'] = 'none';
    $menuActive['mn_login'] = 'none';
    $menuActive['mn_daftar'] = 'none';
    $menuActive['mn_current'] = 'none';
    $menuActive['mn_active'] = 'none';
    $menuActive['mn_pengumuman'] = 'none';
    $menuActive['mn_article'] = 'none';
    $menuActive['mn_userhome'] = 'none';
    $menuActive['mn_cari'] = 'none';
    $menuActive[$menu] = 'active';
    return $menuActive;
  }
}
?>
