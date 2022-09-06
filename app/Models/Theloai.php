<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    use HasFactory;
    protected $table = "theloai";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function Loaitin(){
        return $this->hasMany(Loaitin::class,'idTheLoai','id');
    }
    public function Tintuc(){
        return $this->hasManyThrough(Tintuc::class,Loaitin::class,'idTheLoai','idLoaiTin','id');
    }
}
