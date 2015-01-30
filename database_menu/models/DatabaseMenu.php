<?php

namespace app\modules\database_menu\models;

use Yii;

/**
 * This is the model class for table "{{%_database_menu}}".
 *
 * @property integer $id
 * @property string $label
 * @property string $url
 * @property string $icon
 */
class DatabaseMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%_database_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'url', 'icon'], 'required'],
            [['label', 'url', 'icon'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pycode/database_menu', 'ID'),
            'label' => Yii::t('pycode/database_menu', 'label'),
            'url' => Yii::t('pycode/database_menu', 'url'),
            'icon' => Yii::t('pycode/database_menu', 'Icon'),
        ];
    }
}
