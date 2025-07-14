<?php

use App\Models\Blog;
use App\Models\Country;
use App\Models\Option;
use App\Models\Property;
use App\Models\PropertyView;
use App\Models\User;
use App\Models\UserFevorit;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Exception\DateTimeException;

function log_info($txt = 'Log Info')
{
    Log::info($txt);
}

function log_error($txt = 'Log Error')
{
    Log::error($txt);
}

if (!function_exists('get_option')) {
    function get_option(mixed $key)
    {
        if (is_array($key)) {
            return Option::whereIn('key', $key)->pluck('value', 'key')->toArray();
        } else {
            $option = Option::where('key', $key)->first();
            return $option?->value ?? null;
        }
    }
}

//image crop and resize====================================================>
function image_resize($image, $image_save_path = 'uploads', $height = '250', $width = '320')
{
    $data = [
        'name' => $image->getClientOriginalName(),
        'tmp_name' => $image->getRealPath(),
    ];
    $image_save_path = storage_path('app/public/' . $image_save_path . '/');
    try {
        if ($data['name'] != "") {
            $uploadedFile = $data['tmp_name'];
            $sourceProperties = getimagesize($uploadedFile);
            $tmpFileName = "tmp-" . rand(111, 999) . rand(111111, 999999) . time();
            $thumbFileName = uniqid('IMG_');
            $dirPath = $image_save_path;
            $ext = pathinfo($data['name'], PATHINFO_EXTENSION);
            $imageType = $sourceProperties[2];
            try {
                $exif = exif_read_data($uploadedFile);
                if (!empty($exif['Orientation'])) {
                    $orientation = $exif['Orientation'];
                    $image = imagecreatefromstring(file_get_contents($uploadedFile));

                    switch ($orientation) {
                        case 3:
                            $image = imagerotate($image, 180, 0);
                            break;
                        case 6:
                            $image = imagerotate($image, -90, 0);
                            break;
                        case 8:
                            $image = imagerotate($image, 90, 0);
                            break;
                    }
                    switch ($imageType) {
                        case IMAGETYPE_PNG:
                            imagepng($image, $uploadedFile);
                            break;
                        case IMAGETYPE_JPEG:
                            imagejpeg($image, $uploadedFile, 100);
                            break;
                        case IMAGETYPE_GIF:
                            imagegif($image, $uploadedFile);
                            break;
                        case IMAGETYPE_WEBP:
                            imagewebp($image, $uploadedFile, 100);
                            break;
                        case IMAGETYPE_AVIF:
                            imageavif($image, $uploadedFile, 100);
                            break;
                        default:
                            return false;
                    }
                    $sourceProperties = getimagesize($uploadedFile);
                    imagedestroy($image);
                }
            } catch (\Throwable $th) {
            }

            $originalWidth = $sourceProperties[0];
            $originalHeight = $sourceProperties[1];
            $maxWidth = $width;
            $maxHeight = $height;

            if ($originalWidth < $maxWidth) {
                $maxWidth = $originalWidth;
            }
            if ($originalHeight < $maxHeight) {
                $maxHeight = $originalHeight;
            }
            if ($maxWidth == 0) {
                $maxWidth = round(($originalWidth / $originalHeight) * $maxHeight, 0);
            }
            if ($maxHeight == 0) {
                $maxHeight = round(($originalHeight / $originalWidth) * $maxWidth, 0);
            }

            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $resizedimg = resize($maxWidth, $maxHeight, $uploadedFile);
                    imagepng($resizedimg, $dirPath . $tmpFileName . "." . $ext);
                    $resizedimg = $dirPath . $tmpFileName . "." . $ext;
                    $resizedimgname = $tmpFileName . "." . $ext;
                    break;
                case IMAGETYPE_JPEG:
                    $resizedimg = resize($maxWidth, $maxHeight, $uploadedFile);
                    imagejpeg($resizedimg, $dirPath . $tmpFileName . "." . $ext, 100);
                    $resizedimg = $dirPath . $tmpFileName . "." . $ext;
                    $resizedimgname = $tmpFileName . "." . $ext;
                    break;
                case IMAGETYPE_GIF:
                    $resizedimg = resize($maxWidth, $maxHeight, $uploadedFile);
                    imagegif($resizedimg, $dirPath . $tmpFileName . "." . $ext);
                    $resizedimg = $dirPath . $tmpFileName . "." . $ext;
                    $resizedimgname = $tmpFileName . "." . $ext;
                    break;
                case IMAGETYPE_WEBP:
                    $resizedimg = resize($maxWidth, $maxHeight, $uploadedFile);
                    imagewebp($resizedimg, $dirPath . $tmpFileName . "." . $ext, 100);
                    $resizedimg = $dirPath . $tmpFileName . "." . $ext;
                    $resizedimgname = $tmpFileName . "." . $ext;
                    break;
                case IMAGETYPE_AVIF:
                    $resizedimg = resize($maxWidth, $maxHeight, $uploadedFile);
                    imageavif($resizedimg, $dirPath . $tmpFileName . "." . $ext, 100);
                    $resizedimg = $dirPath . $tmpFileName . "." . $ext;
                    $resizedimgname = $tmpFileName . "." . $ext;
                    break;
                default:
                    return false;
            }
            $resizedimgsize = getimagesize($resizedimg);
            if ($width <= $resizedimgsize[0]) {
                $selectorwidth = $width;
            } else {
                $selectorwidth = $resizedimgsize[0];
            }
            if ($height <= $resizedimgsize[1]) {
                $selectorheight = $height;
            } else {
                $selectorheight = $resizedimgsize[1];
            }
            $return = [
                'status' => env('MANUAL_CROP_ENABLED') ? 1 : 2,
                'image_name' => $resizedimgname,
                'maxWidth' => $maxWidth,
                'maxHeight' => $maxHeight,
                'resizedimg' => $resizedimg,
                'resize_height' => $resizedimgsize[1],
                'resize_width' => $resizedimgsize[0],
                'selector_width' => $selectorwidth,
                'selector_height' => $selectorheight,
                'dir_path' => $dirPath,
                'thumbFileName' => $thumbFileName,
                'ext' => $ext
            ];
            return $return;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        return false;
    }
}

function resize($maxWidth, $maxHeight, $originalFile)
{
    try {
        $info = getimagesize($originalFile);
        $mime = $info['mime'];
        switch ($mime) {
            case 'image/jpeg':
                $image_create_func = 'imagecreatefromjpeg';
                $image_save_func = 'imagejpeg';
                $new_image_ext = 'jpg';
                break;
            case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                $image_save_func = 'imagepng';
                $new_image_ext = 'png';
                break;
            case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                $new_image_ext = 'gif';
                break;
            case 'image/webp':
                $image_create_func = 'imagecreatefromwebp';
                $image_save_func = 'imagewebp';
                $new_image_ext = 'webp';
                break;
            case 'image/avif':
                $image_create_func = 'imagecreatefromavif';
                $image_save_func = 'imageavif';
                $new_image_ext = 'avif';
                break;
            default:
                throw new Exception('Unknown image type.');
        }
        $img = $image_create_func($originalFile);
        list($width, $height) = getimagesize($originalFile);
        if ($width > $height) { // Landscape image - Calculate new width
            $newWidth = ($width / $height) * $maxHeight;
            $newHeight = $maxHeight;
            if ($newWidth < $maxWidth) {
                $newWidth = $maxWidth;
                $newHeight = ($height / $width) * $maxWidth;
            }
        } else { // Protrait or Square - Calculate new height
            $newWidth = $maxWidth;
            $newHeight = ($height / $width) * $maxWidth;
            if ($newHeight < $maxHeight) {
                $newWidth = ($width / $height) * $maxHeight;
                $newHeight = $maxHeight;
            }
        }
        $newWidth = round($newWidth, 0);
        $newHeight = round($newHeight, 0);
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        return $tmp;
    } catch (\Throwable $th) {
        return false;
    }
}
function final_crop($data)
{
    try {
        if (isset($data['crop_image'])) {
            $y1 = $data['top'];
            $x1 = $data['left'];
            $w = $data['right'] == 0 ? null : $data['right'];
            $h = $data['bottom'] == 0 ? null : $data['bottom'];
            $image = $data['image'];
            $maxWidth = round($data['maxWidth'], 0);
            $maxHeight = round($data['maxHeight'], 0);
            $dirPath = $data['dirPath'];
            $thumbFileName = $data['thumbFileName'];
            $ext = $data['ext'];

            $sourceProperties = getimagesize($image);

            // If top, left, right, and bottom values are not set or are 0, auto crop from the middle
            if ($w === null && $h === null) {
                // Calculate center cropping
                $centerX = $sourceProperties[0] / 2;
                $centerY = $sourceProperties[1] / 2;
                $cropWidth = $maxWidth;
                $cropHeight = $maxHeight;
                $x1 = max(0, $centerX - ($cropWidth / 2));
                $y1 = max(0, $centerY - ($cropHeight / 2));
                $w = min($sourceProperties[0], $cropWidth);
                $h = min($sourceProperties[1], $cropHeight);
            }

            $resizedWidth = $sourceProperties[0];
            $resizedHeight = $sourceProperties[1];
            $imageType = $sourceProperties[2];
            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageSrc = imagecreatefrompng($image);
                    $newImageLayer = imagecreatetruecolor($maxWidth, $maxHeight);
                    $tmp = imageCropResize($imageSrc, $resizedWidth, $resizedHeight, $w, $h, $x1, $y1);
                    $new_name = $thumbFileName . "_" . $maxWidth . "X" . $maxHeight . "." . $ext;
                    unlink($image);
                    imagepng($tmp, $dirPath . $new_name);
                    break;
                case IMAGETYPE_JPEG:
                    $imageSrc = imagecreatefromjpeg($image);
                    $newImageLayer = imagecreatetruecolor($maxWidth, $maxHeight);
                    $tmp = imageCropResize($imageSrc, $resizedWidth, $resizedHeight, $w, $h, $x1, $y1);
                    $new_name = $thumbFileName . "_" . $maxWidth . "X" . $maxHeight . "." . $ext;
                    unlink($image);
                    imagejpeg($tmp, $dirPath . $new_name);
                    break;
                case IMAGETYPE_GIF:
                    $imageSrc = imagecreatefromgif($image);
                    $newImageLayer = imagecreatetruecolor($maxWidth, $maxHeight);
                    $tmp = imageCropResize($imageSrc, $resizedWidth, $resizedHeight, $w, $h, $x1, $y1);
                    $new_name = $thumbFileName . "_" . $maxWidth . "X" . $maxHeight . "." . $ext;
                    unlink($image);
                    imagegif($tmp, $dirPath . $new_name);
                    break;
                case IMAGETYPE_WEBP:
                    $imageSrc = imagecreatefromwebp($image);
                    $newImageLayer = imagecreatetruecolor($maxWidth, $maxHeight);
                    $tmp = imageCropResize($imageSrc, $resizedWidth, $resizedHeight, $w, $h, $x1, $y1);
                    $new_name = $thumbFileName . "_" . $maxWidth . "X" . $maxHeight . "." . $ext;
                    unlink($image);
                    imagewebp($tmp, $dirPath . $new_name);
                    break;
                case IMAGETYPE_AVIF:
                    $imageSrc = imagecreatefromavif($image);
                    $newImageLayer = imagecreatetruecolor($maxWidth, $maxHeight);
                    $tmp = imageCropResize($imageSrc, $resizedWidth, $resizedHeight, $w, $h, $x1, $y1);
                    $new_name = $thumbFileName . "_" . $maxWidth . "X" . $maxHeight . "." . $ext;
                    unlink($image);
                    imageavif($tmp, $dirPath . $new_name);
                    break;
                default:
                    // echo "Invalid Image type.<br><a href='index.php'>Back</a>";
                    return false;
            }
            return $new_name;
        }
    } catch (\Throwable $th) {
        // dd($th);
        return false;
    }
}
function imageCropResize($imageSrc, $imageWidth, $imageHeight, $maxWidth, $maxHeight, $x, $y)
{
    try {
        $newImageLayer = imagecreatetruecolor($maxWidth, $maxHeight);
        imagecopy($newImageLayer, $imageSrc, 0, 0, $x, $y, $imageWidth, $imageHeight);
        return $newImageLayer;
    } catch (\Throwable $th) {
        return false;
    }
}
//image crop and resize====================================================>

