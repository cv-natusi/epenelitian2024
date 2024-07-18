<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([[
              'username' => 'admin',
              'email' => 'dinkessidoarjo46@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 1,
              'tempat_penelitian_id' => 0,
              'is_banned' => 0
          ],[
              'username' => 'kasi',
              'email' => 'kasi@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 2,
              'tempat_penelitian_id' => 0,
              'is_banned' => 0
          ],[
             'username' => 'budiman',
              'email' => 'deltaepenelitian01@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 3,
              'tempat_penelitian_id' => 0,
              'is_banned' => 0
          ],[
             'username' => 'nur',
              'email' => 'nurfitrianidp27@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 3,
              'tempat_penelitian_id' => 0,
              'is_banned' => 0
          ],[
             'username' => 'subbag_tu',
              'email' => 'subbag_tu@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 1,
              'is_banned' => 0
          ],[
             'username' => 'subbag_perencanaan',
              'email' => 'subbag_perencanaan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 2,
              'is_banned' => 0
          ],[
             'username' => 'subbag_keuangan',
              'email' => 'subbag_keuangan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 3,
              'is_banned' => 0
          ],[
             'username' => 'sdk_sdm',
              'email' => 'sdk_sdm@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 4,
              'is_banned' => 0
          ],[
             'username' => 'sdk_alkes',
              'email' => 'sdk_alkes@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 6,
              'is_banned' => 0
          ],[
             'username' => 'sdk_farmasi',
              'email' => 'sdk_farmasi@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 6,
              'is_banned' => 0
          ],[
             'username' => 'kesmas_kesling',
              'email' => 'kesmas_kesling@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 7,
              'is_banned' => 0
          ],[
             'username' => 'kesmas_kesgagizi',
              'email' => 'kesmas_kesgagizi@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 8,
              'is_banned' => 0
          ],[
             'username' => 'kesmas_promkes',
              'email' => 'kesmas_promkes@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 9,
              'is_banned' => 0
          ],[
             'username' => 'yankes_primer',
              'email' => 'yankes_primer@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 10,
              'is_banned' => 0
          ],[
             'username' => 'yankes_rujukan',
              'email' => 'yankes_rujukan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 11,
              'is_banned' => 0
          ],[
             'username' => 'yankes_tradisional',
              'email' => 'yankes_tradisional@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 12,
              'is_banned' => 0
          ],[
             'username' => 'p2p_menular',
              'email' => 'p2p_menular@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 13,
              'is_banned' => 0
          ],[
             'username' => 'p2p_tidakmenular',
              'email' => 'p2p_tidakmenular@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 14,
              'is_banned' => 0
          ],[
             'username' => 'p2p_imunisasi',
              'email' => 'p2p_imunisasi@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 16,
              'is_banned' => 0
          ],[
             'username' => 'pkm_sidoarjo',
              'email' => 'pkm_sidoarjo@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 16,
              'is_banned' => 0
          ],[
             'username' => 'pkm_urangagung',
              'email' => 'pkm_urangagung@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 17,
              'is_banned' => 0
          ],[
             'username' => 'pkm_sekardangan',
              'email' => 'pkm_sekardangan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 18,
              'is_banned' => 0
          ],[
             'username' => 'pkm_buduran',
              'email' => 'pkm_buduran@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 19,
              'is_banned' => 0
          ],[
             'username' => 'pkm_gedangan',
              'email' => 'pkm_gedangan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 20,
              'is_banned' => 0
          ],[
             'username' => 'pkm_ganting',
              'email' => 'pkm_ganting@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 21,
              'is_banned' => 0
          ],[
             'username' => 'pkm_sedati',
              'email' => 'pkm_sedati@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 22,
              'is_banned' => 0
          ],[
             'username' => 'pkm_taman',
              'email' => 'pkm_taman@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 23,
              'is_banned' => 0
          ],[
             'username' => 'pkm_trosobo',
              'email' => 'pkm_trosobo@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 24,
              'is_banned' => 0
          ],[
             'username' => 'pkm_tarik',
              'email' => 'pkm_tarik@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 26,
              'is_banned' => 0
          ],[
             'username' => 'pkm_balongbendo',
              'email' => 'pkm_balongbendo@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 26,
              'is_banned' => 0
          ],[
             'username' => 'pkm_wonoayu',
              'email' => 'pkm_wonoayu@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 27,
              'is_banned' => 0
          ],[
             'username' => 'pkm_sukodono',
              'email' => 'pkm_sukodono@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 28,
              'is_banned' => 0
          ],[
             'username' => 'pkm_prambon',
              'email' => 'pkm_prambon@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 29,
              'is_banned' => 0
          ],[
             'username' => 'pkm_tulangan',
              'email' => 'pkm_tulangan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 30,
              'is_banned' => 0
          ],[
             'username' => 'pkm_kepadangan',
              'email' => 'pkm_kepadangan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 31,
              'is_banned' => 0
          ],[
             'username' => 'pkm_tanggulangin',
              'email' => 'pkm_tanggulangin@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 32,
              'is_banned' => 0
          ],[
             'username' => 'pkm_candi',
              'email' => 'pkm_candi@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 33,
              'is_banned' => 0
          ],[
             'username' => 'pkm_kedungsolo',
              'email' => 'pkm_kedungsolo@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 34,
              'is_banned' => 0
          ],[
             'username' => 'pkm_porong',
              'email' => 'pkm_porong@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 36,
              'is_banned' => 0
          ],[
             'username' => 'pkm_jabon',
              'email' => 'pkm_jabon@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 36,
              'is_banned' => 0
          ],[
             'username' => 'pkm_krian',
              'email' => 'pkm_krian@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 37,
              'is_banned' => 0
          ],[
             'username' => 'pkm_barengkrajan',
              'email' => 'pkm_barengkrajan@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 38,
              'is_banned' => 0
          ],[
             'username' => 'pkm_krembung',
              'email' => 'pkm_krembung@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 39,
              'is_banned' => 0
          ],[
             'username' => 'pkm_waru',
              'email' => 'pkm_waru@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 40,
              'is_banned' => 0
          ],[
             'username' => 'pkm_medaeng',
              'email' => 'pkm_medaeng@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 41,
              'is_banned' => 0
          ],[
             'username' => 'uptd_laboratorium',
              'email' => 'uptd_laboratorium@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 42,
              'is_banned' => 0
          ],[
             'username' => 'uptd_farmasi',
              'email' => 'uptd_farmasi@gmail.com',
              'password' => Hash::make("admin"),
              'level' => 6,
              'tempat_penelitian_id' => 43,
              'is_banned' => 0
          ]]);        
    }
}
