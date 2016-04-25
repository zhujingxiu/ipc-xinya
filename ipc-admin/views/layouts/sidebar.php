<?php
use common\widgets\Menu;
use yii\helpers\Html;
$menuNodes = [
    [
        'label' => Yii::t('app','Customer'),
        'url' => ['/customer'],
        'icon' => 'fa-child',
        'visible' => Yii::$app->user->can('customer'),
    ],

    [
        'label' => Yii::t('app', 'Project'),
        'url' => ['#'],
        'icon' => 'fa-cubes',
        'options' => [
            'class' => 'treeview',
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Apply'),
                'url' => ['/project/apply/'],
                'icon' => 'fa-envelope ',
                'active' => Yii::$app->request->pathInfo === 'project/apply',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Confirm'),
                'url' => ['/project/confirm/'],
                'icon' => 'fa-tags',
                'active' => Yii::$app->request->pathInfo === 'project/confirm',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Check'),
                'url' => ['/project/check/'],
                'icon' => 'fa-binoculars',
                'active' => Yii::$app->request->pathInfo === 'project/check',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Approve'),
                'url' => ['/project/approve/'],
                'icon' => 'fa-gavel',
                'active' => Yii::$app->request->pathInfo === 'project/approve',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Sign'),
                'url' => ['/project/sign/'],
                'icon' => 'fa-book',
                'active' => Yii::$app->request->pathInfo === 'project/sign',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Borrowing'),
                'url' => ['/project/borrowing/'],
                'icon' => 'fa-exchange',
                'active' => Yii::$app->request->pathInfo === 'project/borrowing',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Manage'),
                'url' => ['/project/manage/'],
                'icon' => 'fa-recycle',
                'active' => Yii::$app->request->pathInfo === 'project/manage',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
        ]
    ],
    [
        'label' => Yii::t('app', 'Config'),
        'url' => ['#'],
        'icon' => 'fa-puzzle-piece',
        'options' => [
            'class' => 'treeview',
        ],
        'items' => [
            [
                'label' => Yii::t('app', 'Repayment'),
                'url' => ['/project-config/repayment/'],
                'icon' => 'fa-money',
                'active' => Yii::$app->request->pathInfo === 'project-config/repayment',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Tender'),
                'url' => ['/project-config/tender/'],
                'icon' => 'fa-flask',
                'active' => Yii::$app->request->pathInfo === 'project-config/tender',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Project Status'),
                'url' => ['/project-config/status/'],
                'icon' => 'fa-road',
                'active' => Yii::$app->request->pathInfo === 'project-config/status',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
        ]
    ],




    [

        'label' => Yii::t('app', 'Users Roles'),
        'url' => ['#'],
        'icon' => 'fa-sitemap',
        'options' => [
            'class' => 'treeview',
        ],

        'items' => [
            [
                'label' => Yii::t('app', 'User'),
                'url' => ['/user'],
                'icon' => 'fa-user ',
                'visible' => Yii::$app->user->can('setting'),
                'active' => Yii::$app->request->pathInfo === 'user',
                //'visible' => (Yii::$app->user->identity->username == 'admin'),
            ],
            [
                'label' => Yii::t('app', 'Role'),
                'url' => ['/auth/role'],
                'icon' => 'fa-users',
                'active' => Yii::$app->request->pathInfo === 'auth/role',
            ],
            [
                'label' => Yii::t('app', 'Permission'),
                'url' => ['/auth/permission'],
                'icon' => 'fa-key',
                'active' => Yii::$app->request->pathInfo === 'auth/permission',
            ],
        ],
    ],

];
$nodes = Yii::$app->user->identity->getMenuNodes();
$struct = Yii::$app->treemanager->treeStructure + Yii::$app->treemanager->dataStructure;
function renderTree($nodes,$struct=[])
{


    extract($struct);
    $nodeDepth = $currDepth = $counter = 0;
    $out = Html::beginTag('ul', ['class' => 'kv-tree']) . "\n";

    foreach ($nodes as $node) {
        /**
         * @var Tree $node
         */
/*        if (!$this->isAdmin && !$node->isVisible() || !$this->showInactive && !$node->isActive()) {
            continue;
        }*/
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeDepth = $node->$depthAttribute;
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeLeft = $node->$leftAttribute;
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeRight = $node->$rightAttribute;
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeKey = $node->$keyAttribute;
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeName = $node->$nameAttribute;
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeIcon = $node->$iconAttribute;
        /** @noinspection PhpUndefinedVariableInspection */
        $nodeIconType = $node->$iconTypeAttribute;

        $isChild = ($nodeRight == $nodeLeft + 1);
        $indicators = '';
        $css = '';

        if ($nodeDepth == $currDepth) {
            if ($counter > 0) {
                $out .= "</li>\n";
            }
        } elseif ($nodeDepth > $currDepth) {
            $out .= Html::beginTag('ul') . "\n";
            $currDepth = $currDepth + ($nodeDepth - $currDepth);
        } elseif ($nodeDepth < $currDepth) {
            $out .= str_repeat("</li>\n</ul>", $currDepth - $nodeDepth) . "</li>\n";
            $currDepth = $currDepth - ($currDepth - $nodeDepth);
        }
        if (trim($indicators) == null) {
            $indicators = '&nbsp;';
        }
        $nodeOptions = [
//            'data-key' => $nodeKey,
//            'data-lft' => $nodeLeft,
//            'data-rgt' => $nodeRight,
//            'data-lvl' => $nodeDepth,
//            'data-readonly' => static::parseBool($node->isReadonly()),
//            'data-movable-u' => static::parseBool($node->isMovable('u')),
//            'data-movable-d' => static::parseBool($node->isMovable('d')),
//            'data-movable-l' => static::parseBool($node->isMovable('l')),
//            'data-movable-r' => static::parseBool($node->isMovable('r')),
//            'data-removable' => static::parseBool($node->isRemovable()),
//            'data-removable-all' => static::parseBool($node->isRemovableAll()),
        ];
        if (!$isChild) {
            $css = ' kv-parent ';
        }
//        if (!$node->isVisible() && $this->isAdmin) {
//            $css .= ' kv-invisible';
//        }
//
//        if ($node->isCollapsed()) {
//            $css .= ' kv-collapsed ';
//        }
//        if ($node->isDisabled()) {
//            $css .= ' kv-disabled ';
//        }
//        if (!$node->isActive()) {
//            $css .= ' kv-inactive ';
//        }
/*        $indicators .= $this->renderToggleIconContainer(false) . "\n";
        $indicators .= $this->showCheckbox ? $this->renderCheckboxIconContainer(false) . "\n" : '';*/
        $css = trim($css);
        if (!empty($css)) {
            Html::addCssClass($nodeOptions, $css);
        }
        $out .= Html::beginTag('li', $nodeOptions) . "\n" .
            Html::beginTag('div', ['tabindex' => -1, 'class' => 'kv-tree-list']) . "\n" .
            Html::beginTag('div', ['class' => 'kv-node-indicators']) . "\n" .
            $indicators . "\n" .
            '</div>' . "\n" .
            Html::beginTag('div', ['tabindex' => -1, 'class' => 'kv-node-detail']) . "\n" .
            $this->renderNodeIcon($nodeIcon, $nodeIconType, $isChild) . "\n" .
            Html::tag('span', $nodeName, ['class' => 'kv-node-label']) . "\n" .
            '</div>' . "\n" .
            '</div>' . "\n";
        ++$counter;
    }
    $out .= str_repeat("</li>\n</ul>", $nodeDepth) . "</li>\n";
    $out .= "</ul>\n";
    return  $out;
}

echo '<pre>';
print_r(renderTree($nodes));
echo '</pre>';
echo Menu::widget(
    [
        'options' => [
            'class' => 'sidebar-menu'
        ],
        'items' => $menuNodes
    ]
);