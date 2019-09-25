<form action="{{ url('/messages') }}"
      method="post">
    @csrf
    <input type="hidden"
           name="reply_id"
           value="0">
    <textarea class="bg-light form-control"
              name="content"
              placeholder="不说点什么？"
              rows="5"
              required></textarea>
    @error('*')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button class="btn btn-block btn-primary"
            type="submit">留言</button>
</form>
<hr>
