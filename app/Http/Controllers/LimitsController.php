<?php

namespace App\Http\Controllers;

use App\Limits;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use Illuminate\Support\Facades\DB;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Input;
/*use Illuminate\Validation\Validate;*/

class LimitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $validate = Validator::make($request->all(), [
            'activity_id'=>'required', 
            'g-recaptcha-response' => new Captcha(), 
        ]);

       
         
            $activity_id= $request->get('activity_id');
        //print_r($activity_name);exit;
        if ($activity_id != null) {
            $limits = Limits::select(['activity_id', 
                                'activity_name', 
                                'start_date', 
                                'end_date',
                                DB::raw('DATEDIFF(end_date, NOW()) AS days')
                                ])->where('activity_id','=',$activity_id)->paginate(3);
            $limitmessage = $limits->count();

            if ($limitmessage==0) {
                echo "<script>alert('Código CIIU inexistente')</script>";
                $limits = Limits::select(['activity_id', 
                                'activity_name', 
                                'start_date', 
                                'end_date',
                DB::raw('DATEDIFF(end_date, NOW()) AS days')])->paginate(3);
            }
        }else{
            $limits = Limits::select(['activity_id', 
                                'activity_name', 
                                'start_date', 
                                'end_date',
                                DB::raw('DATEDIFF(end_date, NOW()) AS days')])->paginate(3);
        }

        return view('CIIU.index',compact('limits'));
    }

}
