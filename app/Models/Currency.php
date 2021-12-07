<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Activitylog\Traits\LogsActivity;

    class Currency extends Model
    {
        
        use LogsActivity;

        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function course(){

            return $this->hasOne(Course::class);
        }

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected $fillable = [
            'currency_code',
            'currency_name',
            'currency_symbol',
            'currency_status',
            'created_by'
        ];

        /**
         * The attributes that are mass assignable.
         *
         * @var string[]
         */
        protected static $logAttributes = [
            'currency_code',
            'currency_name',
            'currency_symbol',
            'currency_status',
            'created_by'
        ];


        use SoftDeletes;
		protected $guarded = ['id'];
	    protected $dates = ['deleted_at'];


    }