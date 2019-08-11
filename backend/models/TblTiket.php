<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_tiket".
 *
 * @property string $id_tiket
 * @property string $id_alternatif
 * @property string $wkt_tiket
 * @property string $tgl_tiket
 * @property string $status_tiket
 */
class TblTiket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_tiket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tiket', 'id_alternatif', 'tgl_tiket'], 'required'],
            [['tgl_tiket'], 'safe'],
            [['id_tiket', 'id_alternatif', 'status_tiket'], 'string', 'max' => 100],
            [['wkt_tiket'], 'string', 'max' => 50],
            [['id_tiket'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tiket' => 'Id Tiket',
            'id_alternatif' => 'Id Alternatif',
            'wkt_tiket' => 'Wkt Tiket',
            'tgl_tiket' => 'Tgl Tiket',
            'status_tiket' => 'Status Tiket',
        ];
    }
}
