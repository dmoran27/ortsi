<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Permission
 *
 * @package App
 * @property string $title
*/
class Permission extends Model
{
    use SoftDeletes;
    protected $fillable = ['title'];

    public static function boot()
    {
        parent::boot();

        Permission::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required'
        ];
    }

    

    
    
    
}
