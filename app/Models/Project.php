<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'images',
        'url',
        'project_category_id',
        'client_id',
        'content',
        'is_published',
        'published_at'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getImages()
    {
        return json_decode($this->image);
    }

    public function getDate()
    {
        $published_at = Carbon::parse($this->published_at);
        return $published_at->format('d M, Y');
    }
}
