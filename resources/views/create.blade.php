<h2>HTTP Requests and HTTP Responses</h2>

@if(!empty($input))
    @dump($input)
@endif

<div class="container">
    <div class="col-md-6"></div>
    <form action="{{ route('test') }}" method="post" role="form" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" value="" class="form-control" required>
        </div>
        <div class="form-group">
            <label>First name</label>
            <input type="text" name="first_name" id="first_name" value="" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" name="last_name" id="last_name" value="" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Create datetime</label>
            <input type="datetime-local" name="created_at" id="created_at" value="" class="form-control" required>
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="file" name="upload" id="upload" class="form-control" value="" multiple required>
        </div>
        <div class="form-group">
            <button type="submit" name="send" id="send" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>

