<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    //If I don't want to add all fields all the time I can replace fillable with quarded and put only names that I don't want to save


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {

        $this->comments()->create(compact('body'));

//        Comment::create([
//            'post_id' => $this->id,
//            'body' => $body
//        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {
        if (!$filters) {
            return $query;
        }
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}
