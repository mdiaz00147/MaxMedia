<div  id="Mymodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Request  Payment</h4>
            </div>
            <div class="modal-body">
                <center><form role="form" method="POST" action="{{ route('client.mailpayment.store') }}" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="revenue" value="{{ $r->reve }}">

                    <div class="form-group">
                        <label for="ejemplo_password_1">Amount</label>
                        <label for="" class="text-danger">Max quantity : {{ ($r->reve - $re->c)- $payment->b }}</label>
                        <input type="text" name="cantidad" class="form-control" id="ejemplo_password_1"
                               placeholder="Dolars">

                    </div>
                            @if(($r->reve - $re->c)- $payment->b > 1000)
                            <div class="form-group">
                                <label for="ejemplo_email_1">Code Bank</label>
                                <input type="text" name="code">
                            </div>
                        @endif
                    <div class="form-group">
                        <label for="ejemplo_email_1">Email payment</label>
                        <input type="text" name="email">
                    </div>
                    <button type="submit" class="btn btn-default">Request</button>
                </form>
            </center>
            </div>
            <div class="modal-footer">
                <button type="submint" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>