if (!function_exists('format_date')) {
    function format_date($date, $format = 'jS F Y')
    {
        try {
            return Carbon::parse($date)->format($format);
        } catch (DateException $err) {
            return  '-';
        }
    }
}
if (!function_exists('format_amount')) {
    function format_amount($amount, $decimals = 2, $currency = '$', $specialFormat = false)
    {
        if ($specialFormat) {
            if (intval($amount) == $amount) {
                $formatted = number_format((float)$amount, 0, '.', ',');
            } else {
                $formatted = number_format((float)$amount, $decimals, '.', ',');
            }
        } else {
            $formatted = number_format((float)$amount, $decimals, '.', ',');
        }

        return $currency . $formatted;
    }
}

if (!function_exists('all_active_countries')) {
    function all_active_countries($activeProperty = 0)
    {
        $country = Country::select('countries.id', 'countries.name', 'countries.display_order')->where('countries.status', 'active')->orderBy('countries.display_order', 'ASC');
        if ($activeProperty > 0) {
            $country->join('properties', 'properties.country_id', 'countries.id');
        }
        return $country->distinct()->get();
    }
}

if (!function_exists('is_expired')) {
    function is_expired($date)
    {
        // 0 mean not expired, 1 mean expired
        if (empty($date)) {
            return 1;
        }
        try {
            $expire = !Carbon::parse($date)->endOfDay()->greaterThanOrEqualTo(now());
            return $expire ? 1 : 0;
        } catch (DateTimeException $err) {
            return 1;
        } catch (Exception $err) {
            return 1;
        }
    }
}

