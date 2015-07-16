<?php $this->load->view('header'); ?>
<script>
$(document).ready(function(){
    $("#linq").click(
        function(){
            var url=$("#url").val();
            if(url!='')
            {
                $.ajax({
                    type: "POST",
                    url: window.location.href+"linq/create",
                    data: "url="+url,
                    cache:false,
                    success:
                    function(data){
                        $("#linqOut").removeClass("hidden");
                        $("#linqOut").html('<strong>Your Linq:</strong> <a href="'+data+'" class="alert-link" target="_blank">'+data+'</a>');
                    }
                });
            }
            return false;
        });
});
</script>
<?php echo form_open('linq', array('name' => 'ajax_form', 'id' => 'ajax_form', 'class'=>'form-inline')); ?>

<div id="linqOut" class="alert alert-success hidden"></div>

<div class="well" style="text-align: center;">
    <h4>Enter a URL and press Linq to shorten</h4>
<div class="form-group">
    <?php
    $data = array(
        'name' => 'url',
        'id' => 'url',
        'class' => 'form-control',
        'placeholder' => 'www.example.com'
    );
    echo form_input($data);
    ?>
</div>
    <?php
    $data = array(
        'name' => 'linq',
        'id' => 'linq',
        'value' => ' Linq ',
        'class' => 'btn btn-info'
    );
    echo form_submit($data);
    ?>

</div>


<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>