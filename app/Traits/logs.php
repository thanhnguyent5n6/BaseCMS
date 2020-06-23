<?php
/**
 *File name : Logs.php  / Date: 3/26/2018 - 8:57 AM
 *Code Owner: Tke
 */

namespace App\Models\Access\GeneralTraits;

use Auth;
use Carbon\Carbon;
use stdClass;

trait Logs
{

    public function createLog($action, $params = array())
    {
        $logs = $this->getLogs();
        // $app = get_client_ip();
        // $new_log = $app->make('stdClass');

        $new_log = new stdClass();
        $new_log->user_id = Auth::check() ? Auth::user()->id : 0;
        $new_log->action = $action;
        $new_log->time = Carbon::now()->timestamp;
        $new_log->ip = get_client_ip();
        $new_log->agent = get_client_agent();
        foreach ($params as $key => $value) {
            $new_log->$key = $value;
        }
        array_push($logs, $new_log);

        $this->logs = json_encode(array_values($logs));
        $this->update(['logs' => $this->logs]);

        return $this;
    }


    public function createLogDelete($params = array()){
        $logs = $this->getLogs();
//        $app = app();
//        $new_log = $app->make('stdClass');

        $new_log = new stdClass();
        $new_log->user_id = Auth::user()->id;
        $new_log->action = 'DELETED';
        $new_log->time = Carbon::now()->timestamp;
        $new_log->ip = get_client_ip();
        $new_log->agent = get_client_agent();

        foreach ($params as $key => $value) {
            $new_log->$key = $value;
        }
        array_push($logs, $new_log);

        $this->logs = json_encode(array_values($logs));
        $this->update(['logs' => $this->logs]);

        return $this;
    }


    public function getLogs()
    {
        if (!isset($this->logs) || is_null($this->logs) || trim($this->logs, " ") == "") {
            return array();
        }

        return is_array($this->logs) ? $this->logs : json_decode($this->logs);
    }

    public function createLogAttributes($action, $params = array())
    {
        $fillable_logs = $this->fillable_logs;

        // make content logs
        $content = array();
        foreach ($fillable_logs as $attribute) {
            $content[$attribute] = $this->$attribute;
        }

        $this->createLog($action, array_merge($content, $params));

        return $this;
    }

    public static function getSingleLogData($action , $user_id = 0){
//        $app = app();
//        $new_log = $app->make('stdClass');

        $new_log = new stdClass();
        $new_log->user_id = isset(Auth::user()->id) ? Auth::user()->id : $user_id;
        $new_log->action = $action;
        $new_log->time = Carbon::now()->timestamp;
        $new_log->ip = get_client_ip();
        $new_log->agent = get_client_agent();

        return json_encode(array_values(array($new_log)));
    }
}