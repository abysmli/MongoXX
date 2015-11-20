<?php
use App\User;
use App\Post;
use App\Comment;

// $id = $_ENV['STORMPATH_ID'];
// $secret = $_ENV['STORMPATH_SECRET'];
// \Stormpath\Client::$apiKeyProperties = "apiKey.id=$id\napiKey.secret=$secret";
//$application = \Stormpath\Resource\Application::get($_ENV['STORMPATH_APPLICATION']);

//$app->get(' /', function() {
$app->get('/', function () use ($app) {
    return $app->welcome();
 });
// $app->get('login', function() use ($application) {
//     $url = $spapplication->createIdSiteUrl(['callbackUri'=>'http://localhost:8888/idSiteResponse']);
//     return redirect($url);
// });
// $app->get('logout', function() use ($application) {

//     $url = $application->createIdSiteUrl(['logout'=>true, 'callbackUri'=>'http://localhost:8888/idSiteResponse']);

//     return redirect($url);
// });
// $app->get('register', function() use ($application) {

//     $url = $application->createIdSiteUrl(['path'=>'/#/register','callbackUri'=>'http://localhost:8888/idSiteResponse']);

//     return redirect($url);
// });
// $app->get('forgotPassword', function() use ($application) {

//     $url = $application->createIdSiteUrl(['path'=>'/#/forgot','callbackUri'=>'http://localhost:8888/idSiteResponse']);

//     return redirect($url);
// });

// $app->get('idSiteResponse', function() use ($application) {
//     $response = $application->handleIdSiteCallback($_SERVER['REQUEST_URI']);

//     switch($response->status) {
//         case 'AUTHENTICATED' :
//             Session::put('user', $response->account);
//             Session::flash('notice', 'You have been logged in');
//             return redirect('/');
//             break;
//     }
// });


$app->post('/get_post_by_user', 'DataController@get_post_by_user');
// *1+.获取一个用户（user_id）发布的所有post详细信息
$app->post('/get_postlist_by_user', 'DataController@get_postlist_by_user');

// *2.从post_id反推出用户id (返回obj) 和所有信息（返回array）
$app->post('/get_userid_by_post', 'DataController@get_userid_by_post');
//*2+.POST获取 Post_id 反推 user详细信息 (return array)
$app->post('/get_userlist_by_post', 'DataController@get_userlist_by_post');

// *3.获取一个用户（user_id）所有喜欢的post (user_favourite) 返回array
$app->post('/get_userfavorite_by_user', 'DataController@get_userfavorite_by_user');
//*3+.获取一个用户（user_id）所有喜欢的post (user_favorite)详细信息 返回array
$app->post('/get_userfavoritelist_by_post', 'DataController@get_userfavoritelist_by_post');

// *4.获取一个用户（user_id）所在的Group (user_group) 返回array
$app->post('/get_group_by_user', 'DataController@get_group_by_user');
// *4+.获取一个用户（user_id）所在的Group (user_group) 返回array
$app->post('/get_group_by_user', 'DataController@get_group_by_user');

// *5.从一个group_id 返回所有Users 返回array
$app->post('/get_user_by_group', 'DataController@get_user_by_group');
// *5+.从一个group_id 返回所有Users详细信息 返回array
$app->post('/get_userlist_by_group', 'DataController@get_userlist_by_group');

// *6.从一个post找出所属group
$app->post('/get_group_by_post', 'DataController@get_group_by_post');
// *6+.从一个post找出所属group详细信息
$app->post('/get_grouplist_by_post', 'DataController@get_grouplist_by_post');

// *7.找出一个group中所有post
$app->post('/get_post_by_group', 'DataController@get_post_by_group');
// *7+.找出一个group中所有post详细信息
$app->post('/get_postlist_by_group', 'DataController@get_postlist_by_group');

// *8.从一个post找出所有comment和user信息
$app->post('/get_comment_user_by_post', 'DataController@get_comment_user_by_post');
// *8+.从一个post找出所有comment和user详细信息
$app->post('/get_comment_userlist_by_post', 'DataController@get_comment_userlist_by_post');

// 1. user_table 

$app->post('/get_userlist', 'UserController@getUserlist');

$app->get('/get_user', 'UserController@getUser');

$app->post('/add_user', 'UserController@addUser');

$app->post('/edit_user', 'UserController@editUser');

$app->post('/remove_user', 'UserController@removeUser');

$app->post('/remove_all_user', 'UserController@removeAllUser');

