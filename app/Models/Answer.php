<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Answer extends Model
    {
        
        use LogsActivity;


        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function question(){

            return $this->belongsTo(Question::class);
        }

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'answer_no',
            'answer',
            'answer_status',
            'question_id',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'answer_no',
            'answer',
            'answer_status',
            'question_id',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }