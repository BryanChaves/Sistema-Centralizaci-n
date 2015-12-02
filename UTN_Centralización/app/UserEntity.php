<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEntity extends Model
{
  	protected $table = 'user_entity';
	protected $fillable = array('user_id','entity_id','created_at','updated_at');
	protected $guarded  = array('id');
	public    $timestamps = false;

	/*public function getUserEntity()
    {
        return \DB::table('user_entity')
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->join('entity', 'entity.id', '=', 'user_entity.entity_id')
            ->select('users.*','entity.*')
            ->get(); 
    }*/
    public function getUserEntity($id)
    {
        return \DB::table('user_entity')
            
            ->join('user_entity', 'users.id', '=', 'user_entity.user_id')
            ->join('entity', 'entity.id', '=', 'user_entity.entity_id')
            ->select('users.*','entity.*')
            ->where('users.id', $id)
            ->get(); 
    }
}
