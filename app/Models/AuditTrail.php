<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class AuditTrail extends Model
{
    use HasFactory;
    protected $table = "audit_trails";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function create($action, $description)
    {
        $trail = new AuditTrail;
        $trail->user_id = Auth::id();
        $trail->action = $action;
        $trail->description = $description;
        $trail->save();
    }

}
