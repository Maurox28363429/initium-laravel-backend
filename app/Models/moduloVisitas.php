<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\departamentos;
class moduloVisitas extends Model
{
    use HasFactory;
    protected $fillable=[
        "apartamentID",
        "apartamentName",
        "Visit_Date",
        "Visit_Hour",
        "VisitorName",
        "VisitorLastName",
        "VisitorPhone",
        "VisitUrl",
        "DNIURL",
        "DNI",
        "QRUrl"
    ];
    public function apartamento()
    {
        return $this->belongsTo(departamentos::class,'apartamentID');
    }
    public function getQRUrlAttribute($value)
    {
        $uid = $this->uid;
        $qrCode = QrCode::generate($uid);
        return $qrCode;
    }
    public function getDNIURLAttribute($value)
    {
        if ($value == null || $value == '') {
            return "https://placehold.co/600x400/png";
        } else {
            return $value;
        }
    }
    public function setApartamentNameAttribute($value)
    {
        $this->attributes['apartamentName'] = departamentos::find($this->apartamentID)->nombre;
    }
}
