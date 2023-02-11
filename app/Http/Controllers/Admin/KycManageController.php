<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Generalsetting;
use App\Models\KycForm;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class KycManageController extends Controller
{
    public function index()
    {
        $userForms = KycForm::get();
        return view('admin.kyc.index', compact('userForms'));
    }

    public function kycForm(Request $request)
    {
        $request->validate(
            [
                'type' => 'required|in:1,2,3',
                'label' => 'required',
                'required' => 'required'
            ]
        );

        $kyc = new KycForm();
        $kyc->type      = $request->type;
        $kyc->label     = $request->label;
        $kyc->name      = Str::slug($request->label, '_');
        $kyc->required  = $request->required;
        $kyc->save();

        return back()->with('success', 'Form field added successfully');
    }

    public function removeField($id)
    {
        KycForm::findOrFail($id)->delete();
        $notify[] = ['success', 'Field has been removed'];
        return back()->withNotify($notify);
    }

    public function editField($id)
    {
        $page_title = 'Edit Fields';
        $field = KycForm::findOrFail($id);
        return view('admin.category.editFields', compact('page_title', 'field'));
    }

    public function kycFormUpdate(Request $request)
    {

        $request->validate(
            [
                'type' => 'required|in:1,2,3',
                'label' => 'required',
                'required' => 'required'
            ]
        );

        $kyc            = KycForm::findOrFail($request->id);
        $kyc->type      = $request->type;
        $kyc->label     = $request->label;
        $kyc->name      = Str::slug($request->label, '_');
        $kyc->required  = $request->required;
        $kyc->save();

        return back()->with('success', 'Form field updated successfully');
    }

    public function deletedField(Request $request)
    {
        KycForm::findOrFail($request->id)->delete();
        return back()->with('success', 'Form field has removed');
    }


    public function pendingKyc()
    {
        $clients = Client::where('is_kyc', 1)->get();
        return view('admin.kyc.pending', compact('clients'));
    }

    public function details($id)
    {
        $kycInformations = json_decode(Client::findOrFail($id)->kyc_info);
        $user = Client::findOrFail($id);
        return view('admin.kyc.details', compact('kycInformations', 'user'));
    }


    public function status($id, $status)
    {
        $client = Client::findOrFail($id);
        $client->is_kyc = $status;
        $client->save();
        Session::flash('success', 'Status updated successfully');
        return redirect(route('admin.kyc.pending'));
    }

    public function kycType()
    {
        $gs = Generalsetting::first();
        $gs->kyc_type = request('kyc_type');
        $gs->save();
        return response()->json(['success'=>'KYC Type changed successfully']);
    }
}
