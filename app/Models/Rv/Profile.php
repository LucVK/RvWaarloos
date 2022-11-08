<?php

namespace App\Models\Rv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'club_member_id',
    ];

    public function clubmember()
    {
        return $this->belongsTo(ClubMember::class);
    }
}
