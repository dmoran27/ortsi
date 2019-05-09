<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;
use Laravel\Passport\HasApiTokens;


/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes;

//campos disponibles en la base de datos
    protected $dates = ['deleted_at'];
    protected $table = 'users';
    protected $sexo = ['Femenino', 'Masculino'];
    protected $fillable = [
           'nombre',
           'apellido',
           'cedula',
           'telefono',
           'sexo',          
           'area_id',  
           'email',
           'password',
           'remember_token'
    ];
//observar cambios en la base de datos
    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }
//validacion 
    public static function storeValidation($request)
    {
        return [
           
            'email' => 'email|max:191|required|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|unique:users|max:10',
            'telefono' => 'required|string|max:50',
            'sexo' => 'required|string|max:10',
            'area_id' => 'required|string|max:255',
        ];
    }
//validacion al actualizar
    public static function updateValidation($request)
    {
        return [
            
            'email' => 'email|max:191|required|unique:users,email,'.$request->route('user'),
            'password' => '',
            'role' => 'array|required',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|unique:users|max:10',
            'telefono' => 'required|string|max:50',
            'sexo' => 'required|string|max:10',
            'area_id' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ];
    }

    
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    
    
    //notificar reseteo de contraseña
    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }

    //relaciones entre las tablas de la base de dato
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    } 
    public function area(){
        return $this->belongsTo(Area::class);
    }
     public function tickets()
    {
        return $this->HasMany(Ticket::class);
    }
     public function perifericos()
    {
        return $this->HasMany(Periferico::class);
    }
     public function caracteristicas()
    {
        return $this->HasMany(Caracteristica::class);
    }
     public function tipos()
    {
        return $this->HasMany(Tipo::class);
    }

     public function equipos()
    {
        return $this->HasMany(Equipo::class);
    }
    public function softwares()
    {
        return $this->HasMany(Software::class);
    }
    public function clientes()
    {
        return $this->HasMany(Cliente::class);
    }
     public function dependencias()
    {
        return $this->HasMany(Dependencia::class);
    }
     public function edificios()
    {
        return $this->HasMany(Edificio::class);
    }   
    





}
