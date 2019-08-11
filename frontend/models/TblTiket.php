<?php

namespace frontend\models;

use Yii;

use frontend\models\TblAlternatif;
use frontend\models\TblSubKriteria;

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
    
    public $tempSubKriteria;
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
            [['tgl_tiket', 'tempSubKriteria'], 'safe'],
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

    public function reformattedId()
    {
        $id     = $this->find()->max('RIGHT(id_tiket,4)');
        $tmp    = ((int) $id) + 1;
        $result = sprintf("%04s", $tmp);
        
        return "TK-". $result;
    }
    
    public function getAlternatif()
    {
        return $this->hasOne(TblAlternatif::className(), ['id_alternatif' => 'id_alternatif']);
    }


    public function getKriteria($idKriteria)
    {
        return TblSubKriteria::find()->where(['id_kriteria' => $idKriteria])->all();
    }

}
