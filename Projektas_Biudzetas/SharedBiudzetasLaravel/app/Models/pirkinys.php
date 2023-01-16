<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pirkinys extends Model
{
    use HasFactory;
    public function apsipirkimas()
    {
        return $this->belongsTo(Apsipirkimas::class);
    }
    public function prekepaslauga()
    {
        return $this->belongsTo(Prekepaslauga::class);
    }
    public function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
       ');';
       if ($with_script_tags) {
       $js_code = '<script>' . $js_code . '</script>';
       }
       echo $js_code;
       }
}
