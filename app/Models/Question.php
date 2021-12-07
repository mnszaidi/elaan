<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Question extends Model
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
         * relation
         *
         * @var string[]
         */
        public function answers(){

            return $this->hasMany(Answer::class);
        }


        // this is a recommended way to declare event handlers
        public static function boot() {
            parent::boot();

            static::deleting(function($question) { // before delete() method call this
                 $question->answers()->delete();
                 // do the rest of the cleanup...
            });
        }

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'question',
            'course_id',
            'question_status',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'question',
            'course_id',
            'question_status',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }