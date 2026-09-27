<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'preacher',
        'category',
        'youtube_id',
        'youtube_url',
        'thumbnail',
        'description',
        'duration',
        'is_live',
        'is_featured',
        'views',
        'published_at',
    ];

    protected $casts = [
        'is_live' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            return $this->thumbnail;
        }
        if ($this->youtube_id && !str_contains($this->youtube_id, 'facebook') && strlen($this->youtube_id) === 11) {
            return "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg";
        }
        return "/images/school_building_construction.jpg";
    }

    public function getEmbedUrlAttribute(): string
    {
        if (str_contains($this->youtube_url ?? '', 'facebook.com') || str_contains($this->youtube_id ?? '', 'facebook') || (is_numeric($this->youtube_id ?? '') && strlen($this->youtube_id) > 12)) {
            $fbUrl = "https://www.facebook.com/watch/?v={$this->youtube_id}";
            return "https://www.facebook.com/plugins/video.php?href=" . urlencode($fbUrl) . "&show_text=false&width=360&autoplay=1";
        }
        return "https://www.youtube.com/embed/{$this->youtube_id}?autoplay=1&rel=0";
    }

    public function getIsPortraitAttribute(): bool
    {
        return str_contains($this->youtube_url ?? '', '/reel/') 
            || str_contains($this->youtube_url ?? '', '/share/r/')
            || str_contains($this->youtube_url ?? '', '/share/v/')
            || str_contains($this->youtube_url ?? '', '/shorts/')
            || str_contains($this->slug ?? '', 'special-team')
            || str_contains($this->slug ?? '', 'sand-filling')
            || str_contains($this->youtube_url ?? '', 'facebook.com')
            || (is_numeric($this->youtube_id ?? '') && strlen($this->youtube_id) > 12);
    }
}
