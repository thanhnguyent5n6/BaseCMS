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
        $tenant_info = $this->model->getInfoById(TENANT_ID);
        return view('admin.settings.introduce.index', compact('tenant_info'));
    }

    public function editIntroduce()
    {
        $tenant_info = $this->model->getInfoById(TENANT_ID);
        return view('admin.settings.introduce.form', compact('tenant_info'));
    }

    public function updateIntroduce(Request $request)
    {
        $introduce = $request->introduce ? htmlentities($request->introduce) : "";
        $this->model->updateByID(TENANT_ID, ['introduce' => $introduce]);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('admin.setting.introduce');
    }

    public function tenant()
    {
        $data_item = $this->model->getInfoById(TENANT_ID);
        return view('admin.settings.tenant.index', compact('data_item'));
    }

    public function editTenant()
    {
        $data_item = $this->model->getInfoById(TENANT_ID);
        return view('admin.settings.tenant.form', compact('data_item'));
    }

    public function updateTenant(Request $request)
    {
        $data = $request->all();
        $parameter = [
            'logo' => $data['logo'] ?? "",
            'phone' => $data['phone'] ?? "",
            'hotline_1' => $data['hotline_1'] ?? "",
            'hotline_2' => $data['hotline_2'] ?? "",
        ];
        $this->model->updateByID(TENANT_ID, $parameter);
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('admin.setting.tenant');
    }

}
