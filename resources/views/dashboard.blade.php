<form method="Post" action="{{route('create_topik.store')}}">
    @csrf
    <div class="modal-header d-flex align-items-center bg-primary text-white">
        <h6 class="modal-title mb-0" id="threadModalLabel">New Discussion</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="threadTitle">Topic</label>
            <input type="text" name="topic" class="form-control" id="threadTitle"
                   placeholder="Enter new topic" required autofocus/>
        </div>
        <textarea name="subtopic" class="form-control summernote" required></textarea>
        <div class="custom-file form-control-sm mt-3" style="max-width: 300px;">
            <input type="file" class="custom-file-input" id="customFile" multiple />
            <label class="custom-file-label" for="customFile">Attachment</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value="submit">
    </div>
</form>
