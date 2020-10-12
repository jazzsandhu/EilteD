<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ExcelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        function index(){
            $data = DB::table('event')->oerderBy('event_name', 'DESC')->get();
            return view('dashboard.index',compact('data'));
        }

        //define the validation rules for upload the excel file
        function import(Request $request){
            $this->validate($request,[
                'select_file'       =>  'required|mimes:xls,xlsx'
            ]);
            //store the file path in the variable
            $path = $request->file('select_file')->getRealPath();

            $data = Excel::load($path)->get();

            if($data->count() > 0)
            {
                foreach($data->toArray() as $key => $value){
                    $insert_data[] = array(
                        'id'                =>  $row['id'],
                        'event_name'        =>  $row['event_name'],
                        'event_location'    =>  $row['event_location'],
                        'guest_number'      =>  $row['guest_number'],
                        'event_date'        =>  $row['event_date']
                    );
                }
            }
            if(!empty($insert_data))
            {
                DB::table('event')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel sheet Uploaded Successfully.');
    }
}
