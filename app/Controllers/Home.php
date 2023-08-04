<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   
      $menu = [
         'beranda'=>[
            'title'=>'Beranda',
            'link'=>base_url(),
            'icon'=>'fa-solid fa-house',
            'aktif'=>'active',
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
            'aktif'=>'',
         ],
         
      ];

      $breadcrumb ='<div class="col-sm-6">
                  <h1 class="m-0">Beranda</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Beranda v1</li>
                  </ol>
               </div>';
      $data['menu'] = $menu;
      $data['breadcrumb'] = $breadcrumb;
      $data['title_card'] = "welcome to my site";
      $data['selamat_datang'] = "selamat datang di aplikasi kami";
      return view('template/content',$data);
    }
}
