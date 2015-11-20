<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;

class PostController extends Controller
{

    // (1). post_table 

    public function getPostlist()
    {
        $result = DB::table('post_table')->where('post_id', $_POST['post_id'])->get();
        return response()->json($result);
    }

        public function getPost()
    {
        $result = DB::table('post_table')->get();
        return response()->json($result);
    }
    
    
    
    public function addPost()
    {
        $id = DB::table('post_table')->insertGetId([
            
            'post_title' => $_POST['post_title'],
            'post_content' => $_POST['post_content'],
            'post_imgs' => $_POST['post_imgs'],
            'post_tags' => $_POST['post_tags'],
         
        ]);
        DB::table('user_post')->insert([
            'user_id' => $_POST['user_id'],
            'post_id' => $id,
        ]);
        
        return response()->json(['result' => $result]);
    }

    public function editPost()
    {
        $result = DB::table('post_table')->where('post_id', $_POST['post_id'])->update([
            'post_title' => $_POST['post_title'],
            'post_content' => $_POST['post_content'],
            'post_imgs' => $_POST['post_imgs'],
            'post_tags' => $_POST['post_tags'],
            'update_at' => DB::raw('CURRENT_TIMESTAMP'),
    ]);  
        return response()->json(['result' => $result]);
    }
    

    public function removePost()
    {
        $result = DB::table('post_table')->where('post_id', $_POST['post_id'])->delete();
        return response()->json(['result' => $result]);
    }

    public function removeAllPost()
    {
        $result = DB::table('post_table')->truncate();
        return response()->json(['result' => $result]);
    }

    // (2). post_comment
    
        public function getPostcommentlist()
    {
        $result = DB::table('post_comment')->where('post_id', $_POST['post_id'])->get();
        return response()->json($result);
    }

        public function getPostcomment()
    {
        $result = DB::table('post_comment')->get();
        return response()->json($result);
    }
    
    
    
    public function addPostcomment()
    {
        $result = DB::table('post_comment')->insert([
            'post_id' => $_POST['post_id'],
            'comment_thread_id' => $_POST['comment_thread_id'],
      
        ]);
        return response()->json(['result' => $result]);
    }

    public function editPostcomment()
    {
        $result = DB::table('post_comment')->where('post_id', $_POST['post_id'])->update([
            'comment_thread_id' => $_POST['comment_thread_id'],
    ]);  
        return response()->json(['result' => $result]);
    }
    

    public function removePostcomment()
    {
        $result = DB::table('post_comment')->where('post_id', $_POST['post_id'])->delete();
        return response()->json(['result' => $result]);
    }

    public function removeAllPostcomment()
    {
        $result = DB::table('post_comment')->truncate();
        return response()->json(['result' => $result]);
    }
    
    // (3). post_group
    
        public function getPostgrouplist()
    {
        $result = DB::table('post_group')->where('post_id', $_POST['post_id'])->get();
        return response()->json($result);
    }

        public function getPostgroup()
    {
        $result = DB::table('post_group')->get();
        return response()->json($result);
    }
    
    
    
        public function addPostgroup()
    {
        $result = DB::table('post_group')->insert([
            'post_id' => $_POST['post_id'],
            'group_id' => $_POST['group_id'],
      
        ]);
        return response()->json(['result' => $result]);
    }

        public function editPostgroup()
    {
        $result = DB::table('post_group')->where('post_id', $_POST['post_id'])->update([
            'group_id' => $_POST['group_id'],
    ]);  
        return response()->json(['result' => $result]);
    }
    

        public function removePostgroup()
    {
        $result = DB::table('post_group')->where('post_id', $_POST['post_id'])->delete();
        return response()->json(['result' => $result]);
    }

        public function removeAllPostgroup()
    {
        $result = DB::table('post_group')->truncate();
        return response()->json(['result' => $result]);
    }
    
}
