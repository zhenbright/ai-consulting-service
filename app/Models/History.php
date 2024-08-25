<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Botble\Portfolio\Models\Service;

class History extends Model
{
    use HasFactory;

    protected $table =  'histories';

    protected $fillable = [
        'user_id',
        'doc_url',
        'pdf_url',
        'service_id'
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
