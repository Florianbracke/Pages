<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    public $timestamps = false;

    public $table = 'plants';

    public function getTimeIfLateCalculateAttribute () {
        return ceil((strtotime('now') - $this->last_watered - $this->days_until_water ) / 86400)-1;
    }

    public function getTimeCalculateAttribute() {
        return ceil((($this->last_watered + $this->days_until_water) - strtotime('now')) / 86400);
    }

}
