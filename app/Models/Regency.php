<?php
namespace App\Models;

use App\Http\Traits\RegencyTrait;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use RegencyTrait;
    protected $table = 'regencies';
    protected $hidden = [
        'province_id'
    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
