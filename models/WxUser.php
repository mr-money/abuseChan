<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%wx_user}}".
 *
 * @property int $id
 * @property string $openid
 * @property string $nickname
 * @property string $avatar
 * @property int $sex
 * @property int $subscribe_time
 * @property string $address 地址
 * @property string $realname 姓名
 * @property string $tel
 * @property string $city 城市
 * @property string $province 省市
 * @property string $country 国家
 * @property string $backup 保留字段
 * @property int $state 状态
 * @property string $create_at 创建时间
 * @property string $update_at 修改时间
 */
class WxUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wx_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['sex', 'subscribe_time', 'state'], 'integer'],
            [['openid', 'nickname', 'avatar', 'address', 'realname', 'backup'], 'string', 'max' => 255],
            [['tel', 'city', 'province', 'country', 'create_at', 'update_at'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'nickname' => 'Nickname',
            'avatar' => 'Avatar',
            'sex' => 'Sex',
            'subscribe_time' => 'Subscribe Time',
            'address' => 'Address',
            'realname' => 'Realname',
            'tel' => 'Tel',
            'city' => 'City',
            'province' => 'Province',
            'country' => 'Country',
            'backup' => 'Backup',
            'state' => 'State',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}
