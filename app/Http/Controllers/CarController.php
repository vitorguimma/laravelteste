<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CarController extends Controller
{
    public function all(Request $request){
      if($request->session()->has('db')){
        return json_encode($request->session()->get('db'));
      }
      return json_encode(array());
    }

    public function create(Request $request){
        $unid = uniqid(rand(),true);
        $car = array('unid'=>$unid,'marca'=>'ford');
        $request->session()->put('db.'.$unid, $car);
        return $unid;
    }

    public function get(Request $request, $unid){
        if($request->session()->has('db.'.$unid)){
            return json_encode($request->session()->get('db.'.$unid));
        }
        return json_encode(array());
    }

    public function update(Request $request,$unid){
        $status = false;
        if($request->session()->has('db.'.$unid)){
            $car = array('unid'=>$unid,'marca'=>'fiesta');
            $request->session()->put('db.'.$unid,$car);
            $status = true;
        }
        return $status;
    }

    public function delete(Request $request, $unid){
        //$request->session()->flush();
        $status = false;
        if($request->session()->has('db.'.$unid)){
            $request->session()->forget('db.'.$unid);
            $status = true;
        }
        return $status;
    }

    public function all_category(){
      return json_encode(array(
              'Ford'=>array('Focus','Fiesta'),
              'Chevrolet'=>array('Fiat','Agile'),
              'Honda'=>array('Civic','Fit')
            ));
    }
}
