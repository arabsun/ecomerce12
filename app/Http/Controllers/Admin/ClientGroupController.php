<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientGroupController extends Controller
{
    public function index(Request $request)
    {
        $datas = ClientGroup::paginate(6);
        return view('admin.group.index', compact('datas'));
    }


    public function create()
    {
        return view('admin.group.create');
    }


    public function store(Request $request)
    {
        $rules =
            [
                'group_name' => 'required|max:200',
                'membership_type' => 'required',
                'membership_fee' => 'required|gt:0',
                'fund_min_limit' => 'required|gt:0',
                'fund_max_limit' => 'required|gt:0',
            ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }


        $group = new ClientGroup();
        $group->group_name = $request->group_name;

        if ($request->is_group_pricing) {
            $group->is_group_pricing = 1;
        } else {
            $group->is_group_pricing = 0;
        }

        $group->membership_type = $request->membership_type;
        $group->membership_time = $request->membership_time;
        $group->membership_fee = $request->membership_fee;
        $group->fund_min_limit = $request->fund_min_limit;
        $group->fund_max_limit = $request->fund_max_limit;

        if ($request->is_retail_group) {
            $group->is_retail_group = 1;
        } else {
            $group->is_retail_group = 0;
        }
        if ($request->is_kyc) {
            $group->is_kyc = 1;
        } else {
            $group->is_kyc = 0;
        }

        $group->save();

        return redirect()->route('admin.group.index')->withSuccess('Group Addedd Successfully');
    }



    public function edit($id)
    {
        $group = ClientGroup::findOrFail($id);
        return view('admin.group.edit', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $rules =
            [
                'group_name' => 'required|max:200',
                'membership_type' => 'required',
                'membership_fee' => 'required|gt:0',
                'fund_min_limit' => 'required|gt:0',
                'fund_max_limit' => 'required|gt:0',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $group = ClientGroup::findOrFail($id);

        $group->group_name = $request->group_name;

        if ($request->is_group_pricing) {
            $group->is_group_pricing = 1;
        } else {
            $group->is_group_pricing = 0;
        }

        $group->membership_type = $request->membership_type;
        $group->membership_time = $request->membership_time;
        $group->membership_fee = $request->membership_fee;
        $group->fund_min_limit = $request->fund_min_limit;
        $group->fund_max_limit = $request->fund_max_limit;

        if ($request->is_retail_group) {
            $group->is_retail_group = 1;
        } else {
            $group->is_retail_group = 0;
        }
        if ($request->is_kyc) {
            $group->is_kyc = 1;
        } else {
            $group->is_kyc = 0;
        }

        $group->update();

        return redirect()->route('admin.group.index')->withSuccess('Group Update Successfully');
    }


    public function delete($id)
    {
        $client = ClientGroup::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.group.index')->withSuccess('Group Delete Successfully');
    }
}
