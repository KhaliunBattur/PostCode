<?php

namespace App\Imports;

use App\Models\Postcode;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class PostcodeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        // $entry = Postcode::where('postcode', $row[2])->first();
        // if ($entry == null)

        return new Postcode([
            'national_local_gov_code' => $row[0],
            'old_postcode' => $row[1],
            'postcode' => $row[2],
            'prefecture_kata' => $row[3],
            'city_ward_kata' => $row[4],
            'town_kata' => $row[5],
            'prefecture_kanji' => $row[6],
            'city_ward_kanji' => $row[7],
            'town_kanji' => $row[8],
            'flg_has_2postcode' => $row[9],
            'flg_started_with_char' => $row[10],
            'flg_has_chome' => $row[11],
            'flg_has_1postcode_represents_2area' => $row[12],
            'flg_update' => $row[13],
            'reason_for_update' => $row[14],
        ]);
        // else {
        //     $entry->national_local_gov_code = 124567;
        //     $entry->save();
        //     return;
        // }
    }
}
