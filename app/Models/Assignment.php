<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Assignment extends Model
    {
        
        use LogsActivity;

        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function course(){

            return $this->belongsTo(Course::class);
        }

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'assignment_code',
            'assignment_name',
            'assignment_title',
            'assignment_description',
            'assignment_summary',
            'assignment_file',
            'assignment_status',
            'course_id',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'assignment_code',
            'assignment_name',
            'assignment_title',
            'assignment_description',
            'assignment_summary',
            'assignment_file',
            'assignment_status',
            'course_id',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }