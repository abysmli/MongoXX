<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;

class CommentController extends Controller
{
    /**
     *[1] Comment_table 
     */
    public function getCommentlist()
    {
        $result = DB::table('comment_table')->where('comment_id', $_POST['comment_id'])->get();
        return response()->json($result);
    }

        public function getComment()
    {
        $result = DB::table('comment_table')->get();
        return response()->json($result);
    }
    
    
    
    public function addComment()
    {
        $result = DB::table('comment_table')->insert([
            'comment_id' => $_POST['comment_id'],
            'user_id' => $_POST['user_id'],
            'comment_content' => $_POST['comment_content'],
            'comment_thread_id' => $_POST['comment_thread_id'],
            'insert_date' => DB::raw('CURRENT_TIMESTAMP'),
            'update_at' => $_POST['update_at'],           
        ]);
        return response()->json(['result' => $result]);
    }

    public function editComment()
    {
        $result = DB::table('comment_table')->where('comment_id', $_POST['comment_id'])->update([
            'user_id' => $_POST['user_id'],
            'comment_content' => $_POST['comment_content'],
            'comment_thread_id' => $_POST['comment_thread_id'],
            'update_at' => DB::raw('CURRENT_TIMESTAMP'),
    ]);  
        return response()->json(['result' => $result]);
    }
    

    public function removeComment()
    {
        $result = DB::table('comment_table')->where('comment_id', $_POST['comment_id'])->delete();
        return response()->json(['result' => $result]);
    }

    public function removeAllComment()
    {
        $result = DB::table('comment_table')->truncate();
        return response()->json(['result' => $result]);
    }

     // [2] Comment_thread_table 
    
    public function getCommentthreadlist()
    {
        $result = DB::table('comment_thread_table')->where('comment_id', $_POST['comment_id'])->get();
        return response()->json($result);
    }

        public function getCommentthread()
    {
        $result = DB::table('comment_thread_table')->get();
        return response()->json($result);
    }
    
    
    
    public function addCommentthread()
    {
        $result = DB::table('comment_thread_table')->insert([
            'comment_thread_id' => $_POST['comment_thread_id'],
            'insert_date' => DB::raw('CURRENT_TIMESTAMP'),
            'update_at' => $_POST['update_at'],           
        ]);
        return response()->json(['result' => $result]);
    }

    public function editCommentthread()
    {
        $result = DB::table('comment_thread_table')->where('comment_thread_id', $_POST['comment_thread_id'])->update([
            'update_at' => DB::raw('CURRENT_TIMESTAMP'),
    ]);  
        return response()->json(['result' => $result]);
    }
    

    public function removeCommentthread()
    {
        $result = DB::table('comment_thread_table')->where('comment_thread_id', $_POST['comment_thread_id'])->delete();
        return response()->json(['result' => $result]);
    }

    public function removeAllCommentthread()
    {
        $result = DB::table('comment_thread_table')->truncate();
        return response()->json(['result' => $result]);
    }

}
