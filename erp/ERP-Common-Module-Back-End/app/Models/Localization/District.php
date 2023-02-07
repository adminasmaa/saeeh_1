<?php

namespace App\Models\Localization;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends BaseModel
{

    protected $table = "c_districts";

    protected $fillable = [
        'name_ar', 'name_en', 'code', 'is_active'
    ];
}
