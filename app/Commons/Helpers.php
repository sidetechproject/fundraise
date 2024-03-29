<?php

use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

use function PHPUnit\Framework\assertFalse;

/*
 * Const general
 */

const PRICE_RANGE = [
    "" => "None",
    "0" => "< USD 500K",
    "1" => "USD 500K - 1M",
    "2" => "USD 1M - 5M",
    "3" => "USD 5M+",
];

const CATEGORIES = [
    "0" => "MarTech",
    "1" => "AgTech",
    "2" => "BioTech",
    "3" => "Cibersegurança",
    "4" => "Comunicação",
    "5" => "ConstruTech",
    "6" => "DeepTech",
    "7" => "EdTech",
    "8" => "EnergyTech",
    "9" => "ESG",
    "10" => "Mídia e entretenimento",
    "11" => "FinTech",
    "12" => "FoodTech",
    "13" => "Gestão de negócios e projetos",
    "14" => "GovTech",
    "15" => "GreenTech",
    "16" => "HealthTech",
    "17" => "HRTech",
    "18" => "Indústria",
    "19" => "InsurTech",
    "20" => "LegalTech",
    "21" => "Mobilidade",
    "22" => "PropTech",
    "23" => "PetTech",
    "24" => "Real Estate",
    "25" => "RegTech",
    "26" => "RetailTech",
    "27" => "SportsTech",
    "28" => "Telecom",
    "29" => "Turismo",
    "30" => "LogTech/Supply Chain",
];

const STAGE = [
    "0" => "Pre-seed",
    "1" => "Seed",
    "2" => "Series A",
    "3" => "Series B+",
];

const BUSINESS_MODEL = [
    "0" => "SaaS",
    "1" => "Pay-per-use",
    "2" => "Subscription",
    "3" => "Transactional",
    "4" => "Marketplace",
    "5" => "E-commerce",
    "6" => "Advertising",
    "7" => "Outro",
];

const TERMS = [
    "" => "None",
    "0" => "SAFE",
    "1" => "SAFT",
    "2" => "M&A"
];

const TAGS = [
    "0" => "Comunidade",
    "1" => "No-Code",
    "2" => "Marketplace",
    "3" => "Mídia social",
    "4" => "Finança",
    "5" => "Saúde",
    "6" => "Info Produto",
    "7" => "SaaS",
    "8" => "Crypto",
    "9" => "Consumidor",
    "10" => "Jogos",
    "11" => "Ferramentas de vendas",
    "12" => "Ferramentas de marketing",
    "13" => "Ferramentas de Produtividade",
];

const DAYS = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

const METRICS = [
    "MRR" => "$",
    "MAU" => "0",
    "Clients" => "0",
    "CAC" => "$",
    "LTV" => "$",
    "Cash Burn" => "$",
    "Churn" => "%"
];

const METRICS_FUND = [
    "MOIC" => "0",
    "TVPI" => "0",
    "IRR" => "0",
    "STARTUPS" => "0"
];

const SOCIAL_LIST = [
    'Linkedin' => [
        'icon' => 'la la-linkedin-f',
        'name' => 'Linkedin',
        'base_url' => 'https://www.linkedin.com/'
    ],
    'Facebook' => [
        'icon' => 'la la-facebook-f',
        'name' => 'Facebook',
        'base_url' => 'https://www.facebook.com/'
    ],
    'Instagram' => [
        'icon' => 'la la-instagram',
        'name' => 'Instagram',
        'base_url' => 'https://www.instagram.com/'
    ],
    'Twitter' => [
        'icon' => 'la la-twitter',
        'name' => 'Twitter',
        'base_url' => 'https://twitter.com/'
    ],
    'Youtube' => [
        'icon' => 'la la-youtube',
        'name' => 'Youtube',
        'base_url' => 'https://www.youtube.com/'
    ],
    // 'Pinterest' => [
    //     'icon' => 'la la-pinterest',
    //     'name' => 'Pinterest',
    //     'base_url' => 'https://www.pinterest.com/'
    // ],
    // 'Snapchat' => [
    //     'icon' => 'la la-snapchat',
    //     'name' => 'Snapchat',
    //     'base_url' => 'https://www.snapchat.com/'
    // ]
];

const STATUS = [
    0 => "Deactive",
    1 => "Active",
    2 => "Pending Approval",
    4 => "Deleted",
];

function isRoute($name = '')
{
    if (!$name || (is_array($name) && !count($name)) || !Request::route()) {
        return false;
    }
    if (is_array($name)) {
        return in_array(Request::route()->getName(), $name);
    }
    return Request::route()->getName() === $name;
}