if (!function_exists('getPlanColorClass')) {
    function getPlanColorClass($key)
    {
        switch ($key) {
            case 0:
                return 'primary';
                break;
            case 1:
                return 'warning';
                break;
            case 2:
                return 'success';
                break;
            case 3:
                return 'danger';
                break;
            default:
                return 'secondary';
                break;
        }
    }
}

if (!function_exists('stripe_transaction_fees')) {
    function stripe_transaction_fees($price)
    {
        $stripe_percentage_fee = 2.9;
        $stripe_fixed_fee = 0.30;
        $net_percentage = 1 - ($stripe_percentage_fee / 100);
        return round(($price + $stripe_fixed_fee) / $net_percentage, 2);
    }
}

if (!function_exists('is_file_exists')) {
    function is_file_exists($path = '')
    {
        try {
            if (empty($path)) {
                return false;
            }
            $path = str_replace('storage/', '', $path);
            return Storage::disk('public')->exists($path);
        } catch (Exception $err) {
            return false;
        }
    }
}

if (!function_exists('get_agent_property_count')) {
    function get_agent_property_count($agentId, $type)
    {
        return Property::where('created_by', $agentId)->where('status', $type)->where('archive', 0)->count() ?? 0;
    }
}
if (!function_exists('get_agent_archived_property')) {
    function get_agent_archived_property($agentId)
    {
        return Property::where('created_by', $agentId)->where('archive', 1)->count() ?? 0;
    }
}


if (!function_exists('getProperties')) {
    function getProperties($filter = [], $limit = false, $paginate = true)
    {
        if (!$limit) {
            $limit = get_option('frontend_perpage');
        }
        if (!empty($filter['page'])) {
            Paginator::currentPageResolver(function () use ($filter) {
                return $filter['page'];
            });
        }
        $properties = Property::where('archive', 0)->where('status', 'published');
        if (!empty($filter['country'])) {
            $properties->where('country_id', $filter['country']);
        }
        if (!empty($filter['city'])) {
            $properties->whereLike('city', '%' . $filter['city'] . '%');
        }
        if (!empty($filter['zip'])) {
            $properties->where('zip', cleen($filter['zip']));
        }
        if (!empty($filter['residence_type'])) {
            $properties->where('residence_type', cleen($filter['residence_type']));
        }
        if (!empty($filter['buy_or_rent'])) {
            $properties->where('property_type', cleen($filter['buy_or_rent']));
        }
        if (!empty($filter['min_price'])) {
            $properties->where('price_per_month', '>=', $filter['min_price']);
        }
        if (!empty($filter['max_price'])) {
            $properties->where('price_per_month', '<=', $filter['max_price']);
        }
        if (!empty($filter['bedrooms'])) {
            $properties->where('bedrooms', $filter['bedrooms']);
        }
        if (!empty($filter['bathrooms'])) {
            $properties->where('bathrooms', $filter['bathrooms']);
        }
        if (!empty($filter['sort_by'])) {
            switch ($filter['sort_by']) {
                case 'price_low':
                    $properties->orderBy('price_per_month', 'ASC');
                    break;
                case 'price_high':
                    $properties->orderBy('price_per_month', 'DESC');
                    break;
                case 'newest':
                    $properties->orderBy('published_at', 'DESC');
                    break;
                case 'popularity':
                    $properties->leftJoin('property_views', 'property_views.property_id', '=', 'properties.id')
                        ->select('properties.*', DB::raw('COUNT(property_views.id) as property_view_count'))
                        ->groupBy('properties.id')
                        ->orderBy('property_view_count', 'DESC');
                    break;
                default:
                    break;
            }
        }
        return !$paginate ? $properties->get() : $properties->paginate($limit);
    }
}

