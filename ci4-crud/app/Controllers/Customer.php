<?php

namespace App\Controllers;
use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        $data['customers'] = $model->paginate(1);
        $data['pager'] = $model->pager;

        return view('customers/index', $data);
    }
}