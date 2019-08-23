<?php

use backend\models\KuisionerResult;
use backend\models\TblSubTiket;
use common\helpers\Constant;

?>
   <h2>
<p style="text-align:center">
       REPORT TIKET 
       <p>
        </h2> 
        <table border="1" width="100%">
            <tr style="text-align:center">
                <td>ID Tiket</td>
                <td>Nama Alternatif</td>
                <td>Status Tiket</td>
                <td>Technical Support</td>
                <td>Hasil Penilaian</td>
                <td>Kategori</td>
            </tr>
            <?php

            foreach ($data as $key => $value) {

        $subTiket = TblSubTiket::find()->joinWith(['subKriteria', 'kriteria'])->where(['id_tiket' => $value->id_tiket]);
        $statusSubTiket = $subTiket->all();
        $buttonClose = true;
        foreach ($statusSubTiket as $values) {
            if ($values['status_sub_tiket'] != Constant::STATUS_DONE) {
                $buttonClose = false;
            }
        }
        $kuisioner = KuisionerResult::find()->where(['id_tiket' => $value->id_tiket, 'role' => 4])->all();

        $peringkat = "";
        $akhir = "";
        if ($value['status_tiket'] == Constant::STATUS_DONE && $kuisioner) {
            $sumRating = 0;
            $dataWithoutNol = [];

            if ($statusSubTiket) {
                foreach ($statusSubTiket as $valueSubTiket) {
                    if (!empty($valueSubTiket->rating)) {
                        $sumRating += $valueSubTiket->rating;
                    }
                    if ($valueSubTiket->rating != 0) {
                        $dataWithoutNol[] = $valueSubTiket->rating;
                    }
                }


                $countRating = empty($dataWithoutNol) ? 0 : count($dataWithoutNol);
                $bobotRating = empty($dataWithoutNol) ? 0 : array_sum($dataWithoutNol);

                $hasilBobotRating = empty($dataWithoutNol) ? 0 : ($bobotRating / $countRating);

                $kuisionerUser = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $value->id_tiket])->andWhere(['kuisioner.role' => 4])->all();

                $countKuisionerUser = [];
                $jumlahKuisionerUser = 0;
                foreach ($kuisionerUser as $valueKuisionerUser) {
                    $jumlahKuisionerUser += $valueKuisionerUser->result;
                }

                $perkalianKuisionerUser = 10 * $jumlahKuisionerUser;
                $bobotUser = $hasilBobotRating * ($perkalianKuisionerUser / 100);



                $kuisionerMansup = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $value->id_tiket])->andWhere(['kuisioner.role' => 3])->all();
                $countKuisionerMansup = [];
                $jumlahKuisionerMansup = 0;
                foreach ($kuisionerMansup as $valueKuisionerMansup) {
                    $jumlahKuisionerMansup += $valueKuisionerMansup->result;
                }
                $perkalianKuisionerMansup = 10 * $jumlahKuisionerMansup;
                $bobotMansup = $hasilBobotRating * ($perkalianKuisionerMansup / 100);


                $kuisionerTechsup = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $value->id_tiket])->andWhere(['kuisioner.role' => 2])->all();
                $countKuisionerTechsup = [];
                $jumlahKuisionerTechsup = 0;
                foreach ($kuisionerTechsup as $valueKuisionerTechsup) {
                    $jumlahKuisionerTechsup += $valueKuisionerTechsup->result;
                }
                $perkalianKuisionerTechsup = 10 * $jumlahKuisionerTechsup;
                $bobotTechsup = $hasilBobotRating * ($perkalianKuisionerTechsup / 100);

                $akhir = $bobotUser + $bobotMansup + $bobotTechsup;

                if ($akhir >= 5) {
                    $peringkat = "Sangat Baik";
                }
                if ($akhir < 4.99 && $akhir >= 4) {
                    $peringkat = "Baik";
                }
                if ($akhir <= 3.99 && $akhir >= 3) {
                    $peringkat = "Cukup Baik";
                }
                if ($akhir <= 2.99 && $akhir >= 2) {
                    $peringkat = "Kurang Baik";
                }
                if ($akhir < 2) {
                    $peringkat = "Sangat Kurang Baik";
                }

                if (empty($dataWithoutNol)) {
                    $peringkat = "";
                }
        }
    }
                ?>
            <tr>
                <td><?= $value->id_tiket; ?></td>
                <td><?= $value->alternatif->nm_alternatif; ?></td>
                <td><?= $value->status_tiket; ?></td>
                <td><?= ucwords($value->approver); ?></td>
                <td><?= ucwords($peringkat); ?></td>
                <td><?= ucwords($akhir); ?></td>
            </tr>
            <?php }
            ?>
           
        </table>
