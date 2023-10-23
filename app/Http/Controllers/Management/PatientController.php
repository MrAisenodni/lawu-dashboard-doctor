<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    protected $path = '/management/patient';

    public function index()
    {
        $data = [
            'c_menu'            => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'data'              => $this->patient->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('management.patient.index', $data);
    }

    public function create()
    {
        $data = [
            'c_menu'            => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'actions'           => $this->action->select('id', 'name')->where('disabled', 0)->get(),
            'assurances'        => $this->assurance->select('id', 'name')->where('disabled', 0)->get(),
            'blood_types'       => $this->blood_type->select('id', 'name')->where('disabled', 0)->get(),
            'citizens'          => $this->citizen->select('id', 'name')->where('disabled', 0)->get(),
            'clinics'           => $this->clinic->select('id', 'name')->where('disabled', 0)->get(),
            'districts'         => $this->district->select('id', 'name')->where('disabled', 0)->get(),
            'educations'        => $this->education->select('id', 'name')->where('disabled', 0)->get(),
            'doctors'           => $this->doctor->select('id', 'doctor_no', 'full_name')->where('disabled', 0)->get(),
            'genders'           => $this->gender->select('id', 'name')->where('disabled', 0)->get(),
            'hospitals'         => $this->hospital->select('id', 'name')->where('disabled', 0)->get(),
            'marital_statuss'   => $this->marital_status->select('id', 'name')->where('disabled', 0)->get(),
            'occupations'       => $this->occupation->select('id', 'name')->where('disabled', 0)->get(),
            'payment_methods'   => $this->payment_method->select('id', 'name')->where('disabled', 0)->get(),
            'units'             => $this->unit->select('id', 'name')->where('disabled', 0)->get(),
            'religions'         => $this->religion->select('id', 'name')->where('disabled', 0)->get(),
            'visit_methods'     => $this->visit_method->select('id', 'name')->where('disabled', 0)->get(),
            'visit_times'       => $this->visit_time->select('id', 'name')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->add == 0) abort(403);
        
        return view('management.patient.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'action'            => 'required',
            'assurance'         => 'required',
            'full_name'         => 'required',
            'hospital'          => 'required',
            'rm_no'             => 'required',
            'registration_no'   => 'required',
            'registration_date' => 'required',
            'visit_method'      => 'required',
        ]);

        // Insert data to patient table
        $data = [
            // Data Pasien
            'rm_no'             => $request->rm_no,
            'registration_no'   => $request->registration_no,
            'registration_date' => date('Y-m-d', strtotime($request->registration_date)),
            'doctor_reference'  => $request->doctor_reference,
            'action_id'         => $request->action,
            'assurance_id'      => $request->assurance,
            'clinic_id'         => $request->clinic,
            'doctor_id'         => $request->doctor,
            'hospital_id'       => $request->hospital,
            'payment_method_id' => $request->payment_method,
            'unit_id'           => $request->unit,
            'visit_method_id'   => $request->visit_method,
            'visit_time_id'     => $request->visit_time,

            // Data Pribadi Pasien
            'nik'               => $request->nik,
            'full_name'         => $request->full_name,
            'inisial_name'      => $request->inisial_name,
            'alias_name'        => $request->alias_name,
            'birth_date'        => date('Y-m-d', strtotime($request->birth_date)),
            'birth_place'       => $request->birth_place,
            'gender_id'         => $request->gender,
            'religion_id'       => $request->religion,
            'blood_type_id'     => $request->blood_type,

            // Kontak Pasien
            'address_1'         => $request->address_1,
            'district_id'       => $request->district,
            'ward'              => $request->ward,
            'post_code'         => $request->post_code,
            'email'             => $request->email,
            'phone_number'      => $request->phone_number,
            'home_number'       => $request->home_number,

            // Informasi Tambahan Pasien
            'allergy'           => $request->allergy,
            'education_id'      => $request->education,
            'marital_status_id' => $request->marital_status,
            'citizen_id'        => $request->citizen,
            'occupation_id'     => $request->occupation,

            // Struktur Baku
            'created_at'    => now(),
            'created_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];
        $this->patient->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'detail'        => $this->patient->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('management.patient.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'c_menu'        => $this->menu->select('id', 'title', 'url', 'main_menu_id')->where('disabled', 0)->where('url', $this->path)->first(),
            'actions'           => $this->action->select('id', 'name')->where('disabled', 0)->get(),
            'assurances'        => $this->assurance->select('id', 'name')->where('disabled', 0)->get(),
            'blood_types'       => $this->blood_type->select('id', 'name')->where('disabled', 0)->get(),
            'citizens'          => $this->citizen->select('id', 'name')->where('disabled', 0)->get(),
            'clinics'           => $this->clinic->select('id', 'name')->where('disabled', 0)->get(),
            'districts'         => $this->district->select('id', 'name')->where('disabled', 0)->get(),
            'educations'        => $this->education->select('id', 'name')->where('disabled', 0)->get(),
            'doctors'           => $this->doctor->select('id', 'doctor_no', 'full_name')->where('disabled', 0)->get(),
            'genders'           => $this->gender->select('id', 'name')->where('disabled', 0)->get(),
            'hospitals'         => $this->hospital->select('id', 'name')->where('disabled', 0)->get(),
            'marital_statuss'   => $this->marital_status->select('id', 'name')->where('disabled', 0)->get(),
            'occupations'       => $this->occupation->select('id', 'name')->where('disabled', 0)->get(),
            'payment_methods'   => $this->payment_method->select('id', 'name')->where('disabled', 0)->get(),
            'units'             => $this->unit->select('id', 'name')->where('disabled', 0)->get(),
            'religions'         => $this->religion->select('id', 'name')->where('disabled', 0)->get(),
            'visit_methods'     => $this->visit_method->select('id', 'name')->where('disabled', 0)->get(),
            'visit_times'       => $this->visit_time->select('id', 'name')->where('disabled', 0)->get(),
            'detail'            => $this->patient->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail', 'approval')->where('disabled', 0)
            ->where('group_menu_id', session()->get('sgroup_menu_id'))->where('menu_id', $data['c_menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('management.patient.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'action'            => 'required',
            'assurance'         => 'required',
            'full_name'         => 'required',
            'hospital'          => 'required',
            'rm_no'             => 'required',
            'registration_no'   => 'required',
            'registration_date' => 'required',
            'visit_method'      => 'required',
        ]);

        // Insert data to patient table
        $data = [
            // Data Pasien
            'rm_no'             => $request->rm_no,
            'registration_no'   => $request->registration_no,
            'registration_date' => date('Y-m-d', strtotime($request->registration_date)),
            'doctor_reference'  => $request->doctor_reference,
            'action_id'         => $request->action,
            'assurance_id'      => $request->assurance,
            'clinic_id'         => $request->clinic,
            'doctor_id'         => $request->doctor,
            'hospital_id'       => $request->hospital,
            'payment_method_id' => $request->payment_method,
            'unit_id'           => $request->unit,
            'visit_method_id'   => $request->visit_method,
            'visit_time_id'     => $request->visit_time,

            // Data Pribadi Pasien
            'nik'               => $request->nik,
            'full_name'         => $request->full_name,
            'inisial_name'      => $request->inisial_name,
            'alias_name'        => $request->alias_name,
            'birth_date'        => date('Y-m-d', strtotime($request->birth_date)),
            'birth_place'       => $request->birth_place,
            'gender_id'         => $request->gender,
            'religion_id'       => $request->religion,
            'blood_type_id'     => $request->blood_type,

            // Kontak Pasien
            'address_1'         => $request->address_1,
            'district_id'       => $request->district,
            'ward'              => $request->ward,
            'post_code'         => $request->post_code,
            'email'             => $request->email,
            'phone_number'      => $request->phone_number,
            'home_number'       => $request->home_number,

            // Informasi Tambahan Pasien
            'allergy'           => $request->allergy,
            'education_id'      => $request->education,
            'marital_status_id' => $request->marital_status,
            'citizen_id'        => $request->citizen,
            'occupation_id'     => $request->occupation,

            // Struktur Baku
            'created_at'    => now(),
            'created_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];
        $this->patient->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('sname').' ('.session()->get('srole_id').')',
        ];
        $this->patient->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
