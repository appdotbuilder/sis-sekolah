<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Grade
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property int|null $assignment_id
 * @property float $score
 * @property string|null $grade
 * @property string $type
 * @property string $semester
 * @property string $academic_year
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\Assignment|null $assignment
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereUpdatedAt($value)
 * @method static \Database\Factories\GradeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'subject_id',
        'assignment_id',
        'score',
        'grade',
        'type',
        'semester',
        'academic_year',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'score' => 'decimal:2',
    ];

    /**
     * Get the student that owns the grade.
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the subject that owns the grade.
     *
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the assignment that owns the grade.
     *
     * @return BelongsTo
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}