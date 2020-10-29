<?php

/**
 * @filename BaseActiveRecord.php 
 * @author pangxl <pangxiaolong@mufengcm.com>
 * @datetime 2016-7-31  16:26:25
 * @Description
 */

namespace common\lib\wechat\v1\models\v1;
use yii\db\ActiveRecord;
abstract class BaseActiveRecord extends ActiveRecord
{

    /**
     * 全局bool 正确
     */
    const IS_TRUE = 1;

    /**
     * 全局bool 错误
     */
    const IS_FALSE = 0;

    /**
     * deleted
     */
    const IS_DELETED = 2;

    /**
     * 使用非行为的方式加入时间更新
     * s
     * @param type $insert
     * @return type
     */
    public function beforeSave($insert)
    {
        if ($insert) {
            if ($this->hasAttribute('created_at')) {
                $this->created_at = CUR_TIMESTAMP;
            }
        } elseif ($this->hasAttribute('updated_at')) {
            $this->updated_at = CUR_TIMESTAMP;
        }
        return parent::beforeSave($insert);
    }

}
