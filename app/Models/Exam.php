<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Exam extends Model
    {
        
        use LogsActivity;

        /**
         * User Course relation
         *
         * @var string[]
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        /**
         * User Course relation
         *
         * @var string[]
         */
        public function course()
        {
            return $this->belongsTo(Course::class);
        }

   

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'question',
            'answer',
            'assignment_id',
            'assignment_file',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'question',
            'answer',
            'assignment_id',
            'assignment_file',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }