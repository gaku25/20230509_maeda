<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    // public function doSearch($keyword,$created_at,$emaill)
    // {
    //     $query = contact::where('fullname','like','%'.keyword.'%');
    //     if(!empty($id)){
    //         $query->where('id',$id);
    //     }
    // return $query->get();
    // }
}
