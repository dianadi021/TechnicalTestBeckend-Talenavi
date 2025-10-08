<?php

namespace App\Traits;

use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

trait Tools
{
    public function show_array($var)
    {
        echo print_r($var, true);
    }

    public function show_json($var)
    {
        echo json_encode($var, JSON_PRETTY_PRINT);
    }

    public function isValidVal($val, $key = null, $get = 'bool', $other = null)
    {
        $tmpVal = $this->getVarValue($val, $key, $other);

        switch ($get) {
            case 'value':
                return $tmpVal;
            case 'equal':
                return $tmpVal == $other;
            default:
                return isset($tmpVal) && !empty($tmpVal);
        }
    }

    public function getVarValue($val, $key = null, $default = null)
    {
        $tmpVal = (($key === null) && !empty($val) ? $val : $default);
        if (($key !== null) && is_array($val)) {
            $tmpVal = (isset($val[$key]) && !empty($val[$key]) ? $val : $tmpVal);
        }

        return (is_string($tmpVal) ? trim($tmpVal) : $tmpVal);
    }

    public function isValEqual($var, $key = null, $value)
    {
        $tmpVar = $this->getVarValue($var, $key);
        return $tmpVar == $value;
    }

    public function valNotEmpty($var, $key = null)
    {
        $tmpVar = $this->getVarValue($var, $key);
        return isset($tmpVar) && !empty($tmpVar);
    }

    public function ajaxJSONReturn($code, $status, $msg, $data = [])
    {
        $return = [
            'code' => $code,
            'status' => $status,
            'message' => $msg,
            'data' => $data
        ];
        return $return;
    }

    public function IsValidAddress($req)
    {
        $wheres = ($this->IsValidVal($req->id_provinsi) ? " WHERE prov.id = '$req->id_provinsi' AND " : " WHERE ");
        $wheres .= ($this->IsValidVal($req->id_kabupaten) ? " kab.id = '$req->id_kabupaten' AND " : "");
        $wheres .= ($this->IsValidVal($req->id_kecamatan) ? " kec.id = '$req->id_kecamatan' AND " : "");
        $wheres .= ($this->IsValidVal($req->id_kelurahan) ? " kel.id = '$req->id_kelurahan' AND " : "");
        $wheres .= (isset($req->q) && !empty($req->q) ? " $wheres LOWER(kel.name) LIKE LOWER('%$req->q%') " : " 1=1 ");

        $qry = "SELECT kel.id, kel.name, kel.postal_code, kec.name as kecamatan, kab.name as kabupaten, prov.name as provinsi FROM kelurahan kel JOIN kecamatan kec ON kec.id = kel.id_kecamatan JOIN kabupaten kab ON kab.id = kec.id_kabupaten JOIN provinsi prov ON prov.id = kab.id_provinsi $wheres ORDER BY kel.name ASC";
        $datas = DB::select("$qry");
        return $datas;
    }

    public function ReformatDateTime($date, $toDB = false, $format = "Y-m-d H:i:s")
    {
        if ($toDB && env("DB_CONNECTION") === "mysql") {
            return Carbon::parse($date)->format("Y-m-d H:i:s");
        }

        return Carbon::parse($date)->format("$format");
    }

    public function ReformatNoRM($id_pasien)
    {
        $id_pasien = $this->getVarValue($id_pasien);
        $tmpStr = strlen("$id_pasien");
        $tmpZero = [
            '000000',
            '00000',
            '0000',
            '000',
            '00',
            '0',
        ];
        $key = ($tmpStr - 1);
        $key = ($key < 0 ? 0 : $key);
        return (isset($tmpZero[$key]) ? $tmpZero[$key] . "" . $id_pasien : $id_pasien);
    }

    public function UserAgent()
    {
        return request()->header('User-Agent');
    }

    public function ReqValidation($req, $form)
    {
        return $req->validate($form);
    }

    public function GetUserIDFromRequest($req, $userSession)
    {
        $id_user = ($this->valNotEmpty($userSession, 'id_user') ? $userSession['id_user'] : null);
        $id_user = (isset($req->id_user) && !empty($req->id_user) ? $req->id_user : $id_user);
        $id_user = ($this->valNotEmpty($id_user) ? $id_user : Auth::id());

        return $id_user;
    }

    public function GetClientIDFromRequest($req, $userSession)
    {
        $id_client = ($this->valNotEmpty($userSession, 'id_client') ? $userSession['id_client'] : null);
        $id_client = (isset($req->id_client) && !empty($req->id_client) ? $req->id_client : $id_client);

        return $id_client;
    }

    public function IsValidDateTime($val, $format = 'Y-m-d') {
        $dt = DateTime::createFromFormat($format, $val);
        $isValidDate = $dt && $dt->format($format) === $val;

        if ($isValidDate) { return $val; }

        if (is_numeric($val)) { return date($format, strtotime("-" . intval($val + 1) . " years")); }
    }

    public function GetAgedByBirthDate($val, $format = 'd-m-Y') {
        $tmpDate = $this->IsValidDateTime($val, $format);
        return Carbon::parse($tmpDate)->age;
    }
}
