<?php

namespace App\Http\Controllers\dashboard;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Http\Response;


class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        abort_if(Gate::denies('doctor'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('pages.department.index');
    }

    public function allDepartments() {
        abort_if(Gate::denies('doctor'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $departments = Department::orderBy('created_at', 'desc')->latest()->get();

        return $this->success('success', DepartmentResource::collection($departments));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('doctor'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255', 'unique:departments'],
            'description' => ['required', 'string'],
        ]);
        
        $create_dept = Department::create($request->all());

        if($create_dept) {
            return $this->success('New Department Added');
        }

        return $this->failed('Error creating new department');
    }

    public function update(Request $request, $uuid) {
        abort_if(Gate::denies('doctor'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $department = Department::findByUuid($uuid);
        if(!$department) {
            return $this->failed('Department not found');
        }
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:departments,title,'.$department->id,
            'description' => ['required', 'string'],
        ]);
        
        $update = $department->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if($update) {
            return $this->success('Department Successfully updated');
        }

        return $this->failed('Failed to update');
    }

    public function destroy($uuid) {
        $delete_dept = Department::findByUuid($uuid)->delete();
        if(!$delete_dept) {
            return $this->failed('Department deletion failed');
        }

        return $this->success('successfully removed department');
    }
}
