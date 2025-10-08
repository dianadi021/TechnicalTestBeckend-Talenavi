<?php

namespace App\Http\Controllers;

use Exception;

use App\Traits\Tools;
use App\Traits\ResponseCode;

use Illuminate\Http\JsonResponse;

abstract class ApiController extends Controller
{
    use ResponseCode, Tools;

    public function __construct(private $service) {}

    public function GetAllDatas(object $req): JsonResponse
    {
        try {
            $datas = $this->service->index($req);

            return $this->jsonResponse(200, "Data berhasil diambli!", $datas);
        } catch (Exception $err) {
            return $this->jsonResponse(500, null, $err->getMessage());
        }
    }

    public function GetDataByParams(object $req): JsonResponse
    {
        try {
            $datas = $this->service->params($req);

            return $this->jsonResponse(200, "Data berhasil diambli!", $datas);
        } catch (Exception $err) {
            return $this->jsonResponse(500, null, $err->getMessage());
        }
    }

    public function CreateData(object $req): JsonResponse
    {
        try {
            $datas = $this->service->store($req);

            return $this->jsonResponse(201, "Data berhasil disimpan!", $datas);
        } catch (Exception $err) {
            return $this->jsonResponse(500, null, $err->getMessage());
        }
    }

    public function GetByID(string $id): JsonResponse
    {
        try {
            $datas = $this->service->show($id);

            return $this->jsonResponse(200, "Data berhasil diambli!", $datas);
        } catch (Exception $err) {
            return $this->jsonResponse(500, null, $err->getMessage());
        }
    }

    public function UpdateByID(object $req, string $id): JsonResponse
    {
        try {
            $datas = $this->service->update($req, $id);

            return $this->jsonResponse(200, "Data berhasil disimpan!", $datas);
        } catch (Exception $err) {
            return $this->jsonResponse(500, $err->getMessage());
        }
    }

    public function DeleteByID(string $id): JsonResponse
    {
        try {
            $datas = $this->service->delete($id);

            return $this->jsonResponse(200, "Data berhasil dihapus!", $datas);
        } catch (Exception $err) {
            return $this->jsonResponse(500, $err->getMessage());
        }
    }
}
