<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoNote extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "todonotes";

    protected $fillable = ['content','completion_time'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
     {
         return $this->belongsTo(User::class);
     }
}
