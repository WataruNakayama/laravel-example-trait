<?php namespace App\Traits;

trait Timestamp
{
    public function getModifiedAtAttribute()
    {
        return ($this->updated_at) ? $this->updated_at : $this->created_at;
    }
}
