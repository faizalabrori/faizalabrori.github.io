<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\SiswaModel;

class Siswa extends BaseController
{
   protected $sw;
   public function __contruct()
   {
      $this->sw = new SiswaModel();
   }
    public function index()
    {
        $menu = [
            'beranda'=>[
               'title'=>'Beranda',
               'link'=>base_url(),
               'icon'=>'fa-solid fa-house',
               'aktif'=>'',
            ],
            'jurusan'=>[
               'title'=>'Jurusan',
               'link'=>base_url().'/jurusan',
               'icon'=>'fa-solid fa-building-columns',
               'aktif'=>'',
            ],
            'semester'=>[
               'title'=>'Semester',
               'link'=>base_url().'/semester',
               'icon'=>'fa-solid fa-list',
               'aktif'=>'',
            ],
            'siswa'=>[
               'title'=>'Siswa',
               'link'=>base_url().'/siswa',
               'icon'=>'fa-solid fa-user',
               'aktif'=>'active',
            ],
            
         ];
   
         $breadcrumb ='<div class="col-sm-6">
                     <h1 class="m-0">Siswa</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item <a href="'. base_url() .'">Beranda</a></li>
                     <li class="breadcrumb-item active">Siswa</li>

                     </ol>
                  </div>';
         $data['menu'] = $menu;
         $data['breadcrumb'] = $breadcrumb;
         $data['title_card'] = "Data Siswa";
         $SiswaModel = new SiswaModel();
         $siswa = $SiswaModel->findAll();
   
         $data['data_siswa'] = $siswa;
        return view('siswa/content', $data);
    }
}
