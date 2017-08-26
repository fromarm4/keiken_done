<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use Carbon\Carbon;

class Comment extends Model
{
    use Common;

    protected $fillable = [
        'body',
        'post_id',
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

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function store(Post $post, $request)
    {
        
        $data = [
            'post_id' => $post->id,
            'body' => $request->body,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
        ];

        DB::beginTransaction();
        
        $this->fill($data);
        $this->save();

        $post = $this->post;

        if ($count = $post->comments->count()) {
            $post->comment_count = $count;
            $post->save();
        }

        DB::commit();
    }
}
