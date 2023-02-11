<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\ActivityLog;
use App\Models\ClientGroup;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProformaInvoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $datas = Client::simplePaginate(15);
        return view('admin.client.index', compact('datas'));
    }

    public function create()
    {
        $groups = ClientGroup::get();
        $countrys=Country::where('status', '=', '1')->get();
//        dd($countrys);
        return view('admin.client.create', compact('groups','countrys'));
    }


    public function store(Request $request)
    {
        $rules =
            [
                'username'  => 'required|unique:clients,username|max:200',
                'password'  => 'nullable|min:4|max:14',
                'email'     => 'required|unique:clients,email',
                'balance'   => 'required|min:0',
                'client_group_id' => 'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $client = new Client();

        $client->username = Str::slug($request->username);
        if ($request->password) {
            $client->password = Hash::make($request->password);
        } else {
            $random = rand(14345, 994399);
            $client->password = Hash::make($random);
        }

        $client->email = $request->email;
        $client->balance = $request->balance;
        $client->status = $request->status;
        $client->client_group_id = $request->client_group_id;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->phone = $request->phone;
        $client->company = $request->company;
        $client->address = $request->address;
        $client->address2 = $request->address2;
        $client->state = $request->state;
        $client->city = $request->city;
        $client->zip = $request->zip;
        $client->newsletter = $request->newsletter;
        $client->save();

        return redirect()->route('admin.client.index')->withSuccess('Client Addedd Successfully');
    }


    public function edit($id)
    {
        $groups = ClientGroup::get();
        $client = Client::findOrFail($id);
        return view('admin.client.edit', compact('client', 'groups'));
    }


    public function update(Request $request, $id)
    {
        $rules =
            [
                'username'  => 'required|max:200|unique:clients,username,' . $id,
                'password'  => 'nullable|min:4|max:14',
                'email'     => 'required|unique:clients,email,' . $id,
                'balance'   => 'required|min:0',
                'client_group_id' => 'required',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $client = Client::findOrFail($id);

        $client->username = Str::slug($request->username);

        if ($request->password) {
            $client->password = Hash::make($request->password);
        } else {
            $random = rand(14345, 994399);
            $client->password = Hash::make($random);
        }
        $client->email = $request->email;
        $client->balance = $request->balance;
        $client->status = $request->status;
        $client->client_group_id = $request->client_group_id;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->phone = $request->phone;
        $client->company = $request->company;
        $client->address = $request->address;
        $client->address2 = $request->address2;
        $client->state = $request->state;
        $client->city = $request->city;
        $client->zip = $request->zip;
        $client->newsletter = $request->newsletter;
        $client->update();

        return redirect()->route('admin.client.index')->withSuccess('Client Update Successfully');
    }


    public function overview($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.overview', compact('client'));
    }


    public function financial($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.financial', compact('client'));
    }


    public function financialSubmit(Request $request, $id)
    {

        $this->Validation($request);

        $client = Client::findOrFail($id);

        $tranaction = new Transaction();
        if ($request->credit == 1) {

            $tranaction->user_id = $id;
            $tranaction->txn_number = Str::random(9);
            $tranaction->amount = $request->plus_amount;
            $tranaction->method = 'By Admin';
            $tranaction->type   =  '+';
            $tranaction->details   =  'Increase Funds';
            $tranaction->admin_note  =  $request->admin_note;
            $tranaction->user_note   =  $request->user_note;
        }
        if ($request->rebate == 1) {

            $tranaction->user_id = $id;
            $tranaction->txn_number = Str::random(9);
            $tranaction->amount = $request->mius_amount;
            $tranaction->method = 'By Admin';
            $tranaction->type   =  '-';
            $tranaction->details   =  'Decrease Funds';
            $tranaction->admin_note  =  $request->admin_note;
            $tranaction->user_note   =  $request->user_note;
            $client->balance = $client->balance - $request->mius_amount;
        }

        $current_date = Carbon::now();
        // add current_date plus 5 days

        $expire_date = $current_date->addDays(5);

        if ($request->generate_invoice == 1 && $request->paid == 0) {
            $proforma_invoice = new ProformaInvoice();
            $proforma_invoice->user_id = $id;
            $proforma_invoice->txn_number = Str::random(9);
            $proforma_invoice->amount = $request->plus_amount;
            $proforma_invoice->due_day     = $request->due_day;
            $proforma_invoice->fees        = $request->fees;
            $proforma_invoice->txn_id      = $request->txn_id;
            $proforma_invoice->method      = $request->payment_gateway;
            $proforma_invoice->type        =  $request->credit == 1 ? '+' : '-';
            $proforma_invoice->details     =  $request->credit == 1 ? 'Increase Funds' : 'Decrease Funds';
            $proforma_invoice->admin_note  =  $request->admin_note;
            $proforma_invoice->user_note   =  $request->user_note;
            $proforma_invoice->expire_date = $expire_date->format('Y-m-d H:i:s');
            $client->balance = $client->due_balance + $request->plus_amount;
            $proforma_invoice->save();
        }

        if ($request->generate_invoice == 1 && $request->paid == 1) {
            $proforma_invoice = new ProformaInvoice();
            $proforma_invoice->user_id = $id;
            $proforma_invoice->txn_number = Str::random(9);
            $proforma_invoice->amount = $request->plus_amount;
            $proforma_invoice->due_day = null;
            $proforma_invoice->fees = $request->fees;
            $proforma_invoice->txn_id = $request->txn_id;
            $proforma_invoice->method = $request->payment_gateway;
            $proforma_invoice->type   =  $request->credit == 1 ? '+' : '-';
            $proforma_invoice->details   =  $request->credit == 1 ? 'Increase Funds' : 'Decrease Funds';
            $proforma_invoice->admin_note  =  $request->admin_note;
            $proforma_invoice->user_note   =  $request->user_note;
            $proforma_invoice->expire_date = $expire_date->format('Y-m-d H:i:s');
            $proforma_invoice->save();
        }


        $client->update();
        $tranaction->save();

        return redirect()->back()->withSuccess('Transaction Successfully');
    }



    public function Validation($request)
    {
        if ($request->generate_invoice == 1 && $request->paid == 0) {
            $request->validate([
                'plus_amount'   => $request->credit == 1 ? 'required|min:1' : 'nullable',
                'mius_amount'   => $request->rebate == 1 ? 'required|min:1' : 'nullable',
                'due_day'       => 'required|min:1',
                'payment_gateway' => 'required',
                'fees'          => 'nullable|numeric',
                'txn_id'        => 'required|string|max:255',
                'balance_validity' => 'required|min:1|numeric',
            ]);
        }
        if ($request->paid == 1 && $request->generate_invoice == 0) {
            $request->validate([
                'plus_amount' => $request->credit == 1 ? 'required|min:1' : 'nullable',
                'mius_amount' => $request->rebate == 1 ? 'required|min:1' : 'nullable',
                'balance_validity' => 'required|min:1|numeric',
            ]);
        }

        if ($request->paid == 1 && $request->generate_invoice == 1) {
            $request->validate([
                'plus_amount' => $request->credit == 1 ? 'required|min:1' : 'nullable',
                'mius_amount' => $request->rebate == 1 ? 'required|min:1' : 'nullable',
                'payment_gateway' => 'required',
                'txn_id' => 'required|string|max:255',
                'fees' => 'nullable|numeric',
                'balance_validity' => 'required|min:1|numeric',
            ]);
        }
        if ($request->paid == 0 && $request->generate_invoice == 0) {
            $request->validate([
                'plus_amount' => $request->credit == 1 ? 'required|min:1' : 'nullable',
                'mius_amount' => $request->rebate == 1 ? 'required|min:1' : 'nullable',
                'due_day' => 'required|min:1',
                'balance_validity' => 'required|min:1|numeric',
            ]);
        }
    }


    public function permission($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.permission', compact('client'));
    }


    public function permissionSubmit(Request $request, $id)
    {
        $rules =
            [
                'add_min_found' => 'required|min:1',
                'add_max_found' => 'required|min:1',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }
        $client = Client::findOrFail($id);
        $client->status = $request->status;
        if ($request->is_kyc) $client->is_kyc = 1;
        else $client->is_kyc = 0;

        if ($request->is_transfer_credit) $client->is_transfer_credit = 1;
        else $client->is_transfer_credit = 0;

        if ($request->affiliate) $client->affiliate = 1;
        else $client->affiliate = 0;

        $client->add_min_found = $request->add_min_found;
        $client->add_max_found = $request->add_max_found;
        $client->update();

        return redirect()->back()->withSuccess('Client Update Successfully');
    }

    public function statement($id)
    {
        $client = Client::findOrFail($id);
        $tranactions = Transaction::whereUserId($id)->get();
        return view('admin.client.statement', compact('tranactions', 'client'));
    }

    public function activity_log($id)
    {
        $client = Client::findOrFail($id);
        $logs = ActivityLog::where('client_id', $id)->get();
        return view('admin.client.activity_log', compact('client', 'logs'));
    }


    public function invoice($id)
    {
        $invoices = Transaction::whereUserId($id)->get();
        $client = Client::findOrFail($id);
        return view('admin.client.invoice', compact('client', 'invoices'));
    }


    public function products($id)
    {
        $client = Client::findOrFail($id);
        $products = [];
        return view('admin.client.products', compact('client', 'products'));
    }


    public function emailPreference($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.email_preference', compact('client'));
    }


    public function setPrice($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.set_price', compact('client'));
    }

    public function orderHistory($id)
    {
        $client = Client::findOrFail($id);
        $orders = [];
        return view('admin.client.order_history', compact('client', 'orders'));
    }


    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.client.index')->withSuccess('Client Delete Successfully');
    }


    // phone verify
    public function clinetPhoneVerify(Request $request)
    {

        $client = Client::findOrFail($request->clinet_id);
        $client->is_phone_verify = $request->status == 1 ? 0 : 1;
        $client->update();
        return response()->json(['status' => $client->is_phone_verify]);
    }


    public function financialLoad(Request $request)
    {
        $genereate_invoice = $request->generate_invoice;
        $paid_amount = $request->amount_paid;
        $type = $request->type;
        return view('admin.load.financial', compact('genereate_invoice', 'paid_amount', 'type'));
    }

    public function coupons($user_id){
        $client = Client::findOrFail($user_id);
        $coupons = Coupon::where('user_id',$user_id)->orderBy('status','asc')->get();
        return view('admin.coupon.index', compact('coupons','client'));
    }

    public function addCoupons(Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric|gt:0|max:100',
            'validity' => 'required|numeric|integer|gt:0',
        ]);

        $coupon = new Coupon();
        $coupon->user_id  = $request->user_id;
        $coupon->code     = strtoupper(Str::random(6));
        $coupon->discount = $request->discount;
        $coupon->validity = $request->validity;
        $coupon->save();

        return back()->with('success','Coupon Added Successfully');
    }

    public function removeCoupons($coupon_id)
    {

        $coupon = Coupon::find($coupon_id);
        if(!$coupon)  return response()->json(['error'=>'Coupon not found']);
        $coupon->delete();
        return response()->json(['success'=>'Coupon Removed Successfully']);
    }

}
