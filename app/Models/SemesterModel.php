<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'semester';
    protected $primaryKey       = 'idsemester';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['idsemester', 'semester', 'kelas', 'password'];
}
