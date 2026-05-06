<?php

namespace App\Controllers;

use App\Models\CourseModel;

class Courses extends BaseController
{
    public function index()
    {
        $model = new CourseModel();

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $courses = $model
                ->like('course_name', $keyword)
                ->orLike('instructor', $keyword)
                ->findAll();
        } else {
            $courses = $model->findAll();
        }

        return view('courses/index', ['courses' => $courses]);
    }
}