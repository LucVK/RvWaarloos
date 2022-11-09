<?php

namespace App\Models\Rv;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Flat3\Lodata\Attributes\LodataString;
use Flat3\Lodata\Attributes\LodataCollection;
use Flat3\Lodata\Attributes\LodataDate;
use Flat3\Lodata\Attributes\LodataDuration;
use Flat3\Lodata\Attributes\LodataEnum;
use Flat3\Lodata\Attributes\LodataIdentifier;
use Flat3\Lodata\Attributes\LodataTypeIdentifier;



//  #[
//     LodataIdentifier('seasons'),
//     LodataTypeIdentifier('season'),
//     LodataString(name:'year', source:'year')]
class Season extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     // 'year' => 'datetime:Y',
    // ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y');
    // }

    public function canteenpermanences()
    {
        return $this->hasMany(CanteenPermanence::class);
    }
}
