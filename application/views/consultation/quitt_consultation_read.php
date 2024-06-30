
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title">Liste consultation</h4>
            </div>
            <div class="col-sm-4 col-6 text-right m-b-30">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
        <table class="table">
	    <tr><td>Cons Numero</td><td><?php echo $cons_numero; ?></td></tr>
	    <tr><td>Cons DateConsultation</td><td><?php echo $cons_dateConsultation; ?></td></tr>
	    <tr><td>Cons Cout</td><td><?php echo $cons_cout; ?></td></tr>
	    <tr><td>Con Validation</td><td><?php echo $con_validation; ?></td></tr>
	    <tr><td>Pat Id</td><td><?php echo $pat_id; ?></td></tr>
	    <tr><td>Doc Im</td><td><?php echo $doc_im; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('consultation') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                </div>
            </div>

        </div>
    </div>
</div>