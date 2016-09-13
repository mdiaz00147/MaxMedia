<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Message: </h4>
            </div>
            <div class="modal-body">
                <center>    {!!Form::open(['route'=>'client.mail.store','method'=>'POST'])!!}
                    <div class="col-md-6 contact-left">
                        {!!Form::text('name',null,['placeholder' => 'Name'])!!}
                    </div>
                    <div class="col-md-6 contact-right">
                        {!!Form::textarea('mensaje',null,['placeholder' => 'which is the message that you want?'])!!}
                    </div>
                <button type="submit" class="btn btn-primary">Send message</button>
                    {!!Form::close()!!}
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


            </div>
        </div>
    </div>
</div>

