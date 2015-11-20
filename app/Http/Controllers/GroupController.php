<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;

class GroupController extends Controller
{
    /**
     *<1> Group_table 
     */
    public function getGrouplist()
    {
        $result = DB::table('group_table')->where('user_id', $_POST['user_id'])->get();
        return response()->json($result);
    }

        public function getGroup()
    {
        $result = DB::table('group_table')->get();
        return response()->json($result);
    }

    public function addGroup()
    {
        $result = DB::table('group_table')->insert([
            'group_id' => $_POST['group_id'],
            'group_title' => $_POST['group_title'],
            'group_base' => $_POST['group_base'],
            'group_imgs' => $_POST['group_imgs'],
            'group_tags' => $_POST['group_tags'],
            'insert_date' => DB::raw('CURRENT_TIMESTAMP'),
            'update_at' => $_POST['update_at'],

            
        ]);

        return response()->json(['result' => $result]);

    }


    public function editGroup()
    {
        $result = DB::table('group_table')->where('group_id', $_POST['group_id'])->update([
            'group_title' => $_POST['group_title'],
            'group_base' => $_POST['group_base'],
            'group_imgs' => $_POST['group_imgs'],
            'group_tags' => $_POST['group_tags'],
            'update_at' => DB::raw('CURRENT_TIMESTAMP'),
    ]);

        return response()->json(['result' => $result]);

    }
    

    public function removeGroup()
    {
        $result = DB::table('group_table')->where('group_id', $_POST['group_id'])->delete();

        return response()->json(['result' => $result]);

    }


    public function removeAllGroup()
    {
        $result = DB::table('group_table')->truncate();

        return response()->json(['result' => $result]);

    }
    
    
}



















