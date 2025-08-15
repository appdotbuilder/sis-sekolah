<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Assignment
 *
 * @property int $id
 * @property int $teacher_id
 * @property int $subject_id
 * @property int $class_id
 * @property string $title
 * @property string $description
 * @property string|null $instructions
 * @property \Illuminate\Support\Carbon $due_date
 * @property int $max_score
 * @property string|null $attachment
 * @property string $type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Teacher $teacher
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\SchoolClass $schoolClass
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Grade> $grades
 * @property-read int|null $grades_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereMaxScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment published()
 * @method static \Database\Factories\AssignmentFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'class_id',
        'title',
        'description',
        'instructions',
        'due_date',
        'max_score',
        'attachment',
        'type',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'datetime',
        'max_score' => 'integer',
    ];

    /**
     * Get the teacher that owns the assignment.
     *
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get the subject that owns the assignment.
     *
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the class that owns the assignment.
     *
     * @return BelongsTo
     */
    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the grades for this assignment.
     *
     * @return HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Scope a query to only include published assignments.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}