// 2. user_favorite

$app->post('/get_userfavoritelist', 'UserController@getUserfavoritelist');

$app->get('/get_userfavorite', 'UserController@getUserfavorite');

$app->post('/add_userfavorite', 'UserController@addUserfavorite');

$app->post('/edit_userfavorite', 'UserController@editUserfavorite');

$app->post('/remove_userfavorite', 'UserController@removeUserfavorite');

$app->post('/remove_all_userfavorite', 'UserController@removeAllUserfavorite');


// 3. user_post

$app->post('/get_userpostlist', 'UserController@getUserpostlist');

$app->get('/get_userpost', 'UserController@getUserpost');

$app->post('/add_userpost', 'UserController@addUserpost');

$app->post('/edit_userpost', 'UserController@editUserpost');

$app->post('/remove_userpost', 'UserController@removeUserpost');

$app->post('/remove_all_userpost', 'UserController@removeAllUserpost');

// 4. user_group

$app->post('/get_usergrouplist', 'UserController@getUsergrouplist');

$app->get('/get_usergroup', 'UserController@getUsergroup');

$app->post('/add_usergroup', 'UserController@addUsergroup');

$app->post('/edit_usergroup', 'UserController@editUsergroup');

$app->post('/remove_usergroup', 'UserController@removeUsergroup');

$app->post('/remove_all_usergroup', 'UserController@removeAllUsergroup');

//  5.  user_follow

$app->post('/get_userfollowlist', 'UserController@getUserfollowlist');

$app->get('/get_userfollow', 'UserController@getUserfollow');

$app->post('/add_userfollow', 'UserController@addUserfollow');

$app->post('/edit_userfollow', 'UserController@editUserfollow');

$app->post('/remove_userfollow', 'UserController@removeUserfollow');

$app->post('/remove_all_userfollow', 'UserController@removeAllUserfollow');


// <1> group_table 
$app->post('/get_grouplist', 'GroupController@getGrouplist');

$app->get('/get_group', 'GroupController@getGroup');

$app->post('/add_group', 'GroupController@addGroup');

$app->post('/edit_group', 'GroupController@editGroup');

$app->post('/remove_group', 'GroupController@removeGroup');

$app->post('/remove_all_group', 'GroupController@removeAllGroup');

//  (1) post_table

$app->post('/get_postlist', 'PostController@getPostlist');

$app->get('/get_post', 'PostController@getPost');

$app->post('/add_post', 'PostController@addPost');

$app->post('/edit_post', 'PostController@editPost');

$app->post('/remove_post', 'PostController@removePost');

$app->post('/remove_all_post', 'PostController@removeAllPost');

//   (2) post_comment

$app->post('/get_postcommentlist', 'PostController@getPostcommentlist');

$app->get('/get_postcomment', 'PostController@getPostcomment');

$app->post('/add_postcomment', 'PostController@addPostcomment');

$app->post('/edit_postcomment', 'PostController@editPostcomment');

$app->post('/remove_postcomment', 'PostController@removePostcomment');

$app->post('/remove_all_postcomment', 'PostController@removeAllPostcomment');

//   (3) post_group

$app->post('/get_postgrouplist', 'PostController@getPostgrouplist');

$app->get('/get_postgroup', 'PostController@getPostgroup');

$app->post('/add_postgroup', 'PostController@addPostgroup');

$app->post('/edit_postgroup', 'PostController@editPostgroup');

$app->post('/remove_postgroup', 'PostController@removePostgroup');

$app->post('/remove_all_postgroup', 'PostController@removeAllPostgroup');

//   [1] comment_table

$app->post('/get_commentlist', 'CommentController@getCommentlist');

$app->get('/get_comment', 'CommentController@getComment');

$app->post('/add_comment', 'CommentController@addComment');

$app->post('/edit_comment', 'CommentController@editComment');

$app->post('/remove_comment', 'CommentController@removeComment');

$app->post('/remove_all_comment', 'CommentController@removeAllComment');

//   [2] comment_thread_table
 
$app->post('/get_commentthreadlist', 'CommentController@getCommentthreadlist');

$app->get('/get_commentthread', 'CommentController@getCommentthread');

$app->post('/add_commentthread', 'CommentController@addCommentthread');

$app->post('/edit_commentthread', 'CommentController@editCommentthread');

$app->post('/remove_commentthread', 'CommentController@removeCommentthread');

$app->post('/remove_all_commentthread', 'CommentController@removeAllCommentthread');



