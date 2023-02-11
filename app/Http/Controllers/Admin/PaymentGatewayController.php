<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentGatewayController extends Controller
{
    
    public function index(){
        $datas = PaymentGateway::latest('id')->get();
        return view('admin.payment.index',compact('datas'));
    }


    //*** GET Request
    public function edit($id)
    {
        $data = PaymentGateway::findOrFail($id);
        return view('admin.payment.edit',compact('data'));
    }

 
    //*** POST Request
    public function update(Request $request, $id)
    {
        
        $data = PaymentGateway::findOrFail($id);
        $prev = '';
        if($data->type == "automatic"){

            $request->validate([
                'name' => 'unique:payment_gateways,name,'.$id,
            ]);


            $input = $request->all();  

            $info_data = $input['pkey'];

            if($data->keyword == 'mollie'){
                $paydata = $data->convertAutoData(); 
                $prev = $paydata['key'];
            }   

            if (array_key_exists("sandbox_check",$info_data)){
                $info_data['sandbox_check'] = 1;
            }else{
                if (strpos($data->information, 'sandbox_check') !== false) {
                    $info_data['sandbox_check'] = 0;
                    $text =  $info_data['text'];
                    unset($info_data['text']);
                    $info_data['text'] = $text;
                }
            }
            $input['information'] = json_encode($info_data);
           
            $data->update($input);

        }
       
        //--- Redirect Section     
        return redirect(route('admin.gateway.index'))->with('success','Data Updated Successfully.');  
        //--- Redirect Section Ends    
    }
    
      //*** GET Request Status
      public function status($id,$status,$type)
        {
            $data = PaymentGateway::findOrFail($id);
            $data[$type] = $status;
            $data->update();
            Session::flash('success', 'Status Updated Successfully.');
            return redirect(route('admin.gateway.index'));
            
        }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = PaymentGateway::findOrFail($id);
        if($data->type == 'manual' || $data->keyword != null){
            $data->delete();
        }
        //--- Redirect Section     
        $msg = __('Data Deleted Successfully.');
        return response()->json($msg);      
        //--- Redirect Section Ends   
    }
}
