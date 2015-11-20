<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Quotation;

class DataController extends Controller
{
	// *1.获取一个用户（user_id）发布的所有post 
    public function get_post_by_user()
    {
        $getpost_id = DB::table('user_post')->where('user_id','=',$_POST['user_id'])->lists('post_id');

       return response()->json(['post_id'=>$getpost_id]);
    }
        // *1+.获取一个用户（user_id）发布的所有post详细信息 ************测试successed***********
    public function get_postlist_by_user()
    {

        $postlist = DB::table('post_table')->where('user_id','=',$_POST['user_id'])->get();

       return response()->json(['postlist'=>$postlist]);
    }



    //*2. POST获取 Post_id 反推 user id (return obj)
    public function get_userid_by_post()
    {
        $getuserid = DB::table('user_post')->where('post_id','=',$_POST['post_id'])->lists('user_id');

       return response()->json($getuserid);
    }

       //*2+.POST获取 Post_id 反推 user详细信息 (return array)
    //*********需要测试*********
	public function get_userlist_by_post()
	{
		
		$userlist = DB::table('user_table')->join('user_post', function ($join) {
			$join->on('post_id', '=', 'user_post.post_id')
            //->where('user_post.post_id','=',$_POST['post_id']);
            ;   

		})->get();
        
		return response()->json(['userlist'=>$userlist]);
	}

    //*3. 获取一个用户（user_id）所有喜欢的post (user_favorite) 返回array
    public function get_userfavorite_by_user()
    {
        $getpost_id = DB::table('user_favorite')->where('user_id','=',$_POST['user_id'])->lists('post_id');

       return response()->json(['post_id'=>$getpost_id]);
    }
        //*3+.获取一个用户（user_id）所有喜欢的post (user_favorite)详细信息 返回array
    public function get_userfavoritelist_by_post()
    {
    
        $postlist = DB::table('post_table')->join('user_favorite', function ($join) {
            $join->on('post_id', '=', 'user_favorite.post_id')
            ->where('user_id','=',$_POST['user_id']);
        })->get();
        
        return response()->json(['postlist'=>$postlist]);
    }

    // *4.获取一个用户（user_id）所在的Group (user_group) 返回array
    public function get_group_by_user()
    {
        $getgroup_id = DB::table('user_group')->where('user_id','=',$_POST['user_id'])->lists('group_id');

       return response()->json(['group_id'=>$getgroup_id]);
    }
        // *4+.获取一个用户（user_id）所在的Group详细信息(user_group) 返回array
    public function get_grouplist_by_user()
    {
    
        $grouplist = DB::table('user_table')->join('user_group', function ($join) {
            $join->on('group_id', '=', 'user_group.group_id')
            ->where('user_id','=',$_POST['user_id']);
        })->get();
        
        return response()->json(['grouplist'=>$grouplist]);
    }


    // *5.从一个group_id 返回所有Users 返回array
    public function get_user_by_group()
    {
        $getuser_id = DB::table('user_group')->where('group_id','=',$_POST['group_id'])->lists('user_id');

       return response()->json(['user_id'=>$getuser_id]);
    }
        // *5+.从一个group_id 返回所有Users详细信息 返回array  (*******需要测试**********)
        public function get_userlist_by_group()
    {
    
        $userlist = DB::table('user_table')->join('user_group', function ($join) {
            $join->on('group_id', '=', 'user_group.group_id')
            ->where('group_id','=',$_POST['group_id']);
        })->get();
        
        return response()->json(['userlist'=>$userlist]);
    }

    // *6.从一个post找出所属group
    public function get_group_by_post()
    {
        $getgroup_id = DB::table('post_group')->where('post_id','=',$_POST['post_id'])->lists('group_id');
        return response()->json(['group_id'=>$getgroup_id]);

    }
        // *6+.从一个post找出所属group详细信息
        public function get_grouplist_by_post()
    {
    
        $grouplist = DB::table('group_table')->join('post_group', function ($join) {
            $join->on('group_id', '=', 'post_group.group_id')
            ->where('post_id','=',$_POST['post_id']);
        })->get();
        
        return response()->json(['grouplist'=>$grouplist]);
    }




    // *7.找出一个group中所有post
    public function get_post_by_group()
    {
        $getpost_id = DB::table('post_group')->where('group_id','=',$_POST['group_id'])->lists('post_id');
        return response()->json(['post_id'=>$getpost_id]);        
    }
        // *7+.找出一个group中所有post (*******需要测试**********)
    public function get_postlist_by_group()
    {
    
        $postlist = DB::table('post_table')->join('post_group', function ($join) {
            $join->on('group_id', '=', 'post_group.group_id')
            ->where('group_id','=',$_POST['group_id']);
        })->get();
        
        return response()->json(['postlist'=>$postlist]);
    }
    // *8.从一个post找出所有comment_id和user_id信息, **************comment_thread_id 一定等于post_id?**********
    public function get_comment_user_by_post()
    {
        $getuserid = DB::table('user_post')->where('post_id','=',$_POST['post_id'])->lists('user_id');

        $getcomment_id = DB::table('comment_table')->where('comment_thread_id','=',$_POST['post_id'])->lists('comment_id');
        
        return response()->json(['comment_id'=>$getcomment_id,'user_id'=>$getuserid]);
    }
        // *8+.从一个post找出所有comment和user详细信息, **************comment_thread_id 一定等于post_id?**********
    public function get_comment_userlist_by_post()
    {
        $userlist = DB::table('user_table')->join('user_post', function ($join) {
            $join->on('post_id', '=', 'user_post.post_id')
            ->where('post_id','=',$_POST['post_id']);
        })->get();
        $commentlist = DB::table('comment_table')->join('post_comment', function ($join) {
            $join->on('post_id', '=', 'post_comment.post_id')
            ->where('post_id','=',$_POST['post_id']);
        })->get();
        
        return response()->json(['commentlist'=>$commentlist,'userlist'=>$userlist]);

    }



}
