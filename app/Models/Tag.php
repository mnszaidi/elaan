<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Tag extends Model
    {
        
        use LogsActivity;


        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function courses(){

            return $this->hasMany(Course::class);
        }

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'tag_code',
            'tag_name',
            'tag_status',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'tag_code',
            'tag_name',
            'tag_status',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }