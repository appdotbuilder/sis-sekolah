<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Announcement
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property string|null $image
 * @property string $type
 * @property string $target_audience
 * @property bool $is_featured
 * @property bool $is_published
 * @property \Illuminate\Support\Carbon|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User $user
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereTargetAudience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement published()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement featured()
 * @method static \Database\Factories\AnnouncementFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Announcement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'type',
        'target_audience',
        'is_featured',
        'is_published',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the user that owns the announcement.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include published announcements.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to only include featured announcements.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}