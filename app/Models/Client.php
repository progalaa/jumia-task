<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const MOZAMBIQUE_CODE = 258;
    const CAMEROON_CODE = 237;
    const MOROCCO_CODE = 212;
    const UGANDA_CODE = 256;
    const ETHIOPIA_CODE = 251;

    public $countries = [
        self::CAMEROON_CODE => 'Cameron',
        self::MOROCCO_CODE => 'Morocco',
        self::MOZAMBIQUE_CODE => 'Mozambique',
        self::UGANDA_CODE => 'Uganda',
        self::ETHIOPIA_CODE => 'Ethiopia',
    ];

    public $countriesRegex = [
        self::CAMEROON_CODE => '/\(237\)\ ?[2368]\d{7,8}$/',
        self::MOROCCO_CODE => '/\(212\)\ ?[5-9]\d{8}$/',
        self::MOZAMBIQUE_CODE => '/\(258\)\ ?[28]\d{7,8}$/',
        self::UGANDA_CODE => '/\(256\)\ ?\d{9}$/',
        self::ETHIOPIA_CODE => '/\(251\)\ ?[1-59]\d{8}$/',
    ];

    protected $fillable = ['name', 'phone'];

   protected $appends = ['phone_number', 'country_code', 'country', 'country_code_with_plus', 'phone_state'];

    public function getCountryAttribute()
    {
        return $this->countries[$this->country_code];
    }

    public function getPhoneNumberAttribute()
    {
        return preg_replace('/\((.*?)\) /', '', $this->phone);
    }

    public function getCountryCodeAttribute()
    {
        preg_match('/\((.*?)\) /', $this->phone, $match);

        return (isset($match[1])) ? $match[1] : null;
    }

    public function getCountryCodeWithPlusAttribute()
    {
        return '+' . $this->country_code;
    }

    public function getPhoneStateAttribute()
    {
        return (bool)preg_match($this->countriesRegex[$this->country_code], $this->phone);
    }
}
