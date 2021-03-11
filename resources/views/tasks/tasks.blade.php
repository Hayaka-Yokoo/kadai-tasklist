@if(count($tasks) > 0)
        <table class="table table-striped">
            <thread>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thread>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    {{-- タスク詳細ページへのリンク --}}
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            @if (Auth::id() == $task->user_id)
                {{-- 投稿削除ボタンのフォーム --}}
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>

        {{-- ページネーションのリンク --}}
        {{ $tasks->links() }}
@endif