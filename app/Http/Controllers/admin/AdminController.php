<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Freelancer;
use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    // public function index(Request $request)
    // {
    //     // هنا بعمل اداء مثل if الشرطية بحيث يشيك اذا المستخدم المسجل دخول لديه صلاحية انه يعدل على المستخدمين يخليه يشوف الصفحة و الا سوف يعطيه خطا
    //     // abort_unless(auth()->user()->can('users.update') , 403);
    //     return view('admin.dashboard' , compact());
    // }
    public function showAdmins()
    {
        return view('admins.show-admins');
    }
    public function getAdminData(Request $request)
    {
        $admins = Admin::query();
        // Filter use Name
        if($request->filled('name')){
            $admins->where('name' , 'like' , '%'.$request->name.'%');
        }
        // Filter use Email
        if($request->filled('email')){
            $admins->where('email' , 'like' , '%'.$request->name.'%');
        }
        // Filter Admin order by created at
        $admins->orderBy('created_at' , 'desc')->get();
        
        return DataTables::of($admins)->addIndexColumn()
            ->addColumn('updated_at', function ($row) {
                return date_format($row->updated_at, 'd/m/Y');
            })->addColumn('created_at', function ($row) {
                return date_format($row->created_at, 'd/m/Y');
            })->addColumn('action', function ($row) {
                return '<button class="btn btn-purple edit" data-id="' . $row->id . '">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                        <button class="btn btn-danger delete" data-id="' . $row->id . '">
                            <i class="bi bi-trash"></i>
                        </button>
                        <button class="btn btn-success view" data-id="' . $row->id . '">
                            <i class="bi bi-eye"></i>
                        </button>';
            })
            ->rawColumns(['updated_at', 'created_at', 'action'])
            ->make(true);
    }
    public function createAdmin(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:admins,name',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|max:15|min:8'
            ],
            [
                'name.required' => 'الاسم مطلوب',
                'name.unique' => 'الاسم موجود بالفعل يرجى اختيار اسم اخر',
                'email.required' => 'الايميل مطلوب',
                'email.email' => 'صيغة الايميل يجب ان تكون كتالي : example@gmail.com',
                'email.unique' => 'الايميل هذا موجود بالفعل يرجى اختيار ايميل اخر',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.max' => 'أقصى حد هو 15 حرف او رقم',
                'password.min' => 'أقل حد هو 8 حرف او رقم'
            ]
        );
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['success' => true]);
    }
    public function showAdminInfo($id)
    {
        $admin = Admin::query()->findOrFail($id);
        $admin->created_at = $admin->created_at->format('d-m-y');
        $admin->updated_at = $admin->updated_at->format('d-m-y');
        return response()->json(['admin' => $admin]);
    }
    public function editAdmin(Request $request)
    {
        $request->validate(
            [
                'editname' => ['required', Rule::unique('admins', 'name')->ignore($request->id)],
                'editemail' => ['required', 'email', Rule::unique('admins', 'email')->ignore($request->id)],
                'editpassword' => 'required|max:15|min:8'
            ],
            [
                'editname.required' => 'الاسم مطلوب',
                'editname.unique' => 'الاسم موجود بالفعل يرجى اختيار اسم اخر',
                'editemail.required' => 'الايميل مطلوب',
                'editemail.email' => 'صيغة الايميل يجب ان تكون كتالي : example@gmail.com',
                'editemail.unique' => 'الايميل هذا موجود بالفعل يرجى اختيار ايميل اخر',
                'editpassword.required' => 'كلمة المرور مطلوبة',
                'editpassword.max' => 'أقصى حد هو 15 حرف او رقم',
                'editpassword.min' => 'أقل حد هو 8 حرف او رقم'
            ]
        );
        $admin = Admin::query()->findOrFail($request->id);
        $admin->update([
            'name' => $request->editname,
            'email' => $request->editemail,
            'password' => Hash::make($request->editpassword)
        ]);
        return response()->json(['success' => true]);
    }
    public function deleteAdmin(Request $request)
    {
        $admin = Admin::query()->findOrFail($request->id);
        if (auth('admins')->user()->id == $request->id) {
            return response()->json(['success' => false, 'message' => 'لا يمكنك حذف حسابك الشخصي قد يؤدي ذلك الى فقد صلاحياتك!']);
        }
        $admin->delete();
        return response()->json(['success' => true]);
    }
    public function showFreelancers()
    {
        return view('admins.show-freelancer');
    }
    public function getFreelancerData(Request $request)
    {
        $freelancers = Freelancer::query();
        return DataTables::of($freelancers)->addIndexColumn()
            ->addColumn('updated_at', function ($row) {
                return date_format($row->updated_at, 'd/m/Y');
            })->addColumn('created_at', function ($row) {
                return date_format($row->created_at, 'd/m/Y');
            })->rawColumns(['updated_at', 'created_at'])
            ->make(true);
    }
    public function showUsers()
    {
        return view('admins.show-user');
    }
    public function getUserData(Request $request)
    {
        $users = User::query();
        return DataTables::of($users)->addIndexColumn()
            ->addColumn('updated_at', function ($row) {
                return date_format($row->updated_at, 'd/m/Y');
            })->addColumn('created_at', function ($row) {
                return date_format($row->created_at, 'd/m/Y');
            })->rawColumns(['updated_at', 'created_at'])
            ->make(true);
    }

}
