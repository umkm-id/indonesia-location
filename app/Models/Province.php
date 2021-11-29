<?php
namespace App\Models;
use App\Http\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use ProvinceTrait;

    protected $table = 'provinces';
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}
