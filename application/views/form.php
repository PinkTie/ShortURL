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
                        $("#linqOut").html('<strong>Your Linq:</strong> '+data);
                    }
                });
            }
            return false;
        });
});
</script>
<?php echo form_open('linq', array('name' => 'ajax_form', 'id' => 'ajax_form', 'class'=>'form-horizontal')); ?>

<div id="linqOut" class="alert"></div>

<div class="well" style="text-align: center;">

    <?php
    $data = array(
        'name' => 'url',
        'id' => 'url',
        'class' => 'span8',
        'placeholder' => 'Please enter a full length URL and press \'Linq\''
    );
    echo form_input($data);
    ?>

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