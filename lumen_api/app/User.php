<?php
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class User extends Model {
    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_user', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $primaryKey = 'user_id';

    public function faskes()
    {
        return $this->hasMany('App\Faskes');
    }
 
}