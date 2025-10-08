<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use Illuminate\Http\JsonResponse;

use App\Services\V1\ToDoListService;
use App\Http\Requests\Api\ToDoListRequest;

class ToDoListController extends ApiController
{
    public function __construct(private ToDoListService $service) { parent::__construct($this->service); }

    public function index(Request $req): JsonResponse { return $this->GetAllDatas($req); }

    public function store(ToDoListRequest $req): JsonResponse { return $this->CreateData($req); }

    public function show(string $id): JsonResponse { return $this->GetByID($id); }

    public function update(ToDoListRequest $req, string $id): JsonResponse { return $this->UpdateByID($req, $id); }

    public function destroy(string $id): JsonResponse { return $this->DeleteByID($id); }

    public function getExportExcel(Request $req) { return $this->getExportExcel($req); }
}