if (!function_exists('countProperties')) {
    function countProperties($filter = [])
    {
        $properties = Property::where('archive', 0)->where('status', 'published');
        if (!empty($filter['country'])) {
            $properties->where('country_id', $filter['country']);
        }
        if (!empty($filter['city'])) {
            $properties->whereLike('city', '%' . $filter['city'] . '%');
        }
        if (!empty($filter['zip'])) {
            $properties->where('zip', cleen($filter['zip']));
        }
        if (!empty($filter['residence_type'])) {
            $properties->where('residence_type', cleen($filter['residence_type']));
        }
        if (!empty($filter['buy_or_rent'])) {
            $properties->where('property_type', cleen($filter['buy_or_rent']));
        }
        if (!empty($filter['min_price'])) {
            $properties->where('price_per_month', '>=', $filter['min_price']);
        }
        if (!empty($filter['max_price'])) {
            $properties->where('price_per_month', '<=', $filter['max_price']);
        }
        return $properties->count();
    }
}

if (!function_exists('getBlogs')) {
    function getBlogs($filter = [], $limit = false, $paginate = true)
    {
        if (!$limit) {
            $limit = get_option('frontend_perpage');
        }
        if (!empty($filter['page'])) {
            Paginator::currentPageResolver(function () use ($filter) {
                return $filter['page'];
            });
        }
        $blogs = Blog::select('blogs.*')->where('status', '1')->whereDate('published_at', '<=', date('Y-m-d'))->orderBy('published_at', 'DESC');
        if (!empty($filter['category'])) {
            $blogs->join('blog_categories', 'blog_categories.blog_id', 'blogs.id')->where('blog_categories.category_id', $filter['category']);
        }
        if (!empty($filter['keyword'])) {
            $blogs->whereLike('name', '%' . $filter['keyword'] . '%');
        }
        if (!empty($filter['m'])) {
            try {
                $m = explode('/', $filter['m']);
                $month = $m[0];
                $year = $m[1];
                $dateObj = Carbon::create($year, $month);
                $date = $dateObj->format('Y-m-d');
            } catch (Exception $err) {
                $date = '';
            }
            if (!empty($date)) {
                $blogs->where(function($q) use($date, $dateObj){
                    $q->whereDate('published_at','>=' , $date)->whereDate('published_at', '<=', $dateObj->endOfMonth()->format('Y-m-d'));
                });
            }
        }
        return !$paginate ? $blogs->get() : $blogs->paginate($limit);
    }
}

if (!function_exists('get_country_code')) {
    function get_country_code($id)
    {
        return Country::find($id)?->name ?? '-';
    }
}

if (!function_exists('norecords')) {
    function norecords()
    {
        $html = '<div class="mb-5 d-flex justify-content-center align-items-center"><img src=' . asset('assets/frontend/images/no_records_found.png') . ' class="img-fluid"></div>';
        return $html;
    }
}

if (!function_exists('string_limit')) {
    function string_limit($txt, $limit = 10, $ending = '...')
    {
        if (strlen($txt) <= $limit) {
            return $txt;
        }
        return substr($txt, 0, $limit) . $ending;
    }
}

if (!function_exists('show_residence_type_dropdown')) {
    function show_residence_type_dropdown($selectedVal = '')
    {
        return '
        <option ' . ($selectedVal == "Flat" ? 'selected' : '') . ' value="Flat">Flat</ option>
        <option ' . ($selectedVal == "House" ? 'selected' : '') . ' value="House">House</option>
        <option ' . ($selectedVal == "Villa" ? 'selected' : '') . ' value="Villa">Villa</option>
        <option ' . ($selectedVal == "Plot" ? 'selected' : '') . ' value="Plot">Plot</option>
        <option ' . ($selectedVal == "Farm Land" ? 'selected' : '') . ' value="Farm Land">Farm Land</option>
        <option ' . ($selectedVal == "Other" ? 'selected' : '') . ' value="Other">Other</option>';
    }
}

if (!function_exists('cleen')) {
    function cleen($txt, $lower = false)
    {
        if ($lower) {
            return strtolower(trim($txt));
        } else {
            return trim($txt);
        }
    }
}

if (!function_exists('updatePropertyCount')) {
    function updatePropertyCount($propertyId)
    {
        try {
            $content = json_decode(file_get_contents('https://api.ipify.org/?format=json'));
            if (!empty($content->ip)) {
                $ip = $content->ip;
                $userId = auth()->id() ?? NULL;
                $date = now()->format('Y-m-d');
                PropertyView::updateOrCreate(['date' => $date, 'ip' => $ip, 'property_id' => $propertyId, 'user_id' => $userId], []);
            }
            return 1;
        } catch (Exception $err) {
            return 0;
        }
    }
}

function get_admin()
{
    return User::where('role', 'admin')->first();
}

function is_property_favorite($propertyId)
{
    return UserFevorit::where('user_id', auth()->id())->where('property_id', $propertyId)->exists();
}
