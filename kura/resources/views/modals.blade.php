<style>
    @media screen and (max-width: 500px) {
        #preview-modal .modal-content {
            height: 360px
        }
    }
</style>
<div class="modal fade" id="preview-modal" style="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nous vous livrons à votre domicile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: gray">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="delivery" checked>
                    <label class="custom-control-label" for="delivery"><b>Livraison</b></label>
                </div>
                <br><br>
                <div id="map-bloc" class="animated fadeInDown delay-2s">
                    <b>Veuillez indiquer l'adresse de livraison</b>
                    <br><br>
                    <input type="text" placeholder="Rue, Quartier" class="form-control">
                </div>
                {{--<div id="map-bloc" class="animated fadeInDown delay-2s">--}}
                    {{--Veuillez préciser votre position géographique--}}
                    {{--<br><br>--}}
                    {{--<div style="height: 300px">--}}
                        {{--<div id="map"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="modal-footer">
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                    <a id="continue" href="#" class="btn btn-primary" data-mode="" data-toggle="modal" data-target="#invoice-modal" data-dismiss="modal">Continuer</a>
                {{--<a href="#" class="form-paid" data-mode="" data-toggle="" data-target="" data-dismiss=""><button type="submit" class="btn btn-primary" id="paid">Payer <b class="total-basket"></b> <sup>FCFA</sup></button></a>--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal fade" id="invoice-modal" style="height: 700px !important;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Prévisualisation de la Facture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="" frameborder="0" id="invoice-frame" width="100%" height="500px">
                </iframe>
                <button type="reset" class="btn btn-default pull-left" data-dismiss="modal">Annuler</button>
                {{--<div id="paypal-button-container"></div>--}}
                <a href="#" id="form-paid" data-mode=""><button type="submit" class="btn btn-primary" id="paid">Payer</button></a>
            </div>
            {{--<input type="hidden" id="phone-number">--}}
            {{--<input type="hidden" id="amount">--}}
            {{--<input type="hidden" id="id">--}}
            {{--<input type="hidden" id="mode">--}}
            {{--<input type="hidden" id="id-type">--}}
            {{--<input type="hidden" id="type">--}}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

