<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    //
    const STATUS = [
        1 => ['label' => '未着手'],
        2 => ['label' => '着手中'],
        3 => ['label' => '完了'],
    ];

    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttributes()
    {
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status]))  {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }
}
