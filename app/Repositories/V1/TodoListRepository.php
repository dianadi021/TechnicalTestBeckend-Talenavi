<?php

namespace App\Repositories\V1;

use Carbon\Carbon;

use App\Traits\Tools;

use App\Models\ToDoList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;

class ToDoListRepository
{
    use Tools;
    private $todoModel;
    public function __construct()
    {
        $this->todoModel = new ToDoList();
    }

    public function index(object $req)
    {
        try {
            $rawQry = $this->todoModel::query();

            if ($req->has('title')) {
                $tmpVal = $req->input('title');
                $rawQry->where('title', 'like', "{$tmpVal}");
            }

            if ($req->has('assignee')) {
                $tmpVal = $req->input('assignee');
                $rawQry->where('assignee', 'like', "{$tmpVal}");
            }

            if ($req->has('due_date')) {
                $tmpVal = $req->input('due_date');
                $rawQry->where('due_date', 'like', "{$tmpVal}");
            }

            if ($req->has('status')) {
                $tmpVal = $req->input('status');
                $rawQry->where('status', 'like', "{$tmpVal}");
            }

            if ($req->has('priority')) {
                $tmpVal = $req->input('priority');
                $rawQry->where('priority', 'like', "{$tmpVal}");
            }

            return $rawQry->get();
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }


    public function create() {}

    public function store(object $req)
    {
        try {
            Log::info("START SIMPAN TODO LIST: " . json_encode($req->all(), JSON_PRETTY_PRINT));

            $validated = $req->validated();

            if (Carbon::parse($validated["due_date"])->lt(now())) {
                throw new Exception("Tanggal tidak boleh kurang dari hari ini!");
            }

            $data = $this->todoModel->create($validated);

            if (!$data) {
                throw new Exception("Error Processing Request");
            }

            return $data;
        } catch (Exception $err) {
            Log::error("GAGAL SIMPAN TODO LIST: " . $err->getMessage());
            throw new Exception($err->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            return $this->todoModel::find($id);
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }

    public function edit(string $id) {}

    public function update(object $req, string $id) {
        try {
            Log::info("START UPDATE TODO LIST: " . json_encode($req->all(), JSON_PRETTY_PRINT));

            $validated = $req->validated();

            if (Carbon::parse($validated["due_date"])->lt(now())) {
                throw new Exception("Tanggal tidak boleh kurang dari hari ini!");
            }

            $data = $this->todoModel::find($id);
            $data->update($validated);

            return $data;
        } catch (Exception $err) {
            Log::error("GAGAL UPDATE TODO LIST: " . $err->getMessage());
            throw new Exception($err->getMessage());
        }
    }

    public function destroy(string $id) {
        try {
            return $this->todoModel::find($id)->delete();
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }

    public function getExportExcel(object $req) {}

    public function getChartData(object $req) {}
}
