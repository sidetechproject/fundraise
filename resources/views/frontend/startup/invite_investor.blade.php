@push('styles')
<style>

</style>
@endpush

<div class="popup-share popup-invite-{{$startup->id}}">
    <header>
        <span>Invite Investor or Partner</span>
        <div class="close"><i class="uil uil-times"></i></div>
    </header>
    <div class="content">
        <p>Invite yours future Investors or your partners to access <strong>{{ $startup->name }} Fundraise Profile</strong>.</p>

        <form action="{{route('send_invite')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
            <input type="hidden" id="invite" name="_method" value="POST">
            <input type="hidden" id="startup_id" name="startup_id" value="{{$startup->id}}">
            @csrf

            <div class="textarea">
                <textarea type="textarea" name="emails" placeholder="investor-1@email.com; investor-2@email.com" rows="10"></textarea>

                <button type="submit" class="float-right" id="">Send</button>
            </div>
        </form>

    </div>
</div>

@push('scripts')
  <script>
    $(".invite-investor-{{$startup->id}}").click(function(){
        $(".popup-invite-{{$startup->id}}").toggleClass('show');
    });

    $(".popup-invite-{{$startup->id}} .close").click(function(){
        $(".popup-invite-{{$startup->id}}").toggleClass('show');
    });

    // const inviteInvestor = document.querySelector(".invite-investor"),
    // popup_invite = document.querySelector(".popup-invite-{{$startup->id}}"),
    // close_invite = popup_invite.querySelector(".close"),
    // textarea_invite = popup_invite.querySelector(".textarea"),
    // input_invite = textarea_invite.querySelector("input"),
    // btn_invite = textarea_invite.querySelector("button");

    // inviteInvestor.onclick = () => {
    //     popup_invite.classList.toggle("show");
    // };

    // close_invite.onclick = () => {
    //     inviteInvestor.click();
    // };

    // btn_invite.onclick = () => {

    // };
  </script>
@endpush
