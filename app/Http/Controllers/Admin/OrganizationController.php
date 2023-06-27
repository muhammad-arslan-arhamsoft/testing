<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Organization;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class OrganizationController extends Controller
{
    //
        //update organization status
        public function updateOrganization(Request $request){
   
            $id = Hashids::decode($request->query()['id'])[0];
            $data = Organization::findOrFail($id);
            $data->update(['status' => $request->status]);
            Session::flash('flash_success', 'Organization updated successfully!');
    
            return redirect(route('admin.organizations'));
        }
        //delete organization 
        public function deleteOrganization($id)
        {
           
            $id = Hashids::decode($id)[0];
            Organization::destroy($id);
            Session::flash('flash_success', 'Organization deleted successfully!');
            return redirect(route('admin.organizations'));

    
        }
        //show organizations 
        public function showOrganizations(Request $request){
            $data = [];
            if($request->ajax())
            {
                $db_record = Organization::orderBy('created_at','DESC');
                $datatable = Datatables::of($db_record);
                $datatable = $datatable->addIndexColumn();
                $datatable = $datatable->editColumn('status', function($row)
                {
                    $status = '<span class="label label-danger">Disable</span>';
                    if ($row->status == 1)
                    {
                        $status = '<span class="label label-success">Active</span>';
                    }
                    return $status;
                });
    
                $datatable = $datatable->addColumn('action', function ($row) {
                    $actions = '<span class="actions">';
                    $actions .= '&nbsp;<form method="POST" action="' . route("admin.organization.update", ['id' => Hashids::encode($row->id)]  ) . '" accept-charset="UTF-8" style="display:inline">';
                    $actions .= '<input name="_token" type="hidden" value="' . csrf_token() . '">';
                    $actions .= '<select class="status form-control"  name="status">';
                    $actions .= '<option value="1" '. ( $row->status == 1 ? 'selected="selected"' : '' ) . '> Active </option>';
                    $actions .= '<option value="0" '. ( $row->status == 0 ? 'selected="selected"' : '' ) . '> In Active </option>';
                    $actions .= '</select>';
                    $actions .= '</form>';
                    $actions .= '<a class="btn btn-danger delete_function"  href="' . url("admin/organization/delete/" . Hashids::encode($row->id)) . '">';
                    $actions .= '<i class="fa fa-trash"></i>';
                    $actions .= '</a>';
                    $actions .= '</span>';
                    return $actions;
                });
    
                $datatable = $datatable->rawColumns(['status','action']);
                $datatable = $datatable->make(true);
                return $datatable;
            }
            return view('admin.organizations.index',$data);
        }
}
