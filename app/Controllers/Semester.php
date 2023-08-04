<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\SemesterModel;

class Semester extends BaseController
{
   protected $sm;
   private $menu;
    private $rules;
   public function __contruct()
   {
      $this->sm = new SemesterModel();
   }
   public function semester()
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
            'aktif'=>'active',
         ],
         'siswa'=>[
            'title'=>'Siswa',
            'link'=>base_url().'/siswa',
            'icon'=>'fa-solid fa-user',
            'aktif'=>'',
         ],
         
      ];
      
      $this->rules = [
         'idsemester' => [
            'rules' => 'required',
            'errors' => [
                  'required' => 'Id semester harus di isi',
            ]
            ],
            'semester' => [
               'rules' => 'required',
               'errors' => [
                     'required' => 'semester harus di isi',
               ]
               ],
                'kelas' => [
            'rules' => 'required',
            'errors' => [
                  'required' => 'kelas harus di isi',
            ]
            ],
            'password' => [
               'rules' => 'required',
               'errors' => [
                     'required' => 'Password harus di isi',
               ]
               ],
      ];

      $breadcrumb ='<div class="col-sm-6">
                  <h1 class="m-0">Semester</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item <a href="'. base_url() .'"></a>"Beranda</li>
                  <li class="breadcrumb-item active">Semester v1</li>
                  </ol>
               </div>';
      $data['menu'] = $menu;
      $data['breadcrumb'] = $breadcrumb;
      $data['title_card'] = "Data Semester";
      $SemesterModel = new SemesterModel();
      $semester = $SemesterModel->findAll();


      $data['data_semester'] = $semester;
      return view('semester/content', $data);
   }
   public function tambah() 
    {
        $breadcrumb ='<div class="col-sm-6">
                     <h1 class="m-0">semester</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item <a href="'. base_url() .'">Beranda</a></li>
                     <li class="breadcrumb-item"><a href="'. base_url() . '/semester"></a>Jurusan</li>
                     <li class="breadcrumb-item active">Tambah Semester</li>


                     </ol>
                  </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah semester';
        $data['action'] = base_url(). '/semester/simpan';
        return view('semester/input', $data);
    }
    public function simpan()
    {

                  if (strtolower($this->request->getMethod()) !== 'post'){
                  
                  return redirect()->back()->withInput();


                  }
                  if (! $this->validate($this->rules)) {

                  return redirect()->back()->withInput();
                  
                 }

                  $dt = $this->request->getPost();
                  try {
                     $simpan = $this->sm->insert($dt);
                     return redirect()->to('semester')->with('success','Data berhasil disimpan');
                  } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                     session()->setFlashdata('error', $e->getMessage());
                     return redirect()->to('semester')->withInput();
                  }
    }
    
    public function hapus($id)
    {
      if(empty($id)) {
         return redirect()->back()->with('error','Hapus data gagal dilakukan parameter tidak valid');

      }
      try {
         $this->sm->delete($id);
         return redirect()->to('semester')->with('success','Data semester dengan kode '. $id .' berhasil dihapus');
      } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
         return redirect()->to('semester')->with('error', $e->getMessage());
      }
    }
    public function edit($id)
    {
      $breadcrumb ='<div class="col-sm-6">
                     <h1 class="m-0">semester</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item <a href="'. base_url() .'">Beranda</a></li>
                     <li class="breadcrumb-item"><a href="'. base_url() . '/semester"></a>Semester</li>
                     <li class="breadcrumb-item active">edit semester</li>


                     </ol>
                  </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'edit semester';
        $data['action'] = base_url(). '/semester/update';

        $data['edit_data'] = $this->sm->find($id);

        return view('semester/input', $data);
    }
    public function update()
    {
     
      $dtEdit = $this->request->getPost();
      $param = $dtEdit['param'];
      unset($dtEdit['param']);
      unset($this->rules['password']);

      if (! $this->validate($this->rules)) {

         return redirect()->back()->withInput();
         
        }
        if(empty($dtEdit['passwword'])){
         unset($dtEdit['password']);
        }
        try {
        $this->sm->update($param, $dtEdit);
        return redirect()->to('semester')->with('success','Data berhasil di update');
        
        }catch (\CodeIgniter\Database\Exceptions\DatabaseException $e)  {
         session()->setFlashdata('error', $e->getMessage());
         return redirect()->back()-withInput();
        }
    }
 
}
