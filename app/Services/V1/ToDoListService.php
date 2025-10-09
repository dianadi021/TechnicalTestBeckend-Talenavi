<?php

namespace App\Services\V1;

use Exception;

use App\Traits\ResponseCode;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Repositories\V1\ToDoListRepository;

class ToDoListService
{
    use ResponseCode;

    private $dateNow, $repos, $ToDoListSession;
    public function __construct() { $this->repos = new ToDoListRepository(); }

    public function index(object $req) { return $this->repos->index($req); }

    public function store(object $req) { return $this->repos->store($req); }

    public function show(string $id) { return $this->repos->show($id); }

    public function update(object $req, string $id) { return $this->repos->update($req, $id); }

    public function destroy(string $id) { return $this->repos->destroy($id); }

    public function getExportExcel(object $req) {
        try {
            // $this->repos->getExportExcel($req);

            $filename = "todo_list-" . now() . ".xlsx";

            return Excel::download(new UsersExport, $filename, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
        } catch (Exception $err) {
            throw new Exception($err->getMessage());
        }
    }

    public function getChartData(object $req) { return $this->repos->getChartData($req); }
}
