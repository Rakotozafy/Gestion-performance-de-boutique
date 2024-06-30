<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Formulaire de quittance de Herbergement</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post" name="form1">
                    <div class="form-group">
                        <label for="varchar">Numero <?php echo form_error('hb_numero') ?></label>
                        <input type="text" class="form-control" name="hb_numero" id="hb_numero" value="<?php echo $hb_numero; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Service <?php echo form_error('hb_service') ?></label>
                        <input type="text" class="form-control" name="hb_service" id="hb_service" value="<?php echo $hb_service; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date d'entre <?php echo form_error('hb_dateEntre') ?></label>
                        <input type="date" class="form-control" name="hb_dateEntre" id="hb_dateEntre" value="<?php echo $hb_dateEntre; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date de sortie <?php echo form_error('hb_dateSortie') ?></label>
                        <input type="date" class="form-control" name="hb_dateSortie" id="hb_dateSortie" value="<?php echo $hb_dateSortie; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Categorie <?php echo form_error('hb_categorie') ?></label>
                        <!-- <input type="text" class="form-control" name="hb_categorie" id="hb_categorie" value="<?php echo $hb_categorie; ?>" /> -->
                        <select name="hb_categorie" id="hb_categorie" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="int">Prix <?php echo form_error('hb_prix') ?></label>
                        <input type="text" class="form-control" name="hb_prix" id="hb_prix" value="<?php echo $hb_prix; ?>" readonly onclick="return calculer()" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Somme <?php echo form_error('hb_somme') ?></label>
                        <input type="text" class="form-control" name="hb_somme" id="hb_somme" value="<?php echo $hb_somme; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nom du patient <?php echo form_error('pat_id') ?></label>
                        <select name="pat_id" id="pat_id" class="form-control">
                            <?php foreach ($patients as $patient) {
                                echo "<option value='" . $patient->pat_id . "'>" . $patient->pat_nom . "</option>";
                            } ?>
                        </select>
                    </div>
                    <input type="hidden" name="hb_id" value="<?php echo $hb_id; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('hebergement') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function calculer() {
        var date1 = document.forms['form1'].elements['hb_dateEntre'].value
        var date2 = document.forms['form1'].elements['hb_dateSortie'].value
        var selectBox = document.getElementById("hb_categorie");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;

        var startDate = moment(date1, "YYYY-MM-DD");
        var endDate = moment(date2, "YYYY-MM-DD");
        var result = endDate.diff(startDate, 'days');
        if(selectedValue==1){
            var prix = 10000;
            var somme = prix*result;

        document.forms['form1'].elements['hb_prix'].value = prix;
        document.forms['form1'].elements['hb_somme'].value = somme;
        }else if(selectedValue==2){
            var prix = 5000;
            var somme = prix*result;
        document.forms['form1'].elements['hb_prix'].value = prix;
        document.forms['form1'].elements['hb_somme'].value = somme;
        }else{
            var prix = 2500;
            var somme = prix*result;
        document.forms['form1'].elements['hb_prix'].value = prix;
        document.forms['form1'].elements['hb_somme'].value = somme;
        }

    }
</script>
<script src="<?php echo base_url('https://momentjs.com/downloads/moment.js') ?>" />