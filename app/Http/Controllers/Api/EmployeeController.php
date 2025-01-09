<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // GET All Data Karyawan
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'division_id' => 'nullable|exists:divisions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $query = Employee::with('division');
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('division_id')) {
            $query->where('division_id', $request->division_id);
        }

        $employees = $query->paginate(10);

        return response()->json([
            'status' => 'success',
            'message' => 'Employees retrieved successfully',
            'data' => [
                'employees' => $employees->items(),
            ],
            'pagination' => [
                'current_page' => $employees->currentPage(),
                'last_page' => $employees->lastPage(),
                'per_page' => $employees->perPage(),
                'total' => $employees->total(),
            ]
        ], 200);
    }

    // CREATE Data Karyawan
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|string',
            'name' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'division' => 'required|uuid',
            'position' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $employee = Employee::create([
            'image' => $request->image,
            'name' => $request->name,
            'phone' => $request->phone,
            'division_id' => $request->division,
            'position' => $request->position,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Employee created successfully',
            'data' => [
                'employee' => $employee,
            ],
        ], 201);
    }

    // EDIT Data Karyawan
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|string',
            'name' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
            'division' => 'nullable|uuid',
            'position' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $employee->image = $request->image ?? $employee->image;
        $employee->name = $request->name ?? $employee->name;
        $employee->phone = $request->phone ?? $employee->phone;
        $employee->division_id = $request->division ?? $employee->division_id;
        $employee->position = $request->position ?? $employee->position;

        $employee->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Employee updated successfully',
        ], 202);
    }

    // DELETE Data Karyawan
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Employee deleted successfully',
        ]);
    }
}
