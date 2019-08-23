<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_alternatif".
 *
 * @property string $id_alternatif
 * @property string $kd_alternatif
 * @property string $nm_alternatif
 * @property string $username
 * @property string $password
 * @property string $email_alternatif
 */
class TblAlternatif extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_alternatif';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alternatif', 'kd_alternatif', 'nm_alternatif', 'username', 'password'], 'required'],
            [['id_alternatif', 'kd_alternatif', 'nm_alternatif', 'username', 'password', 'email_alternatif'], 'string', 'max' => 100],
            [['id_alternatif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alternatif' => 'Id Pegawai',
            'kd_alternatif' => 'Kode Pegawai',
            'nm_alternatif' => 'Nama Pegawai',
            'username' => 'Username',
            'password' => 'Password',
            'email_alternatif' => 'Email Pegawai',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['username' => 'username']);
    }

}
