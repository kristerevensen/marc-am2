<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Click extends Model
{
    use HasFactory;

    protected $primaryKey = 'link_token';

    public function get_redirect($id)
    {
        return DB::table('campaigns_links')
                ->where('link_token',$id)
                ->pluck('tagged_url');

    }

    public function check_token($id){
        $res = DB::table('campaigns_links')
        ->whereIn('link_token',[$id])
        ->get();

        if($res->isEmpty()) {
            return false;
        } else {
            return true;
        }
    }
}
