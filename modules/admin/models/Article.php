<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $img
 * @property string $author
 */
class Article extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content', 'author'], 'string', 'max' => 255],
            [['file'], 'image'],
            [['img'], 'default', 'value' => 'products/no-image.png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Текст',
            'img' => 'Img',
            'author' => 'Автор',
            'file' => 'Изображение',
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
