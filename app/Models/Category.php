<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Category extends Model
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
            'category_code',
            'category_name',
            'category_menu',
            'category_status',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'category_code',
            'category_name',
            'category_menu',
            'category_status',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }