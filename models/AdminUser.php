<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin_user}}".
 *
 * @property string $id
 * @property string $nickname 昵称
 * @property string $telphone 电话
 * @property string $password 密码
 * @property string $realname 真实姓名
 * @property string $avatar 头像
 * @property string $remember_token 记住我token
 * @property string $backup 保留字段
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname', 'telphone', 'password', 'realname'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nickname', 'realname', 'avatar', 'remember_token', 'backup'], 'string', 'max' => 255],
            [['telphone'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 32],
            [['telphone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'telphone' => 'Telphone',
            'password' => 'Password',
            'realname' => 'Realname',
            'avatar' => 'Avatar',
            'remember_token' => 'Remember Token',
            'backup' => 'Backup',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
