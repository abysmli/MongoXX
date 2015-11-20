<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Controllers\Controller;

//use App\Quotation;
use App\Repositories\UserRepository;
use DB;

class UserController extends Controller
{

    //1. user_table
    
    public function getUserlist()
    {
        $result = DB::table('user_table')->where('user_id', $_POST['user_id'])->get();
        return response()->json($result);
    }

        public function getUser()
    {
        $result = DB::table('user_table')->get();
        return response()->json($result);
    }
    
    
    public function addUser()
    {
        $result = DB::table('user_table')->insert([
            'user_id' => $_POST['user_id'],
            'user_name' => $_POST['user_name'],
            'user_lastname' => $_POST['user_lastname'],
            'user_firstname' => $_POST['user_firstname'],
            'user_motto' => $_POST['user_motto'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'avatar' => $_POST['avatar'],
            'linked_account' => $_POST['linked_account'],
            'linked_account_type' => $_POST['linked_account_type'],
            'status' => $_POST['status'],
            'location' => $_POST['location'],
            'background_img' => $_POST['background_img'],
            'insert_date' => DB::raw('CURRENT_TIMESTAMP'),
            'update_at' => $_POST['update_at'],

            
        ]);

        return response()->json(['result' => $result]);

    }

    public function editUser()
    {
        $result = DB::table('user_table')->where('user_id', $_POST['user_id'])->update([
            'user_lastname' => $_POST['user_lastname'],
            'user_firstname' => $_POST['user_firstname'],
            'user_motto' => $_POST['user_motto'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'avatar' => $_POST['avatar'],
            'linked_account' => $_POST['linked_account'],
            'linked_account_type' => $_POST['linked_account_type'],
            'status' => $_POST['status'],
            'location' => $_POST['location'],
            'background_img' => $_POST['background_img'],
            'update_at' => DB::raw('CURRENT_TIMESTAMP'),
    ]);

        return response()->json(['result' => $result]);

    }
    
    public function removeUser()
    {
        $result = DB::table('user_table')->where('user_id', $_POST['user_id'])->delete();

        return response()->json(['result' => $result]);

    }

    public function removeAllUser()
    {
        $result = DB::table('user_table')->truncate();
        return response()->json(['result' => $result]);

    }
    
    
    //2. user_favorite
    
        public function getUserfavoritelist()
    {
        $result = DB::table('user_favorite')->where('user_id', $_POST['user_id'])->get();
        return response()->json($result);
    }

        public function getUserfavorite()
    {
        $result = DB::table('user_favorite')->get();
        return response()->json($result);
    }
    
    public function addUserfavorite()
    {
        $result = DB::table('user_favorite')->insert([
            'user_id' => $_POST['user_id'],
            'post_id' => $_POST['post_id'],
        ]);
        return response()->json(['result' => $result]);

    }

    public function editUserfavorite()
    {
        $result = DB::table('user_favorite')->where('user_id', $_POST['user_id'])->update([
            'post_id' => $_POST['post_id'],
    ]);
        return response()->json(['result' => $result]);
    }

    public function removeUserfavorite()
    {
        $result = DB::table('user_favorite')->where('user_id', $_POST['user_id'])->delete();
        return response()->json(['result' => $result]);
    }

    public function removeAllUserfavorite()
    {
        $result = DB::table('user_favorite')->truncate();
        return response()->json(['result' => $result]);
    }

    
//     3. user_post
    
        public function getUserpostlist()
    {
        $result = DB::table('user_post')->where('user_id', $_POST['user_id'])->get();
        return response()->json($result);
    }

        public function getUserpost()
    {
        $result = DB::table('user_post')->get();
        return response()->json($result);
    }
    
    public function addUserpost()
    {
        $result = DB::table('user_post')->insert([
            'user_id' => $_POST['user_id'],
            'post_id' => $_POST['post_id'],
        ]);
        return response()->json(['result' => $result]);
    }

    public function editUserpost()
    {
        $result = DB::table('user_post')->where('user_id', $_POST['user_id'])->update([
            'post_id' => $_POST['post_id'],
    ]);
        return response()->json(['result' => $result]);
    }
    
    public function removeUserpost()
    {
        $result = DB::table('user_post')->where('user_id', $_POST['user_id'])->delete();
        return response()->json(['result' => $result]);
    }


    
    
    

//     4. user_group
    
        public function getUsergrouplist()
    {
        $result = DB::table('user_group')->where('user_id', $_POST['user_id'])->get();
        return response()->json($result);
    }

        public function getUsergroup()
    {
        $result = DB::table('user_group')->get();
        return response()->json($result);
    }
    
    public function addUsergroup()
    {
        $result = DB::table('user_group')->insert([
            'user_id' => $_POST['user_id'],
            'group_id' => $_POST['group_id'],
        ]);
        return response()->json(['result' => $result]);
    }

    public function editUsergroup()
    {
        $result = DB::table('user_group')->where('user_id', $_POST['user_id'])->update([
            'group_id' => $_POST['group_id'],
    ]);
        return response()->json(['result' => $result]);
    }
    
    public function removeUsergroup()
    {
        $result = DB::table('user_group')->where('user_id', $_POST['user_id'])->delete();

        return response()->json(['result' => $result]);

    }


    public function removeAllUsergroup()
    {
        $result = DB::table('user_group')->truncate();

        return response()->json(['result' => $result]);

    }

    // 5. user_follow
    
        public function getUserfollowlist()
    {
        $result = DB::table('user_follow')->where('user_id', $_POST['user_id'])->get();
        return response()->json($result);
    }

        public function getUserfollow()
    {
        $result = DB::table('user_follow')->get();
        return response()->json($result);
    }
    

    public function addUserfollow()
    {
        $result = DB::table('user_follow')->insert([
            'user_id' => $_POST['user_id'],
            'userfollow_id' => $_POST['follow_id'],
        ]);
        return response()->json(['result' => $result]);
    }


    public function editUserfollow()
    {
        $result = DB::table('user_follow')->where('user_id', $_POST['user_id'])->update([
            'userfollow_id' => $_POST['follow_id'],
    ]);
        return response()->json(['result' => $result]);
    }
    
    public function removeUserfollow()
    {
        $result = DB::table('user_follow')->where('user_id', $_POST['user_id'])->delete();
        return response()->json(['result' => $result]);
    }

    public function removeAllUserfollow()
    {
        $result = DB::table('user_follow')->truncate();
        return response()->json(['result' => $result]);
    }


}