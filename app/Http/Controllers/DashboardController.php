<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image,File,Redirect,Validator;
use App\Entities\Clubs;
use App\Entities\Leaguages;
use App\Entities\Matchs;
use Carbon\Carbon;


class DashboardController extends BaseController
{
    public function dashboard(){
      return view ('dashboard.create_team');
    }

    public function createClub(){
      return view ('dashboard.create_club');
    }

    public function createMatch(){

      $clubs = Clubs::select('id','name')->orderBy('name')->get();
      $leaguages = Leaguages::select('id','name')->orderBy('name')->get();


      return view('dashboard.create_match',['clubs'=>$clubs,'leaguages'=>$leaguages]);
    }

    public function createLeaguage(){
      return view('dashboard.create_leaguage');
    }

    public function addLeaguage(){
      $validator = Validator::make(Input::all(),[
          'name'=>'required',
          'logo'=>'required',
          'image_cover'=>'required'
      ]);

      if($validator->fails()){
        return Redirect::back()->with('error','Định dạng input không hợp lệ');
      }
      else{
          try{
            $leaguage  = new Leaguages();
            $leaguage->name = Input::get('name');
            $leaguage->logo_url = Input::get('logo');
            $leaguage->image_cover = Input::get('image_cover');
            $leaguage->save();
            return Redirect::back()->with('status','handle_success');
          }catch(\Illuminate\Database\QueryException $ex){
            return Redirect::back()->with('error',$ex->getMessage());
          }

      }
    }

    public function listClub(){
      $clubs = Clubs::select('name','logo_url')->orderBy('name')->get();
      return  view('dashboard.list_club',['clubs'=>$clubs]);
    }


    public function listMatch(){
      $matchs = Matchs::select('id','name','leaguage_id','team_1','team_2','date_start','status')->orderBy('date_start')->get();
      foreach($matchs as $match){
        $leaguage = Leaguages::where('id',$match->leaguage_id)->select('name','logo_url')->first();
        $match->leaguage_name = isset($leaguage->name)?$leaguage->name:'Chưa xác định được tên giải đấu';
        $match->leaguage_logo = isset($leaguage->logo_url)?$leaguage->logo_url :null;
        $team_1 =Clubs::where('id',$match->team_1)->select('name')->first();
        $match->team_1_name = isset($team_1->name)?$team_1->name:'Tên đội nhà chưa xác định';
        $team_2 = Clubs::where('id',$match->team_2)->select('name')->first();
        $match->team_2_name = isset($team_2->name)?$team_2->name:'Tên đội khách chưa xác định';
        $match->date_start = date('d-m-Y h:i A',strtotime($match->date_start));
      }
      return view ('dashboard.list_match',['matchs'=>$matchs]);
    }

    public function listLeaguage(){
      $leaguages = Leaguages::select('logo_url','name')->orderBy('name')->get();
      return  view ('dashboard.list_leaguage',['leaguages'=>$leaguages]);
    }


    //Handle action

    public function addClub(){
      $validator = Validator::make(Input::all(),[
          'name'=>'required',
          'logo'=>'required'
      ]);

      if($validator->fails()){
          return Redirect::back()->with('error','Định dạng input không hợp lệ');
      }else{
        try{
          $club  = new Clubs();
          $club->name = Input::get('name');
          $club->logo_url = Input::get('logo');
          $club->save();
          return Redirect::back()->with('status','handle_success');
        }catch(\Illuminate\Database\QueryException $ex){
          return Redirect::back()->with('error',$ex->getMessage());
        }

      }
    }

    public function addMatch(){
      $input = Input::all();
      $validator = Validator::make(Input::all(),[
          'name'=>'required',
          'id_team_a'=>'required',
          'id_team_b'=>'required',
          'leaguage_id'=>'required',
          'date_start'=>'required'
      ]);
      if($validator->fails()){
        return Redirect::back()->with('error','Định dạng input không hợp lệ');
      }else{
        try{
          $match = new Matchs();
          $match->name = $input['name'];
          $match->alias = str_slug($input['name']);
          $match->team_1 = $input['id_team_a'];
          $match->team_2 = $input['id_team_b'];
          $match->leaguage_id = $input['leaguage_id'];
          $match->date_start =  Carbon::parse($input['date_start']);
          $match->save();
          return Redirect::back()->with('status','handle_success');
        }catch(\Illuminate\Database\QueryException $ex){
          return Redirect::back()->with('error',$ex->getMessage());
        }
      }

    }

    public function changeMatchStatus(){
      $input = Input::all();
        try{
          Matchs::where('id',$input['match_id'])->update(['status'=>$input['status_val']]);
          return 1;

        }catch(\Exception $ex){
          return array(
            'status'=>'error',
            'message'=>$ex.getMessage()
          );
        }
    }

    public function deleteMatch($match_id){
      try{
        Matchs::where('id',$match_id)->delete();
        return Redirect::back();
      }catch(\Exception $ex){
        echo $ex.getMessage();
      }
    }

    //Shell - execute

    public function shellExec(){
      return view ('dashboard.shell_exec');
    }

    public function exec(){
      $input = Input::all();
      $cmd = 'ffmpeg -re -y -user_agent "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/59.0.3071.109 Chrome/59.0.3071.109 Safari/537.36" -i "'. $input['file_path'] . '" -bsf:a aac_adtstoasc -c copy -flags global_header -f flv rtmp://a.rtmp.youtube.com/live2/42y0-ck21-j1gr-7v19';
      $this->liveExecuteCommand($cmd);

    }

    public function liveExecuteCommand($cmd)
    {

        while (@ ob_end_flush()); // end all output buffers if any

        $proc = popen("$cmd 2>&1 ; echo Exit status : $?", 'r');

        $live_output     = "";
        $complete_output = "";

        while (!feof($proc))
        {
            $live_output     = fread($proc, 4096);
            $complete_output = $complete_output . $live_output;
            echo "$live_output" . "</br>";
            @ flush();
        }

        pclose($proc);

        // get exit status
        preg_match('/[0-9]+$/', $complete_output, $matches);

        // return exit status and intended output
        return array (
            'exit_status'  => intval($matches[0]),
            'output'       => str_replace("Exit status : " . $matches[0], '', $complete_output)
         );
    }
}
