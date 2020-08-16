<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Tenant();
    }

    public function introduce()
    {
        $tenant_info = $this->model->getInfoById(1);
        return view('admin.settings.introduce.index', compact('tenant_info'));
    }

    public function editIntroduce()
    {
        $tenant_info = $this->model->getInfoById(1);
        return view('admin.settings.introduce.form', compact('tenant_info'));
    }

    public function updateIntroduce(Request $request)
    {
        $introduce = $request->introduce ? htmlentities($request->introduce) : "";
        $this->model->updateByID(1,['introduce' => $introduce]);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('admin.setting.introduce');
    }

}
