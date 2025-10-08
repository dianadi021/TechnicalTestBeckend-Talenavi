<?php

namespace App\Repositories\V1;

use Error;

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

    public function index($req = null)
    {
    }

    public function store(object $req)
    {
        try {
            Log::info("START SIMPAN TODO LIST: " . json_encode($req->all(), JSON_PRETTY_PRINT));

            $validated = $req->validated();
            $isOke = $this->todoModel->create($validated);

            if (!$isOke) {
                throw new Exception("Error Processing Request");
            }

        } catch (Exception $th) {
            DB::rollBack();
            Log::error("GAGAL SIMPAN TODO LIST: " . $th);
            throw $th;
        }
    }

    public function show(string $id)
    {
    }

    public function update(object $req, string $id)
    {
        try {
            Log::info("START UPDATE TODO LIST: " . $req->all());
        } catch (Exception $th) {
            Log::error("GAGAL UPDATE TODO LIST: " . $th->getMessage());
            throw $th;
        }
    }

    public function destroy(string $id) {}

    public function getExportExcel() {}
}
