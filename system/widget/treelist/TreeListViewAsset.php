<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015
 * @package   yii2-tree-manager
 * @version   1.0.5
 */

namespace system\treelist;

use kartik\base\AssetBundle;

/**
 * Asset bundle for TreeView widget.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since  1.0
 */
class TreeListViewAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\widgets\ActiveFormAsset'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/kv-tree']);
        $this->setupAssets('css', ['css/kv-tree']);
        parent::init();
    }
}
