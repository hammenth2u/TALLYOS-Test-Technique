<?php
//$timestamp = $hide;
//$timeNow = time();
//dump($timeNow);
//$chktime = strtotime($timestamp);
//dump($chktime);
?>

<h2>Informations des ruches</h2>

<div class="row">
            <div class="col-12">

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ruche</th>
                        <th scope="col">Date</th>
                        <th scope="col">Poids</th>
                        <th scope="col">Température</th>
                        <th scope="col">Humidité</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($infosHives as $infosHive): ?>
                        <tr>
                            <td><?= $infosHive['nameHive'] ;?></td>
                            <td><?= $infosHive['createdAt'] ;?></td>
                            <td><?= $infosHive['weight'] ;?></td>
                            <td><?= $infosHive['temperature'] ;?></td>
                            <td><?= $infosHive['humidityLevel'] ;?></td>
                        </tr>
                    <?php endforeach; ?>
                   
                </tbody>
                </table>


            </div>
        </div>

        <nav class="float-right" aria-label="">
            <ul class="pagination">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><</a>
                </li>
                <!--<li class="page-item"><a class="page-link" href="#">1</a></li>-->
                <li class="page-item active">
                <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <!--<li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <li class="page-item">
                <a class="page-link" href="#">></a>
                </li>
            </ul>
        </nav>