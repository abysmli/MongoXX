<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;

class TestController extends Controller
{
    /**
     * Get RESTful Resource Test
     *
     * @return Response JSON
     */
    public function getTest()
    {
        $result = DB::table('test')->get();
        return response()->json($result);
    }

    /**
     * Add RESTful Resource Test  '' => $_POST[''],
     *
     * @return Response JSON
     */
    public function addTest()
    {
        $result = DB::table('test')->insert([
            'usr_id' => $_POST['usr_id'],
            'usr_subname' => $_POST['usr_subname'],
            'usr_name' => $_POST['usr_name'],
            'usr_created' => DB::raw('CURRENT_TIMESTAMP'),
            'usr_modified' => $_POST['usr_modified'],
            'usr_email' => $_POST['usr_email'],
            'usr_password' => $_POST['usr_password']
            
        ]);
      //  dd($results);
        return response()->json(['result' => $result]);
        //dd($results);
    }

    /**
     * Edit RESTful Resource Test
     *
     * @return Response JSON
     */
    public function editTest()
    {
        $result = DB::table('test')->where('usr_id', $_POST['usr_id'])->update([
            'usr_password' => $_POST['usr_password'],
            'usr_modified' => DB::raw('CURRENT_TIMESTAMP')
    ]);
        //dd($results);
        return response()->json(['result' => $result]);
        //dd($results);
    }

    /**
     * Remove RESTful Resource Test
     *
     * @return Response JSON
     */
    public function removeTest()
    {
        $result = DB::table('test')->where('usr_id', $_POST['usr_id'])->delete();
        //dd($results);
        return response()->json(['result' => $result]);
        //dd($results);
    }



    /**
     * Remove All RESTful Resource Test
     *
     * @return Response JSON
     */
    public function removeAllTest()
    {
        $result = DB::table('test')->truncate();
        //dd($results);
        return response()->json(['result' => $result]);
        //dd($results);
    }
}