<?php

namespace App\Models\Rv;

use App\Models\Scopes\Rv\DepartmentScope;
use App\Models\Traits\SelfReferenceTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    use SelfReferenceTrait;

    public static function departments(array $filter)
    {
        if ($filter != null) {
            $filter[] = ['parent_id', '=', null];
            return Department::where($filter)->with('groups')->paginate();
        } else {
            return Department::where('parent_id', null)->with('groups')->paginate();
        }
    }

    public static function orderedNames()
    {
        return Department::where('parent_id', null)->orderBy('name', 'Asc')->pluck('name')->toArray();
    }

    public function groups()
    {
        return $this->children();
    }

    public function clubmemberships()
    {
        return $this->hasMany(ClubMembership::class);
    }

    public function canteenpermanences()
    {
        return $this->hasMany(CanteenPermanence::class);
    }

    public function canteenteams()
    {
        return $this->hasMany(CanteenTeam::class);
    }
}
