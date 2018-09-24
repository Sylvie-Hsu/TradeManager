<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\DB;  

class ManagersController extends Controller
{

    public function show()
    {
        $stockCode=request('stockCode');
        $message='Change Private Setting';

        $manager = App\Manager::where('id',request('manager'))->first();

        $stocks=App\Managerinfo::where('ManagerID',$manager->mana_name)
                        ->join('stock_information','stock_information.stockCode','=','manager_infos.StockID')
                        ->get();

        $newest=App\Instruction::where('stockCode',$stockCode)
                ->orderBy('Time','desc')
                ->first();  

        $stockName=DB::table("stock_information")->where('stockCode',$stockCode)->first()->stockName;

        $buyinstructions=App\Instruction::where('stockCode',$stockCode)
                        ->where('Type','=','Buying')
                        ->get();

        $sellinstructions=App\Instruction::where('stockCode',$stockCode)
                         ->where('Type','=','Selling')
                        ->get();  

        if(request("bound")!=null)
        {

            DB::table("stock_information")->where('stockCode',$newest->stockCode)->update(['stockRate'=>request("bound")]);
        }

        if(request("suspend")!=null)
        {

            DB::table("stock_information")->where('stockCode',$newest->stockCode)->update(['tradeStop'=>1]);
        }

        if(request("restart")!=null)
        {

            DB::table("stock_information")->where('stockCode',$newest->stockCode)->update(['tradeStop'=>0]);
        }

        return view('home',compact('manager','message','stocks','newest','buyinstructions','sellinstructions','stockName'));
    }

    public function index()
    {

    	if($manager = App\Manager::where('id',request('managerid'))->first()){
    		if(request('password') == $manager->password)
    		{
                $message='Change Private Setting';

                $newest=App\Managerinfo::where('ManagerID',request('managerid'))
                        ->join('stock_information','stock_information.stockCode','=','manager_infos.StockID')
                        ->join('instructions','instructions.stockCode','=','manager_infos.StockID')
                        ->orderBy('Time', 'desc')
                        ->first();

                $stocks=App\Managerinfo::where('ManagerID',request('managerid'))
                        ->join('stock_information','stock_information.stockCode','=','manager_infos.StockID')
                        ->get();

                $buyinstructions=App\Instruction::where('stockCode',$newest->stockCode)
                                 ->where('Type','=','Buying')
                                 ->get();

                $sellinstructions=App\Instruction::where('stockCode',$newest->stockCode)
                                 ->where('Type','=','Selling')
                                 ->get();
      
                $stockName=DB::table("stock_information")->where('stockCode',$newest->stockCode)->first()->stockName;

    			return view('home',compact('manager','message','stocks','newest','buyinstructions','sellinstructions','stockName'));
    		}
    		else{
    	   	 	$errors='Password Error';
    			return view('login', compact('errors'));
    		}
    	}
    	else
    	{
    		$errors='Manager ID Error';
    		return view('login', compact('errors'));
    	}
    }

     public function store()
    {
        $managerName=request('managerName');

        if($manager =  App\Manager::where('id',request('managerName'))->first())
        {
            if(request('oldpsw') == $manager->password)
            {
                if(request('newpsw')==request('newpswag'))
                {
                     $manager->password = request('newpsw');
                     $manager->save();
                     $message='Change Success';
                     return view('changepwd',compact('message','managerName'));
                }
                $message='New Password Inconsistent';
                return view('changepwd',compact('message','managerName'));
            }
            else{
                $message='Old Password Error';
                return view('changepwd', compact('message','managerName'));
            }
        }
        else
        {
            $message='Manager ID Error';
            return view('changepwd', compact('message','managerName'));
        }
    }

    public function setbound()
    {

    }

}