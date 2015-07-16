$(document).ready(function(){

    $("#linq").click(

        function(){

            var url=$("#url").val();

            if(url!='')
            {
                $.ajax({
                    type: "POST",
                    url: window.location.href+"/linq/create",
                    data: "url="+url,
                    cache:false,
                    success:
                    function(data){
                        $("#linq").html(data);
                    }
                });
            }

            return false;

        });


});