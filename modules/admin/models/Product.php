<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property string $price
 * @property string $old_price
 * @property string $description
 * @property string $keywords
 * @property string $img
 * @property int $is_offer
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['content'], 'string'],
            [['price', 'old_price'], 'number'],
            [['price', 'old_price'], 'default', 'value' => 0],
            [['img'], 'default', 'value' => 'products/no-image.png'],
            [['title', 'description', 'keywords', 'img'], 'string', 'max' => 255],
            [['file'], 'image'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'ID категории',
            'title' => 'Название',
            'content' => 'Содержание',
            'price' => 'Цена',
            'old_price' => 'Старая цена',
            'description' => 'Описание',
            'keywords' => 'Тэги',
            'img' => 'Img',
            'file' => 'Изображение',
            'is_offer' => 'Является ли предложением',
        ];
    }

    public function beforeSave($insert)
    {
        if($file = UploadedFile::getInstance($this, 'file')) {
            $dir = 'products/' . date("Y-m-d") . '/';
            if(!is_dir($dir)){
                mkdir($dir);
			}
            $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
            $this->img = $dir . $file_name;
            $file->saveAs($this->img);
		}
        return parent::beforeSave($insert);
	}
}
