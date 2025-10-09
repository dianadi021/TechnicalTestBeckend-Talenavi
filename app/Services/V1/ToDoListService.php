<?php

namespace App\Services\V1;

use App\Traits\ResponseCode;
use Illuminate\Contracts\View\View;

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

    public function tableView(object $req): View {
        $data = $this->repos->tableView($req);
        return view('exports.ToDoListTable', $data);
    }

    public function getExportExcel(object $req) { return $this->repos->getExportExcel($req); }

    public function getChartData(object $req) { return $this->repos->getChartData($req); }
}
