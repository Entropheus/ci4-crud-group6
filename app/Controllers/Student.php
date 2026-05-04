<?php

namespace App\Controllers;

use App\Models\StudentModel;


class Student extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        $data['students'] = $model->findAll();
        return view('student_view', $data);
    }

    public function store()
    {
        $model = new StudentModel();
        $model->save([
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);
        return redirect()->to('/student');
    }

    public function delete($id = null)
    {
        $model = new StudentModel();
        $model->delete($id);
        return redirect()->to('/student');
    }
}