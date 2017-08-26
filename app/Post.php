<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Post extends Model
{
    use Common;

    protected $fillable = [
        'body',
        'status',
        'comment_count',
        'created_by',
        'updated_by',
    ];

    public function getUpdatedAtAttribute($date)
    {
        return $this->formatDate($date);
    }

    public function getCreatedAtAttribute($date)
    {
        return $this->formatDate($date);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    public function scopeNotMine($query)
    {
        return $query->where('created_by', '!=', Auth::user()->id);
    }

    public function scopeMine($query)
    {
        return $query->where('created_by', Auth::user()->id);
    }

    public function scopeSearch($query, $inputs)
    {
        if (array_get($inputs, 'is_open')) {
            $query->orWhere('status', 'open');
        }
        
        if (array_get($inputs, 'is_closed')) {
            $query->orWhere('status', 'closed');
        }

        $query->latest();

        return $query;
    }

    public function isOpen()
    {
        return $this->status == 'open' ? true : false;
    }

    public function isClosed()
    {
        return $this->status == 'closed' ? true : false;
    }

    public function store($request)
    {
        $data = [
            'body' => $request->body,
            'status' => 'open',
            'comment_count' => 0,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];
        $this->fill($data);

        $this->save();
    }
}
