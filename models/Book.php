<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%book}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $author_id
 * @property integer $isbn
 *
 * @property User $user
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%book}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['isbn'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Chủ đề'),
            'description' => Yii::t('app', 'Nội dung bài viết'),
            'user_id' => Yii::t('app', 'User'),
            'isbn' => Yii::t('app', 'Loại bài viết'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