/**
 * function helper
 * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable
 */
function user()
{
    return \Illuminate\Support\Facades\Auth::user();
}

function isActiveMenu($router_name)
{
    if (isRoute($router_name)) {
        return "active";
    }
    return "";
}

function isChecked($val1, $val2)
{
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            return "checked";
        } else {
            return "";
        }
    } else {
        if ($val1 == $val2) {
            return "checked";
        } else {
            return "";
        }
    }
}

function isSelected($val1, $val2)
{
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            return "selected";
        } else {
            return "";
        }
    } else {
        if ($val1 == $val2) {
            return "selected";
        } else {
            return "";
        }
    }
}

function isActive($val1, $val2)
{
    if (is_array($val2)) {
        if (in_array($val1, $val2)) {
            return "active";
        } else {
            return "";
        }
    } else {
        if ($val1 === $val2) {
            return "active";
        } else {
            return "";
        }
    }
}


function isDisabled($val1, $val2)
{
    if ($val1 === $val2) {
        return "disabled";
    } else {
        return "";
    }
}

function isMobile()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
        return true;
    }
    return false;
}

function generateRandomString($length = 5)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getImageUrl($image_file)
{
    if ($image_file) {
        return asset("uploads/{$image_file}");
    }
    return "https://via.placeholder.com/300x300?text=Fundraise";
}

function getUserAvatar($image_file)
{
    if ($image_file) {
        return "/uploads/{$image_file}";
    }
    return "/assets/images/default_avatar.svg";
}

function formatDate($date, $format)
{
    return Carbon::parse($date)->format($format);
}

if (!function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Models\Setting();
        }

        if (is_array($key)) {
            return \App\Models\Setting::set($key[0], $key[1]);
        }

        $value = \App\Models\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

function getSlug($request, $key)
{
    $language_default = \App\Models\Language::query()
        ->where('is_default', \App\Models\Language::IS_DEFAULT)
        ->select('code')
        ->first();
    $language_code = $language_default->code;
    $value = $request[$language_code][$key];
    $slug = \Illuminate\Support\Str::slug($value);
    return $slug;
}

function SEOMeta($title = '', $description = '', $image = null, $canonical = '', $type = 'website')
{
    $image = $image ? $image : asset('images/common/default-cover-fb-1.jpg');

    SEO::setTitle($title);
    SEO::setDescription($description);
    SEO::opengraph()->setUrl(url()->current());
    SEO::setCanonical(url()->current());
    SEO::opengraph()->addProperty('type', $type);
    SEO::opengraph()->addProperty("image", $image);
    SEO::opengraph()->addProperty("site_name", setting('app_name'));
}

function flagImageUrl($language_code)
{
    return asset("assets/images/flags/{$language_code}.png");
}

function getYoutubeId($url)
{
    //$url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
    parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
    return $my_array_of_vars ? $my_array_of_vars['v'] : '';
}

function getUserPaymentUrl()
{
    $user = \Illuminate\Support\Facades\Auth::user();

    if( $user->profile == 2 ){
        return env('URL_PLAN_INVESTOR');
    }

    return env('URL_PLAN_STARTUP');
}

function isActiveInvestor()
{
    $user = \Illuminate\Support\Facades\Auth::user();

    if( $user->profile == 2 && $user->subscribed() ){
        return true;
    }

    return false;
}

function isUserInvestor()
{
    $user = \Illuminate\Support\Facades\Auth::user();

    if( $user->profile == 2 ){
        return true;
    }

    return false;
}

function hasAccessToSeeStartup($startup)
{
    $user = \Illuminate\Support\Facades\Auth::user();
    if($user){
        $hasInviteToSeeStartup = \App\Models\Invite::where([
            'invited_email' => $user->email,
            'startup_id' => $startup->id
        ])->count();

        if( $user->isAdmin() ||
            ($user->profile == 2 && $user->subscribed()) ||
            $startup->user_id == $user->id ||
            $startup->featured ||
            $hasInviteToSeeStartup || in_array($user->id, ['124', '146']))
        {
            return true;
        }
    }

    return false;
}

function isStartupFromCurrentUser($startup)
{
    $user = \Illuminate\Support\Facades\Auth::user();

    if( $user && $user->id == $startup->user_id ){
        return true;
    }

    return false;
}

function isFundFromCurrentUser($startup)
{
    $user = \Illuminate\Support\Facades\Auth::user();

    if( $user && ($user->id == $startup->user_id) && $startup->place_type == 2 ){
        return true;
    }

    return false;
}

