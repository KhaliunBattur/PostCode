<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{

    protected $fillable = [
        'national_local_gov_code',
        'old_postcode',
        'postcode',
        'prefecture_kata',
        'city_ward_kata',
        'town_kata',
        'prefecture_kanji',
        'city_ward_kanji',
        'town_kanji',
        'flg_has_2postcode',
        'flg_started_with_char',
        'flg_has_chome',
        'flg_has_1postcode_represents_2area',
        'flg_update',
        'reason_for_update',
    ];
}
