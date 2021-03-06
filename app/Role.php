<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Role extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title'];

    public static function boot()
    {
        parent::boot();

        Role::observe(new \App\Observers\UserActionsObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id|max:4294967295|required'
        ];
    }

    

    
    
    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
    
    
}
