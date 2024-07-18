<?php
namespace App\Http\Libraries;
/**
 *
 */
class MenuOwner
{
  static function menuActive($menu){
    $menuActive['mn_dashboard'] = 'none';
    $menuActive['mn_identitas'] = 'none';
    $menuActive['mn_identitas_pkm'] = 'none';
    $menuActive['mn_data_master'] = 'none';
    $menuActive['mn_management'] = 'none';
    $menuActive['mn_article'] = 'none';
    $menuActive['mn_data_submission'] = 'none';
    $menuActive['mn_data_pengajuan'] = 'none';
    $menuActive[$menu] = 'active';
    return $menuActive;
  }
}
?>
