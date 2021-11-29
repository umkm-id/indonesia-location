<?php
namespace App\Http\Traits;

trait DistrictTrait
{
    public function isProvince($id)
    {
        return $this->regency->province_id == $id ? true : false;
    }

    public function isRegency($id)
    {
        return $this->regency_id == $id ? true : false;
    }
    public function province()
    {
        return $this->regency->province();
    }
}
