<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kumeti_member_registration extends Model
{
    use HasFactory;
    protected $table = "kumeti_member_registrations";

    public static function IDGenerator($model, $trow, $length = 4, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_length = $length;
            $last_name = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);

            $actial_last_number = ((int) $code / 1) * 1;

            $increment_last_number = $actial_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;

        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= 0;
        }
        $member = $prefix . '-' . $zeros . $last_number;
        $check = $model::where(['kumeti_code' => $member])->get();

        if (!$check) {
            $last_number++;
            return $prefix . '-' . $zeros . $last_number;
        } else {
            return $prefix . '-' . $zeros . $last_number;
        }

    }

}
