<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory, Translatable;

    //To define which attributes needs to be translated
    public $translatedAttributes = ['name','description'];
    protected $fillable = ['name','description'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
