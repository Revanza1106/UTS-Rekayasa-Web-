<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'organizer', 'location', 'date', 'time',
        'ticket_price', 'description', 'banner',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'ticket_price' => 'decimal:2',
        ];
    }

    public function formattedDate(): string
    {
        $months = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
        ];

        return $this->date->format('d').' '.$months[(int) $this->date->format('n')].' '.$this->date->format('Y');
    }

    public function formattedTime(): string
    {
        return substr((string) $this->time, 0, 5).' WIB';
    }
}
