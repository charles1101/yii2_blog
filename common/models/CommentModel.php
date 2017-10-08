<?php

namespace common\models;

use common\models\base\BaseModel;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $post_id
 * @property string $content
 * @property integer $created_at
 */
class CommentModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id', 'content', 'created_at'], 'required'],
            [['user_id', 'post_id', 'created_at'], 'integer'],
            [['content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'user_id']);
    }

}

