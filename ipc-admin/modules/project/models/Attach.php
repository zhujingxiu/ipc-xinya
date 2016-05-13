<?php

namespace ipc\modules\project\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Inflector;
use yii\imagine\Image;
use Imagine\Image\ImageInterface;
/**
 * This is the model class for table "{{%project_attach}}".
 *
 * @property integer $attach_id
 * @property integer $project_id
 * @property integer $prove_id
 * @property string $file
 * @property string $type
  * @property string $title
 * @property string $remark
 * @property integer $status
 * @property integer $user_id
 * @property integer $addtime
 * @property integer $sort
 */
class Attach extends \system\libs\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */

    public $upload;
    public $name;
    public $path;
    public $type;

    public $thumbs;

    public static $imageFileTypes = ['image/gif', 'image/jpeg', 'image/png'];

    public static $defaultThumbSize = [128, 128];

    public static function tableName()
    {
        return '{{%project_attach}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'prove_id', 'file', 'title'], 'required'],
            [['project_id', 'prove_id', 'status', 'user_id', 'addtime', 'sort'], 'integer'],
            [['file','remark'], 'string'],
            [[ 'title'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attach_id' => Yii::t('attach', 'Attach ID'),
            'project_id' => Yii::t('attach', 'Project ID'),
            'prove_id' => Yii::t('attach', 'Prove ID'),
            'file' => Yii::t('attach', 'File'),
            'path' => Yii::t('attach', 'Path'),
            'title' => Yii::t('attach', 'Title'),
            'remark' => Yii::t('attach', 'Remark'),
            'status' => Yii::t('attach', 'Status'),
            'user_id' => Yii::t('attach', 'User ID'),
            'addtime' => Yii::t('attach', 'Addtime'),
            'sort' => Yii::t('attach', 'Sort'),
        ];
    }

    /**
     * @return bool if type of this media file is image, return true;
     */
    public function isImage()
    {
        return in_array($this->type, self::$imageFileTypes);
    }

    /**
     * Save just uploaded file
     * @param array $routes routes from module settings
     * @return bool
     */
    public function saveUploadedFile(array $routes,$attribute='file')
    {
        $year = date('Y', time());
        $month = date('m', time());
        $structure = "{$routes['baseUrl']}/{$routes['uploadPath']}/$year/$month";
        $basePath = Yii::getAlias($routes['basePath']);
        $absolutePath = "$basePath/$structure";

        // create actual directory structure "yyyy/mm"
        if (!file_exists($absolutePath)) {
            mkdir($absolutePath, 0777, true);
        }

        // get file instance
        $this->upload = UploadedFile::getInstance($this, $attribute);
        //if a file with the same name already exist append a number
        $this->name =  $this->upload->name;
        $this->type = $this->upload->type;
        $filename = (empty($routes['sn']) ? '' : $routes['sn'].'-' ).date('dHis').'-'.substr(md5(Inflector::slug($this->upload->baseName).time()),6,6).'.'. $this->upload->extension;

        $this->path = "{$structure}/{$filename}";
        // save original uploaded file
        $this->upload->saveAs("$absolutePath/$filename");
        return [
            'name' => $this->name,
            'path' => $this->path,
            'type' => $this->type,
        ];

    }

    /**
     * Create default thumbnail
     *
     * @param array $routes see routes in module config
     */
    public function createDefaultThumb($basePath='')
    {
        $originalFile = pathinfo($this->path);
        $dirname = $originalFile['dirname'];
        $filename = $originalFile['filename'];
        $extension = $originalFile['extension'];

        Image::$driver = [Image::DRIVER_GD2, Image::DRIVER_GMAGICK, Image::DRIVER_IMAGICK];

        $size = self::$defaultThumbSize;
        $width = $size[0];
        $height = $size[1];
        $thumbUrl = "$dirname/$filename-{$width}x{$height}.$extension";
        $basePath = Yii::getAlias($basePath);
        Image::thumbnail("$basePath/{$this->path}", $width, $height)->save("$basePath/$thumbUrl");
    }

}
