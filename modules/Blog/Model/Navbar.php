<?php

namespace Modules\Blog\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Navbar extends Model
{
    use SoftDeletes;
    
    /**
     * 获取指定navbar的所有文章
     */
    public function posts()
    {
        return $this->belongsToMany('Modules\Blog\Model\post', 'blog_post_navbar_pivot','navbar_id','post_id');
    }
    
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
     
    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';
    
    /**
     * The database table used by the model .
     *
     * @var string
     */
    protected $table = 'blog_navbars';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'navbar',
        'title',
        'deleted_at'
    ];
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['*'];
    //
}
