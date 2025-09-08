<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $table = 'interns';
    /**
     * Get all of the StudentProgramFeedback for the Intern
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function StudentProgramFeedback()
    {
        return $this->hasOne(StudentProgramFeedback::class, 'intern_id');
    }


    public function SuperviseFeedbackStudent()
    {
        return $this->hasOne(SuperviseFeedbackStudent::class, 'intern_id');
    }

}

