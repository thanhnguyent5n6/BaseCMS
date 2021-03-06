<?php

namespace App\Models\Products;

use App\Libs\CommonLib;
use App\Models\BaseModel;
use App\Models\Category;
use App\Models\Image;
use App\Models\ProductImage;
use App\Traits\Code;
use App\Traits\Slug;
use Illuminate\Support\Facades\DB;

class Product extends BaseModel
{
    use Code;
    use Slug;

    protected $table = "products";

    protected $fillable = [
        'category_id',
        'supplier_id',
        'code',
        'slug',
        'name',
        'icon',
        'description',
        'content',
        'price',
        'sales',
        'thumbnail',
        'unit',
        'status',
        'warranty_policy',
        'selling',
        'views',
        'is_deleted',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id','id')->where('is_deleted', NO_DELETED);
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class,'product_image','product_id','image_id');
    }

    public function bill_detail()
    {
    	return $this->hasMany('Appp\BillDetail','id_product','id');
    }

    public function getStatusDisplayAttribute()
    {
        if($this->is_active == NO_ACTIVE) {
            return "Khóa";
        }
        return "Hoạt động";
    }

    public function getDescriptionDisplayAttribute()
    {
        if(!empty($this->description)) {
            return html_entity_decode($this->description);
        }
        return "";
    }

    public function getContentDisplayAttribute()
    {
        if(!empty($this->content)) {
            return html_entity_decode($this->content);
        }
        return "";
    }

    public function getIsNewDisplayAttribute()
    {
        if($this->is_new ==  0) {
            return 'Hàng cũ';
        }
        return 'Hàng mới';
    }

    public function initParameters()
    {
        return array('status' => 0);
    }

    public function getParameters($data)
    {
        $parameters = $this->initParameters();
        $parameters['category_id'] = $data['category_id'] ?? 0;
        $parameters['supplier_id'] = $data['supplier_id'] ?? 0;
        $parameters['slug'] = $this->createSlug($data['name']);
        $parameters['name'] = $data['name'] ?? '';
        $parameters['description'] = isset($data['description']) ? html_entity_decode($data['description']) : '';
        $parameters['content'] = isset($data['content']) ? html_entity_decode($data['content']) : '';
        $parameters['price'] = $data['price'] ?? 0;
        $parameters['sales'] = isset($data['sales']) ? $data['sales'] : 0;
        $parameters['thumbnail'] = isset($data['thumbnail']) ? $data['thumbnail'] : '';
        $parameters['unit'] = isset($data['unit']) ? $data['unit'] : 0;
        $parameters['status'] = isset($data['status']) ? 1 : 0;
        $parameters['image_ids'] = isset($data['image_id']) ? $data['image_id'] : [];
        return $parameters;
    }

    public function createProduct($parameters)
    {
        $image = new Image();
        $image_ids = [];
        if(isset($parameters['image_ids'])) {
            $image_ids = $parameters['image_ids'];
            unset($parameters['image_ids']);
        }

        DB::beginTransaction();
        try {
            $result = $this->createData($parameters);
            if(count($image_ids) > 0) {
                $result->images()->attach($image_ids);
                $image->uploaded($image_ids);
            }
            foreach($image_ids as $img_id) {
                $image->updateByID($img_id, ['status' => IMG_SAVED]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return $result;
    }

    public function updateProduct($id, $parameters)
    {
        $image = new Image();
        $image_ids = [];
        $img_delete = [];
        if(isset($parameters['image_ids'])) {
            $image_ids = $parameters['image_ids'];
            unset($parameters['image_ids']);
        }

        DB::beginTransaction();
        try {
            $result = $this->updateByID($id, $parameters);
            $old_product_img = $result->product_image->pluck('image_id')->toArray();

            list($image_ids, $img_deletes) = CommonLib::getFileAttachDetach($image_ids, $old_product_img);

            $result->images()->attach($image_ids);
            $result->images()->detach($img_deletes);
            $image->uploaded($image_ids);
            foreach($image_ids as $img_id) {
                $image->updateByID($img_id, ['status' => IMG_SAVED]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return $result;
    }

    public function getProductByCategoryIds($category_ids = [], $txt_search = "", $from_price = 0, $to_price = 0)
    {
        $query = $this->whereIn('category_id', $category_ids)->where('is_deleted', NO_DELETED)->where('status', ACTIVE);
        if(isset($txt_search) && !empty($txt_search))
            $query = $query->where('name','like',"%".$txt_search."%");
        if(!empty($from_price) && !empty($to_price) && $from_price < $to_price)
            $query = $query->whereBetween('price', [$from_price, $to_price]);
        return $query->get();
    }

    public function getAllProducts($txt_search = "", $from_price = 0, $to_price = 0, $key_words = '')
    {
        $query = $this->where('is_deleted', NO_DELETED);
        if(isset($key_words) && !empty($key_words))
            $query = $query->where('name','like','%'.$key_words.'%')->orWhere('price','like','%'.$key_words.'%');
        if(isset($txt_search) && !empty($txt_search))
            $query = $query->where('name','like',"%".$txt_search."%");
        if(!empty($from_price) && !empty($to_price) && $from_price < $to_price)
            $query = $query->whereBetween('price', [$from_price, $to_price]);
        return $query->get();
    }

    public function getProductNews()
    {
        return $this->where('is_deleted', NO_DELETED)->where('status', ACTIVE)
            ->orderBy('id', 'desc')
            ->limit(20)->get();
    }
}
