<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ticket extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 0
    ];

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'priority',
        'status',
        'file_path',
        'department'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityAttribute($value)
    {
        return ['Low', 'Mid', 'High'][$value];
    }

    public function getStatusNameAttribute()
    {
        return ['Created', 'Replied', 'Closed'][$this->status];
    }

    public function hasFile()
    {
        return !is_null($this->file_path);
    }

    public function file()
    {
        return $this->hasFile()
            ? Storage::url($this->file_path)
            : null;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function isCreated()
    {
        return $this->status === 0;
    }

    public function replied()
    {
        $this->status = 1;
        $this->save();
    }

    public function isAdmin()
    {
        return $this instanceof Admin;
    }

    public function close()
    {
        $this->status = 2;
        $this->save();
    }

    public function isClosed()
    {
        return $this->status === 2;
    }
}
