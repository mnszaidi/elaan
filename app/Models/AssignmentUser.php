<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class AssignmentUser extends Model
{

    use LogsActivity;


        /**
         * Category Course relation
         *
         * @var string[]
         */
        public function user(){

            return $this->belongsTo(User::class);
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
