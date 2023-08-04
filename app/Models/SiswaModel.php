<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'idsiswa';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['idsiswa', 'nisn', 'alamat', 'password'];
}
