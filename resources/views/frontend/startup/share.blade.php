@push('styles')
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
::selection {color: #fff;background: #66e3c4;}.popup-share {position: absolute;left: 50%;}button {outline: none;cursor: pointer;font-weight: 500;border-radius: 4px;border: 2px solid transparent;transition: background 0.1s linear, border-color 0.1s linear, color 0.1s linear;}.popup-share {background: #fff;padding: 25px;border-radius: 15px;top: 0;max-width: 380px;width: 100%;opacity: 0;pointer-events: none;box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);transform: translate(-50%, -50%) scale(1.2);transition: top 0s 0.2s ease-in-out, opacity 0.2s 0s ease-in-out, transform 0.2s 0s ease-in-out;top: 0 !important;z-index: 99999999 !important;left: 70%;}.popup-share.show {top: 50%;opacity: 1;pointer-events: auto;transform: translate(-50%, -50%) scale(1);transition: top 0s 0s ease-in-out, opacity 0.2s 0s ease-in-out, transform 0.2s 0s ease-in-out;}.popup-share :is(header, .icons, .field) {display: flex;align-items: center;justify-content: space-between;}.popup-share header {padding-bottom: 15px;border-bottom: 1px solid #ebedf9;}.popup-share header span {font-size: 21px;font-weight: 600;}.popup-share header .close, .popup-share .icons a {display: flex;align-items: center;border-radius: 50%;justify-content: center;transition: all 0.3s ease-in-out;}.popup-share header .close {color: #878787;font-size: 17px;background: #f2f3fb;height: 33px;width: 33px;cursor: pointer;}.popup-share header .close:hover {background: #ebedf9;}.popup-share .content {margin: 20px 0;}.popup-share .icons {margin: 15px 0 20px 0;}.popup-share .content p {font-size: 16px;}.popup-share .content .icons a {height: 50px;width: 50px;font-size: 20px;text-decoration: none;border: 1px solid transparent;}.popup-share .icons a i {transition: transform 0.3s ease-in-out;}.popup-share .icons a:nth-child(1) {color: #1877f2;border-color: #b7d4fb;}.popup-share .icons a:nth-child(1):hover {background: #1877f2;}.popup-share .icons a:nth-child(2) {color: #46c1f6;border-color: #b6e7fc;}.popup-share .icons a:nth-child(2):hover {background: #46c1f6;}.popup-share .icons a:nth-child(3) {color: #e1306c;border-color: #f5bccf;}.popup-share .icons a:nth-child(3):hover {background: #e1306c;}.popup-share .icons a:nth-child(4) {color: #25d366;border-color: #bef4d2;}.popup-share .icons a:nth-child(4):hover {background: #25d366;}.popup-share .icons a:nth-child(5) {color: #0088cc;border-color: #b3e6ff;}.popup-share .icons a:nth-child(5):hover {background: #0088cc;}.popup-share .icons a:hover {color: #fff;border-color: transparent;}.popup-share .icons a:hover i {transform: scale(1.2);}.popup-share .content .field {margin: 12px 0 -5px 0;height: 45px;border-radius: 4px;padding: 0 5px;border: 1px solid #e1e1e1;}.popup-share .field.active {border-color: #66e3c4;}.popup-share .field i {width: 50px;font-size: 18px;text-align: center;}.popup-share .field.active i {color: #66e3c4;}.popup-share .field input {width: 100%;height: 100%;border: none;outline: none;font-size: 15px;}.popup-share .field button,.popup-share .textarea button {color: #000;padding: 5px 18px;background: #66e3c4;}.popup-share .field button:hover {background: #66e3c4;}
.popup-share .content textarea {
    margin: 12px 0 -5px 0;
    height: 100px;
    border-radius: 4px;
    padding: 5px 10px;
    border: 1px solid #e1e1e1;
    width: 100%;
    margin-bottom: 10px;
}
</style>
@endpush


<div class="popup-share popup-share-startup-{{$startup->id}}">
    <header>
        <span>Share Profile</span>
        <div class="close"><i class="uil uil-times"></i></div>
    </header>
    <div class="content">

        <p>Share your profile via</p>

        <ul class="icons">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('place_detail', $startup->id)}}" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{route('place_detail', $startup->id)}}&text={{ $startup->name }}" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{route('place_detail', $startup->id)}}" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://wa.me?text={{route('place_detail', $startup->id)}}" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://telegram.me/share/url?url={{route('place_detail', $startup->id)}}&text={{ $startup->name }}" target="_blank">
                <i class="fab fa-telegram-plane"></i>
            </a>
        </ul>

        <p>Or copy link</p>

        <div class="field mb-3">
            <i class="url-icon uil uil-link"></i>
            <input type="text" readonly value="{{route('place_detail', $startup->id)}}">
            <button>Copy</button>
        </div>
    </div>
</div>

@push('scripts')
  <script>
    $(".share-profile-{{$startup->id}}").click(function(){
        $(".popup-share-startup-{{$startup->id}}").toggleClass('show');
    });

    $(".popup-share-startup-{{$startup->id}} .close").click(function(){
        $(".popup-share-startup-{{$startup->id}}").toggleClass('show');
    });

    // const shareProfile = document.querySelector(".share-profile"),
    // popup_share = document.querySelector(".popup-share"),
    // close_share = popup_share.querySelector(".close"),
    // field_share = popup_share.querySelector(".field"),
    // input_share = field_share.querySelector("input"),
    // copy_share = field_share.querySelector("button");

    // shareProfile.onclick = () => {
    //     popup_share.classList.toggle("show");
    // };

    // close_share.onclick = () => {
    //     shareProfile.click();
    // };

    // copy_share.onclick = () => {
    //     input_share.select();
    //     if (document.execCommand("copy")) {
    //         field_share.classList.add("active");
    //         copy_share.innerText = "Copied";
    //         setTimeout(() => {
    //         window.getSelection().removeAllRanges();
    //         field_share.classList.remove("active");
    //         copy_share.innerText = "Copy";
    //         }, 3000);
    //     }
    // };
  </script>
@endpush
