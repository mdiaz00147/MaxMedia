<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model {

    protected $table = 'revenues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['revenue_total_diario', 'ecpm_total_diario'];

    public static function revenue(){
        return $datos =
            \DB::table('revenues')
                ->whereBetween('revenues.fecha',[Carbon::now()->subDay(2),Carbon::now()])
                ->groupBy('fecha')
                ->select('revenues.*')
                ->get();
    }
}
