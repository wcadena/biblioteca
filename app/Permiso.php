<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public static function genlist()
    {
        $catlist = [];
        foreach (self::all() as $cat)
        {
            //$catlist[$cat->nombre] = [$cat->id=>$cat->nombre];
            $catlist[" ".$cat->id] = $cat->permiso;
            //array_push($catlist,.$cat->id=>$cat->nombre]);

        }
        return $catlist;
    }

}
