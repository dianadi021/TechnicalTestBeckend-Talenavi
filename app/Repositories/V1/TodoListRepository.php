<?php

namespace App\Repositories\V1;

use Exception;

use Carbon\Carbon;

use App\Traits\Tools;

use App\Models\ToDoList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function update(object $req, string $id)
    {
        try {
            $data = $this->todoModel::find($id);

            if (!$data) {
                throw new Exception("Data tidak ditemukan!");
            }

            Log::info("START UPDATE TODO LIST: " . json_encode($req->all(), JSON_PRETTY_PRINT));

            $validated = $req->validated();

            if (Carbon::parse($validated["due_date"])->lt(now())) {
                throw new Exception("Tanggal tidak boleh kurang dari hari ini!");
            }

            $data->update($validated);

            $data = $this->todoModel::find($id);

            return $data;
        } catch (Exception $err) {
            Log::error("GAGAL UPDATE TODO LIST: " . $err->getMessage());
            throw new Exception($err->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = $this->todoModel::find($id);

            if (!$data) {
                throw new Exception("Data tidak ditemukan!");
            }

            return $data->delete();
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }

    public function getExportExcel(object $req)
    {
        try {
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }

    public function getChartData(object $req) {
        try {
            $returnDatas = [];

            if ($req->has('type')) {
                $tmpVal = $req->input('type');
                $rawQry = $this->todoModel::query();

                // Status
                if ($tmpVal === "status") {
                    $tmpDatas = $rawQry->select(["status", DB::raw("count(*) as total")])
                                ->groupBy("status")
                                ->get();

                    $tmpReturn = [];
                    foreach ($tmpDatas as $list) {
                        $tmpReturn[$list->status] = $list->total;
                    }

                    $returnDatas = [ "status_summary" => $tmpReturn ];
                }

                // Priority
                if ($tmpVal === "priority") {
                    $tmpDatas = $rawQry->select([
                                    DB::raw("case when `priority` is null then 'unset' else `priority` END AS `priority`"),
                                    DB::raw("count(*) as total")
                                ])
                                ->groupBy("priority")
                                ->get();

                    $tmpReturn = [];
                    foreach ($tmpDatas as $list) {
                        $tmpReturn[$list->priority] = $list->total;
                    }

                    $returnDatas = [ "priority_summary" => $tmpReturn ];
                }

                // Assignee
                if ($tmpVal === "assignee") {
                    $rawQry = <<<SQL
                        WITH
                        tmpTotalTodos AS (
                            SELECT
                                CASE WHEN assignee IS NULL THEN 'unset' ELSE assignee END AS assignee_ttd,
                                COUNT(id) AS total_todos
                            FROM todo_lists tl
                            GROUP BY assignee
                        ),
                        tmpTotalPending AS (
                            SELECT
                                CASE WHEN assignee IS NULL THEN 'unset' ELSE assignee END AS assignee_ttp,
                                COUNT(id) AS total_pending
                            FROM todo_lists tl
                            WHERE tl.status = 'pending'
                            GROUP BY assignee
                        ),
                        tmpCompleted AS (
                            SELECT
                                CASE WHEN assignee IS NULL THEN 'unset' ELSE assignee END AS assignee_ttc,
                                SUM(time_tracked) AS total_time_tracked
                            FROM todo_lists tl
                            WHERE tl.status = 'completed'
                            GROUP BY assignee
                        )
                        SELECT
                            CASE WHEN tl.assignee IS NULL THEN 'unset' ELSE tl.assignee END AS assignee,
                            COALESCE(ttd.total_todos, 0) AS total_todos,
                            COALESCE(ttp.total_pending, 0) AS total_pending,
                            COALESCE(ttc.total_time_tracked, 0) AS total_time_tracked
                        FROM todo_lists tl
                        LEFT JOIN tmpTotalTodos ttd ON (ttd.assignee_ttd = tl.assignee OR tl.assignee IS NULL)
                        LEFT JOIN tmpTotalPending ttp ON (ttp.assignee_ttp = tl.assignee OR tl.assignee IS NULL)
                        LEFT JOIN tmpCompleted ttc ON (ttc.assignee_ttc = tl.assignee)
                        GROUP BY tl.assignee, ttd.total_todos, ttp.total_pending, ttc.total_time_tracked
                    SQL;

                    $tmpDatas = DB::select($rawQry);

                    $tmpReturn = [];
                    foreach ($tmpDatas as $list) {
                        $tmpAssignee = trim($list->assignee);
                        $tmpReturn[$tmpAssignee] = [
                            "total_todos" => $list->total_todos,
                            "total_pending_todos" => $list->total_pending,
                            "total_timetracked_completed_todos" => (int) $list->total_time_tracked,
                        ];
                    }

                    $returnDatas = [ "assignee_summary" => $tmpReturn ];
                }
            }

            return $returnDatas;
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }
}
