<?php

namespace Modules\Guest\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Translatable\HasTranslations;

/**
 * Class City.
 *
 * @package namespace App\Models;
 */
class City extends Model implements Transformable
{
    use TransformableTrait;
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'object_code'
    ];

    public $translatable = ['title'];

    protected $casts = [
        'object_code' => 'integer'
    ];
}
