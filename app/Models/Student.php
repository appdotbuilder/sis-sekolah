<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $class_id
 * @property string $nis
 * @property string $nisn
 * @property \Illuminate\Support\Carbon $birth_date
 * @property string $birth_place
 * @property string $gender
 * @property string|null $address
 * @property string $parent_name
 * @property string $parent_phone
 * @property string|null $parent_email
 * @property \Illuminate\Support\Carbon $enrollment_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User $user
 * @property-read \App\Models\SchoolClass|null $schoolClass
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Grade> $grades
 * @property-read int|null $grades_count
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEnrollmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereParentEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereParentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereParentPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student active()
 * @method static \Database\Factories\StudentFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'class_id',
        'nis',
        'nisn',
        'birth_date',
        'birth_place',
        'gender',
        'address',
        'parent_name',
        'parent_phone',
        'parent_email',
        'enrollment_date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'enrollment_date' => 'date',
    ];

    /**
     * Get the user that owns the student.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the class that the student belongs to.
     *
     * @return BelongsTo
     */
    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the grades for this student.
     *
     * @return HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Scope a query to only include active students.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}