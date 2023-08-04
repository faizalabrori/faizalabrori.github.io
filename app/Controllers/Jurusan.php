<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\JurusanModel;

class Jurusan extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new JurusanModel();

        $this->menu = [
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
               'aktif'=>'active',
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

         $this->rules = [
            'idjurusan' => [
               'rules' => 'required',
               'errors' => [
                     'required' => 'Id jurusan harus di isi',
               ]
               ],
               'nama_jurusan' => [
                  'rules' => 'required',
                  'errors' => [
                        'required' => 'Nama jurusan harus di isi',
                  ]
                  ],
                   'sekolah' => [
               'rules' => 'required',
               'errors' => [
                     'required' => 'sekolah harus di isi',
               ]
               ],
               'password' => [
                  'rules' => 'required',
                  'errors' => [
                        'required' => 'Password harus di isi',
                  ]
                  ],
         ];
    }
    public function index()
    {
        
         $breadcrumb ='<div class="col-sm-6">
                     <h1 class="m-0">jurusan</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item <a href="'.base_url().'">Beranda</a></li>
                     <li class="breadcrumb-item active">Jurusan</li>
                     </ol>
                  </div>';
         $data['menu'] = $this->menu;
         $data['breadcrumb'] = $breadcrumb;
         $data['title_card'] = "Jurusan";

        $query = $this->pm->find();
        $data['data_jurusan'] = $query;

        return view('jurusan/content', $data);
    }

    public function tambah() 
    {
        $breadcrumb ='<div class="col-sm-6">
                     <h1 class="m-0">jurusan</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item <a href="'. base_url() .'">Beranda</a></li>
                     <li class="breadcrumb-item"><a href="'. base_url() . '/jurusan"></a>Jurusan</li>
                     <li class="breadcrumb-item active">Tambah Jurusan</li>


                     </ol>
                  </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah jurusan';
        $data['action'] = base_url(). '/jurusan/simpan';
        return view('jurusan/input', $data);
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
                     $simpan = $this->pm->insert($dt);
                     return redirect()->to('jurusan')->with('success','Data berhasil disimpan');
                  } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
                     session()->setFlashdata('error', $e->getMessage());
                     return redirect()->to('jurusan')->withInput();
                  }
    }
    
    public function hapus($id)
    {
      if(empty($id)) {
         return redirect()->back()->with('error','Hapus data gagal dilakukan parameter tidak valid');

      }
      try {
         $this->pm->delete($id);
         return redirect()->to('jurusan')->with('success','Data jurusan dengan kode '. $id .' berhasil dihapus');
      } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
         return redirect()->to('jurusan')->with('error', $e->getMessage());
      }
    }
    public function edit($id)
    {
      $breadcrumb ='<div class="col-sm-6">
                     <h1 class="m-0">jurusan</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item <a href="'. base_url() .'">Beranda</a></li>
                     <li class="breadcrumb-item"><a href="'. base_url() . '/jurusan"></a>Jurusan</li>
                     <li class="breadcrumb-item active">edit Jurusan</li>


                     </ol>
                  </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'edit jurusan';
        $data['action'] = base_url(). '/jurusan/update';

        $data['edit_data'] = $this->pm->find($id);

        return view('jurusan/input', $data);
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
        $this->pm->update($param, $dtEdit);
        return redirect()->to('jurusan')->with('success','Data berhasil di update');
        
        }catch (\CodeIgniter\Database\Exceptions\DatabaseException $e)  {
         session()->setFlashdata('error', $e->getMessage());
         return redirect()->back()-withInput();
        }
    }

}
