<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property int $user_id
 * @property string $nip
 * @property string $specialization
 * @property string|null $qualifications
 * @property \Illuminate\Support\Carbon $hire_date
 * @property float|null $salary
 * @property string|null $address
 * @property bool $is_homeroom_teacher
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Schedule> $schedules
 * @property-read int|null $schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereHireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereIsHomeroomTeacher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereQualifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher active()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher homeroom()
 * @method static \Database\Factories\TeacherFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'nip',
        'specialization',
        'qualifications',
        'hire_date',
        'salary',
        'address',
        'is_homeroom_teacher',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'hire_date' => 'date',
        'salary' => 'decimal:2',
        'is_homeroom_teacher' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user that owns the teacher.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the schedules for this teacher.
     *
     * @return HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get the assignments for this teacher.
     *
     * @return HasMany
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Scope a query to only include active teachers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include homeroom teachers.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHomeroom($query)
    {
        return $query->where('is_homeroom_teacher', true);
    }
}