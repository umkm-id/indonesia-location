<?php
namespace App\Models;

use App\Http\Traits\VillageTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Village extends Model
{
    use VillageTrait;
    protected $table = 'villages';
    protected $hidden = [
        'district_id'
    ];
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
