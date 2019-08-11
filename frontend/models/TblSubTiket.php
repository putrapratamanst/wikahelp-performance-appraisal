<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_sub_tiket".
 *
 * @property int $id_sub_tiket
 * @property string $id_tiket
 * @property string $id_alternatif
 * @property string $id_kriteria
 * @property string $id_sub_kriteria
 * @property string $status_sub_tiket
 * @property string $notif_man
 */
class TblSubTiket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_sub_tiket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tiket', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'], 'required'],
            [['id_tiket', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria', 'status_sub_tiket', 'notif_man','created_date'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sub_tiket' => 'Id Sub Tiket',
            'id_tiket' => 'Id Tiket',
            'id_alternatif' => 'Id Alternatif',
            'id_kriteria' => 'Id Kriteria',
            'id_sub_kriteria' => 'Id Sub Kriteria',
            'status_sub_tiket' => 'Status Sub Tiket',
            'notif_man' => 'Notif Man',
        ];
    }

    public function getSubKriteria()
    {
        return $this->hasOne(TblSubKriteria::className(), ['id_sub_kriteria' => 'id_sub_kriteria']);
    }

    public function getKriteria()
    {
        return $this->hasOne(TblKriteria::className(), ['id_kriteria' => 'id_kriteria']);
    }

}
