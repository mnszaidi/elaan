<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Course extends Model
    {
        
        use LogsActivity;


        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function tag(){

            return $this->belongsTo(Tag::class);
        }

        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function currency(){

            return $this->belongsTo(Currency::class);
        }

        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function category(){

            return $this->belongsTo(Category::class);
        }

        /*
         *
         * The users that belong to the role.
         */
        public function users(){
            
            return $this->belongsToMany(User::class);
        }



        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function questions(){

            return $this->hasMany(Question::class);
        }

        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function assignment(){

            return $this->hasOne(Assignment::class);
        }

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'course_code',
            'course_name',
            'course_title',
            'course_summary',
            'course_description',
            'course_price',
            'course_shown',
            'course_image',
            'course_status',
            'category_id',
            'tag_id',
            'currency_id',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'course_code',
            'course_name',
            'course_title',
            'course_summary',
            'course_description',
            'course_price',
            'course_shown',
            'course_image',
            'course_status',
            'category_id',
            'tag_id',
            'currency_id',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }