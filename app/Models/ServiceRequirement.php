<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Botble\Portfolio\Models\Service;

class ServiceRequirement extends Model
{
    use HasFactory;

    protected $table = 'service_requirements';

    protected $fillable = [
        'service_id',
        'requirement'
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
