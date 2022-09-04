<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    use HasFactory;
    protected $table = "loaitin";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function tintuc(){
        return $this->hasMany(Tintuc::class, 'idLoaiTin','id');
    }
    public function Theloai(){
        return $this->belongsTo(Theloai::class,'idTheLoai','id');
    }
}
