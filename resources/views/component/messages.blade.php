共 {{ $messages->total() }} 条留言
<ul class="list-group list-group-flush">
    @foreach ($messages as $message)
    <li class="list-group-item list-group-item-action" onclick="$('[name=reply_id]').val({{ $message->id }});$('[name=content]').attr('placeholder', '> @ {{ $message->user_name }}\n>\n> {{ $message->content }}').focus()">
        <div class="d-flex">
            <div class="flex-grow-1">
                <div class="text-muted">
                    @if (auth()->id() == $message->user_id)
                    <a href="{{ url('/home') }}">你</a>
                    @else
                    <a href="mailto:{{ $message->user_email }}">
                        {{ $message->user_name }}
                    </a>
                    @endif
                    发表于 {{ $message->created_at }}
                </div>
                {{ $message->content }}
            </div>
            @can('delete', $message)
            <button class="btn btn-danger flex-shrink-0 align-self-center"
                    style="height: 2.5rem"
                    form="delete"
                    formaction="{{ url('/messages', $message->id) }}"
                    type="submit">删除</button>
            @endcan
        </div>
        @if ($message->reply)
        <ul class="list-group">
            <li class="list-group-item">
                <a href="mailto:{{ $message->reply_user_email }}">
                    {{ $message->reply_user_name }}：
                </a>
                {{ $message->reply }}
            </li>
        </ul>
        @endif
    </li>
    @endforeach
</ul>

{{ $messages }}

<form id="delete"
      method="post">
    @method('delete')
    @csrf
</form>
