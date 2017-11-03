<?php

namespace App\Rules;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class checkRefId implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        
        $refids = DB::table('refs') ->pluck('ref_id') -> toArray();
        
                // ->select('ref_id' , 'used')
                // ->where('used', 1)
                // ->get()
                // ->toArray();
        if(in_array($value, $refids))
        {
            DB::table('refs')
            ->where('ref_id' , $value) 
            -> update(['used' => 0]);
            return true;

        }
    
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Reference Id does not match.';
    }
}
