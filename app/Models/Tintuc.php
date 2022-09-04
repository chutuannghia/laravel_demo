<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    use HasFactory;
    protected $table = "tintuc";
    protected $primaryKey = "id";
    public $timestamps = false;
    public function comment(){
        return $this->hasMany(Comment::class, 'idTinTuc','id');
    }
    public function Loaitin(){
        return $this->belongsTo(Loaitin::class,'idLoaiTin','id');
    }
}
