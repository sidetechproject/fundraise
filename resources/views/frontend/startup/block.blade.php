<style>
.modal_block {
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 10040;
    overflow: auto;
    overflow-y: auto;
}
.modal_block .modal-dialog {
    max-width: 100% !important;
    width: 100%;
    bottom: 0;
    position: absolute;
    margin: 0;
}
.modal_block .modal-header {
    align-items: center;
    justify-content: center;
}
.modal_block .modal-content {
    text-align: center;
    height:50vh;
    background-color: #ffffff;
    background-image: linear-gradient(to top, #e0e7ff, rgb(224 231 255 / 0));
    background-position: right 0 bottom !important;
}
</style>
<div class="modal fade modal_block" id="modal_block" tabindex="-1" role="dialog" aria-labelledby="modal_booking_detail" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Fundraise Profile</h1>
            </div>

            <div class="modal-body m-auto" style="max-width: 550px">
                <p style="font-size: 18px">
                    Join our fundraise platform and access this Startup and a diverse range of carefully selected startup profiles seeking funding. <br /><br />
                    Our user-friendly platform offers powerful search and filtering tools to help you find startups that match your investment criteria. <br /><br />
                </p>

                <a href="{{route('signup')}}" class="btn m-4">
                    Create Free Account
                </a>
            </div>
        </div>
    </div>
</div>

