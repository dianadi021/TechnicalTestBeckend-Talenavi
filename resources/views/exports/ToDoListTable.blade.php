<x-app-layout>
    <div class="w-full">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-center" colspan="7">ToDo List</th>
                </tr>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Assignee</th>
                    <th class="text-center">Due Date</th>
                    <th class="text-center">Time Tracked</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Priority</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($todo_list) && count($todo_list) > 0)
                    @foreach ($todo_list as $key => $item)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->assignee }}</td>
                            <td class="text-center">{{ $item->due_date }}</td>
                            <td class="text-center">{{ $item->time_tracked }}</td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">{{ $item->priority }}</td>
                        </tr>
                    @endforeach

                    @php
                        $total_time_tracked = 0;
                        foreach ($todo_list as $item) :
                            $total_time_tracked += $item->time_tracked;
                        endforeach;
                    @endphp
                    <tr>
                        <td class="text-center" colspan="3">Summary Row</td>
                        <td class="text-center">Total Time Tracked</td>
                        <td class="text-center">{{ $total_time_tracked }}</td>
                    </tr>
                @else
                    <tr>
                        <td class="text-center" colspan="7"><i>Tidak ada data</i></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="w-full">
        <table>
            <thead>
                <tr>
                    <th class="text-center" colspan="2">Status Summary</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($status_summary) && count($status_summary) > 0)
                    @foreach ($status_summary as $key =>$item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="2"><i>Tidak ada data</i></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="w-full">
        <table>
            <thead>
                <tr>
                    <th class="text-center" colspan="2">Priority Summary</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($priority_summary) && count($priority_summary) > 0)
                    @foreach ($priority_summary as $key =>$item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="2"><i>Tidak ada data</i></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="w-full">
        <table>
            <thead>
                <tr>
                    <th class="text-center" colspan="4">Assignee Summary</th>
                </tr>
                <tr>
                    <th class="text-center">Assignee</th>
                    <th class="text-center">Total ToDo</th>
                    <th class="text-center">Total Pending ToDo</th>
                    <th class="text-center">Total Time Tracked</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($assignee_summary) && count($assignee_summary) > 0)
                    @foreach ($assignee_summary as $key =>$item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item["total_todos"] }}</td>
                            <td>{{ $item["total_pending_todos"] }}</td>
                            <td>{{ $item["total_timetracked_completed_todos"] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="4"><i>Tidak ada data</i></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
