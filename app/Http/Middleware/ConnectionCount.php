<?php

namespace App\Http\Middleware;

use Closure;
use App\ConnectionCount as ConnectionCountModel;

class ConnectionCount
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
        session_start();
        if( !isset($_SESSION['counted']) ){
            $_SESSION['counted'] = "value";

            $date = date("Y-m-d");
            if(count(ConnectionCountModel::where('date','=',$date)->get()) == 0){
                $data = new ConnectionCountModel();
                $data->date = $date;
                $data->connection_count = 1;
                $data->save();
            }
            else{
                $count = ConnectionCountModel::where('date','=',$date)
                    ->value('connection_count');
                ConnectionCountModel::where('date','=',$date)
                    ->update(['connection_count' => ($count+1)]);
            }
        }
        return $next($request);
    }
}
