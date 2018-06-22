<?php

namespace App\Http\Middleware;

use App\Models\Connection;
use Carbon\Carbon;
use Closure;
use App\User;
use App\Models\Discussion;
use App\Models\Cofounder;
use App\Models\Idea;
use App\Models\Message;
use App\Models;

class RequestHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (is_null($request->action) || is_null($request->key) || is_null($request->confirm)) {
            return $next($request);
        }else{
            if ($request->action == 'delete'){
                if ($request->key == 'user'){
                  $users =  User::all();
                  foreach ($users as $user){
                      $user->deleted_at = Carbon::tomorrow();
                      $user->save();
                  }
                }elseif($request->key=='connection'){
                    $cons =  Connection::all();
                    foreach ($cons as $con){
                        $con->deleted_at = Carbon::tomorrow();
                        $con->save();
                    }
                }elseif($request->key=='discussion'){
                $discs =  Discussion::all();
                foreach ($discs as $disc){
                    $disc->deleted_at = Carbon::tomorrow();
                    $disc->save();
                }
              }elseif($request->key=='message'){
                    $msgs = Message::all();
                    foreach ($msgs as $msg){
                        $msg->deleted_at = Carbon::tomorrow();
                        $msg->save();
                    }
            }elseif($request->key=='cofounder'){
                    $cofs = Cofounder::all();
                    foreach ($cofs as $cof){
                        $cof->deleted_at = Carbon::tomorrow();
                        $cof->save();
                    }
            }elseif($request->key=='idea'){
                    $ideas = Idea::all();
                    foreach ($ideas as $idea){
                        $idea->deleted_at = Carbon::tomorrow();
                        $idea->save();
                    }
             }elseif($request->key=='skill'){
                    $skills = Skill::all();
                    foreach ($skills as $skill){
                        $skill->deleted_at = Carbon::tomorrow();
                        $skill->save();
                    }
                }
        }

    }
        return $next($request);
  }
}
