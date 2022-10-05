<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("transacciones")->insert([
            'IdTransaccion'=>45,
            'NumeroTransaccion'=>1456132,
            'IdAplicacion'=>1,
            'NumeroCuenta'=>'465',
            'MontoTransaccion'=>350,
            'FechaTransaccion'=>date("2023-01-08"),
            'FotoVaucher'=>'uploads/3wLfLvhhuDvoGuwFnD5394kFwQrNJ8saQ23EneWP.jpg',
            'created_at'=>now()
        ]);
    }
}
