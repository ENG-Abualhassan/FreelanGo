<?php

namespace App\Http\Controllers\admin\permission;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class AdminPermission extends Controller
{
    public function index()
    {
        $models = config('app.models');
        $guards = config('app.guards');
        return view('admins.permission.index', compact('models', 'guards'));
    }
    public function getPermissionData(Request $request)
    {
        $permission = Permission::query();
        // Filter use Name
        if ($request->filled('name')) {
            $permission->where('name', 'like', '%' . $request->name . '%');
        }
        // Filter Admin order by created at
        $permission->orderBy('created_at', 'desc')->get();

        return DataTables::of($permission)->addIndexColumn()
            ->addColumn('updated_at', function ($row) {
                return date_format($row->updated_at, 'd/m/Y');
            })->addColumn('created_at', function ($row) {
                return date_format($row->created_at, 'd/m/Y');
            })->addColumn('permission_description' , function($row){
               return  $row->permission_description ? $row->permission_description : '<span class="badge bg-danger"> لايوجد</span>';
            })->addColumn('action', function ($row) {
            })->addColumn('guard_name', function ($row) {

                if ($row->guard_name === 'admins')
                    return '<span class="badge bg-primary"><i class="bi bi-person-badge-fill"></i> مسؤول</span>';
                elseif ($row->guard_name === 'freelancers')
                    return '<span class="badge bg-success"><i class="bi bi-briefcase-fill"></i> مستقل</span>';
                else
                    return '<span class="badge bg-secondary"><i class="bi bi-person-fill"></i> عميل</span>';

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
            ->rawColumns(['updated_at', 'created_at', 'action', 'guard_name' , 'permission_description'])
            ->make(true);
    }
    public function createPermission(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:permissions,name|string|alpha_dash|min:3|max:12|regex:/^[A-Za-z0-9_-]+$/',
                'guard_name' => 'required',
                'group_permission' => 'required|string'
            ],
            [
                'name.required' => 'اسم الصلاحية مطلوب',
                'name.unique' => 'الاسم موجود بالفعل يرجى اختيار اسم اخر',
                'name.string' => 'المحتوى يجب أن يكون نصي',
                'name.min' => 'الحد الادنى للنص هو 3 أحرف',
                'name.max' => 'الحد الاعلى للنص هو 12 حرف',
                'name.regex' => ['الاسم يجب أن لا يحتوي على أي مسافات' , 'يجب أن يكون الاسم باللغة العربية'],
                'guard_name.required' => 'نوع المستخدم مطلوب',
                'group_permission.required' => 'مجموعة الصلاحية مطلوب',
            ]
        );
        Permission::create([
            'name' => strtolower(class_basename($request->group_permission . 's')) . '.' . $request->name,
            'permission_description' => $request->permission_description,
            'guard_name' => $request->guard_name
        ]);
        return response()->json(['success' => true]);
    }
    public function showPermissionInfo($id)
    {
        $permission = Permission::query()->findOrFail($id);
        $permission->created_at = $permission->created_at->format('d-m-y');
        $permission->updated_at = $permission->updated_at->format('d-m-y');
        return response()->json(['permission' => $permission]);
    }
    public function deletePermission(Request $request)
    {
        $permission = Permission::query()->findOrFail($request->id);
        $permission->delete();
        return response()->json(['success' => true]);
    }
}
