<?php
namespace App\Http\Libraries;
/**
 *
 */
class Formatter
{
  static function tanggal_indo($tanggal){
    $tgl = '';
    $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    $tgl = date('d',strtotime($tanggal)).' '.$bulan[date('m',strtotime($tanggal))-1].' '.date('Y',strtotime($tanggal));
    return $tgl;
  }

  public static function slug($text, string $divider = '-')//anas
    {
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
  }
}
?>