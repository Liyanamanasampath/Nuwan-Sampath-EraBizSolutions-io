<?php

namespace App\Http\Controllers;

use App\CareProgram;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\Specialist;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageDoctorController extends Controller
{
    public function getAllDoctors(Request $request)
    {

        $options = $this->_prepareSearchDataArray($request->get('params'));
        $doctors = Doctor::select('hospitals.name as hospitalName', 'doctors.name as doctorName', 'doctors.doctor_id as doctor_id', 'specialties.name as specialistName', 'countries.name as countryName', 'states.name as stateName')
            ->leftJoin('hospitals', 'doctors.hospital_id', '=', 'hospitals.hospital_id')
            ->leftJoin('countries', 'doctors.country_id', '=', 'countries.country_id')
            ->leftJoin('states', 'doctors.state_id', '=', 'states.state_id')
            ->leftJoin('specialties', 'doctors.specialty_id', '=', 'specialties.specialty_id');

        $doctors = $this->_searchChunks($doctors,$options);
        $doctors = $doctors->get();

        return response()->json($doctors);
    }

    private function _prepareSearchDataArray($requestParams)
    {
        return [
            'searchByState' => isset($requestParams['Country']) && !empty($requestParams['Country']) ? $requestParams['Country'] : '',
            'searchByCountry' => isset($requestParams['State']) && !empty($requestParams['State']) ? $requestParams['State'] : '',
            'searchBySpecialist' => isset($requestParams['Specialist']) && !empty($requestParams['Specialist']) ? $requestParams['Specialist'] : [],
            'fullTextSearch' => isset($requestParams['SearchText']) && !empty($requestParams['SearchText']) ? $requestParams['SearchText'] : '',
        ];
    }

    private function _searchChunks($doctors,$options){

        if (isset($options)) {
            if (isset($options['searchByState']) && !empty($options['searchByState'])) {
                $doctors = $doctors->where('doctors' . '.state_id', $options['searchByState']);
            }
            if (isset($options['searchByCountry']) && !empty($options['searchByCountry'])) {
                $doctors = $doctors->where('doctors' . '.country_id',$options['searchByCountry']);
            }
            if (isset($options['searchBySpecialist']) && !empty($options['searchBySpecialist'])) {
                $doctors = $doctors->whereIn('doctors' . '.specialty_id', $options['searchBySpecialist']);
            }
            if(isset($options['fullTextSearch']) && !empty(isset($options['fullTextSearch']))){
                $doctors = $doctors->where('doctors' . '.name','like', '%' .$options['fullTextSearch'] .'%');
            }
        }
        return $doctors;

    }

    public function getCountry(){
        $countries = Country::all();
        return response()->json($countries);
    }
    public function getState(){
        $states = State::all();
        return response()->json($states);
    }
    public function getSpecialist(Request $request){
        $requestParams = $request->all();
        $specialties = Specialist::query();
        if(isset($requestParams['searchtext'])) {
            $specialties =  $specialties->where('name','like', '%' . $requestParams['searchtext']. '%' );
        }
        $specialties = $specialties->get();
        return response()->json($specialties);
    }


}
