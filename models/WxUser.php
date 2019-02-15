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
 * @property int $is_subscribe
 * @property string $createTime
 * @property string $uptateTime
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
            [['sex', 'subscribe_time', 'is_subscribe'], 'integer'],
            [['createTime', 'uptateTime'], 'safe'],
            [['openid', 'nickname', 'avatar', 'address', 'realname'], 'string', 'max' => 255],
            [['tel', 'city', 'province', 'country'], 'string', 'max' => 32],
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
            'is_subscribe' => 'Is Subscribe',
            'createTime' => 'Create Time',
            'uptateTime' => 'Uptate Time',
        ];
    }
}
