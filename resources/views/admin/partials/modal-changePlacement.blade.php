<div class="modal fade" id="changeRevenue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          {!! Form::open(['route'=> 'admin.add.revenue','method' => 'POST']) !!}
          <div class="form-group">
              <label for="message-text" class="control-label">Date Revenue:</label>
              <input type="text" id="datepicker3" id="dateChange" name="fecha" class="form-control">
          </div>
      </div>
        <input type="hidden"  name="id" id="moreId">
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
        {!! Form::close() !!}
    </div>
  </div>
</div>
