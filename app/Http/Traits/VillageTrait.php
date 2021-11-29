<?php
namespace App\Http\Traits;


trait VillageTrait
{
    public function isProvince($id)
    {
        return $this->district->regency->province_id == $id ? true : false;
    }
    public function isRegency($id)
    {
        return $this->district->regency_id == $id ? true : false;
    }
    public function isDistrict($id)
    {
        return $this->district_id == $id ? true : false;
    }
    public function regency()
    {
        return $this->district->regency();
    }
    public function province()
    {
        return $this->district->regency->province();
    }
}
