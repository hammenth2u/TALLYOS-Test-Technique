
        <div class="row">
            <div class="col-12">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" id="add-hive" data-toggle="modal" data-target="#exampleModal">
                Ajouter une ruche
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout d'une ruche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                    <form action="" method="post" class="form-add-hive">
                            <div class="form-group">
                                <label for="nameHive">Nom</label>
                                <input type="text" class="form-control" name="nameHive" id="nameHive" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" name="lat" id="lat" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" name="long" id="long" placeholder="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" id="add-hive-new" value="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Modal updateHive -->
                <div class="modal fade" id="updateHive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier une ruche</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <form action="" method="post" class="form-update-hive">
                            <div class="form-group">
                                <label for="nameHive">Nom</label>
                                <input type="text" class="form-control" name="nameHive" id="updateNameHive" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" name="lat" id="updateLat" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" name="long" id="updateLong" placeholder="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" id="update-hive" value="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                    </div>
                </div>
                </div>
        
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($hives as $hive): ?>
                        <tr>
                            <td class="hive-name"><?= $hive['name'] ;?></td>
                            <td class="hive-latitude"><?= $hive['latitude'] ;?></td>
                            <td class="hive-longitude"><?= $hive['longitude'] ;?></td>
                            <td> <a href="#" class="ud-link update-hive">Modifier</a> /<a href="#" class="ud-link delete-hive id" id="<?= $hive['id']; ?>" > Supprimer</a> </td>
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