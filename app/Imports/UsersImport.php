<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email'=>$row['email'],
            'password'=>Hash::make($row['password']),
            'is_mail_sent' => '0'
        ]);
        // return new User([
        //     'name' => $row[0],
        //     'email' => $row[1],
        //     'password' => bcrypt($row[2]),
        //     'is_mail_sent' => '0'

        // ]);
    }
}
